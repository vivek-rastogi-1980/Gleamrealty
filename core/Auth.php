<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Auth
 *
 * Session-based authentication manager using bcrypt password hashing.
 */
class Auth
{
    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            session_start([
                'cookie_httponly' => true,
                'cookie_samesite' => 'Lax',
            ]);
        }
    }

    /**
     * Authenticate user with username/email and password.
     */
    public static function attempt(string $login, string $password): bool
    {
        static::startSession();
        static::ensureAdminTable();

        $sql = "SELECT * FROM `admins` WHERE (`email` = ? OR `username` = ?) LIMIT 1";
        $user = Database::fetch($sql, [$login, $login]);

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            if (session_status() === PHP_SESSION_ACTIVE && !headers_sent()) {
                session_regenerate_id(true);
            }
            $_SESSION['admin_user_id'] = (int) $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            $_SESSION['admin_email'] = $user['email'];
            $_SESSION['admin_role'] = $user['role'] ?? 'admin';
            return true;
        }

        return false;
    }

    /**
     * Check if an admin is currently logged in.
     */
    public static function check(): bool
    {
        static::startSession();
        return isset($_SESSION['admin_user_id']) && (int) $_SESSION['admin_user_id'] > 0;
    }

    /**
     * Get active logged in user array.
     */
    public static function user(): ?array
    {
        if (!static::check()) {
            return null;
        }

        $id = (int) $_SESSION['admin_user_id'];
        return Database::fetch("SELECT id, username, email, role, created_at FROM `admins` WHERE `id` = ? LIMIT 1", [$id]);
    }

    /**
     * Get active admin ID.
     */
    public static function id(): ?int
    {
        return static::check() ? (int) $_SESSION['admin_user_id'] : null;
    }

    /**
     * Destroy admin session.
     */
    public static function logout(): void
    {
        static::startSession();
        unset($_SESSION['admin_user_id'], $_SESSION['admin_username'], $_SESSION['admin_email'], $_SESSION['admin_role']);
        if (session_status() === PHP_SESSION_ACTIVE && !headers_sent()) {
            session_regenerate_id(true);
        }
    }

    /**
     * Hash password via bcrypt.
     */
    public static function hash(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Ensure the admins table exists and has a default administrator.
     */
    public static function ensureAdminTable(): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS `admins` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(100) NOT NULL UNIQUE,
            `email` VARCHAR(191) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `role` VARCHAR(50) NOT NULL DEFAULT 'admin',
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

        Database::query($sql);

        // Seed default admin if empty
        $count = Database::fetch("SELECT COUNT(*) as total FROM `admins`");
        if ((int) ($count['total'] ?? 0) === 0) {
            $defaultPassword = static::hash('Admin@12345');
            Database::query(
                "INSERT INTO `admins` (`username`, `email`, `password`, `role`) VALUES (?, ?, ?, ?)",
                ['admin', 'admin@gleamrealty.com', $defaultPassword, 'superadmin']
            );
        }
    }
}
