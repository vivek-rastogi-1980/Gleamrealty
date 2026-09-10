<?php

declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;
use RuntimeException;

/**
 * Class Database
 *
 * Database connection manager using prepared statements and environment variables.
 */
class Database
{
    protected static ?PDO $connection = null;
    protected static ?self $instance = null;

    protected function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    /**
     * Get or initialize PDO connection.
     *
     * @throws RuntimeException
     */
    public static function connection(): PDO
    {
        if (static::$connection !== null) {
            return static::$connection;
        }

        $host = Dotenv::get('DB_HOST', '127.0.0.1');
        $port = Dotenv::get('DB_PORT', '3306');
        $database = Dotenv::get('DB_DATABASE', 'gleamrealty');
        $username = Dotenv::get('DB_USERNAME', 'root');
        $password = Dotenv::get('DB_PASSWORD', '');

        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', $host, $port, $database);

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
        ];

        try {
            static::$connection = new PDO($dsn, (string) $username, (string) $password, $options);
        } catch (PDOException $e) {
            throw new RuntimeException("Database Connection Failed: " . $e->getMessage(), (int) $e->getCode(), $e);
        }

        return static::$connection;
    }

    public static function isConnected(): bool
    {
        try {
            static::connection();
            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    public static function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = static::connection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public static function fetch(string $sql, array $params = []): ?array
    {
        $stmt = static::query($sql, $params);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public static function fetchAll(string $sql, array $params = []): array
    {
        $stmt = static::query($sql, $params);
        return $stmt->fetchAll();
    }

    public static function insert(string $sql, array $params = []): string
    {
        static::query($sql, $params);
        return static::connection()->lastInsertId();
    }

    public static function execute(string $sql, array $params = []): int
    {
        $stmt = static::query($sql, $params);
        return $stmt->rowCount();
    }

    public static function lastInsertId(): string
    {
        return static::connection()->lastInsertId();
    }

    public static function beginTransaction(): bool
    {
        return static::connection()->beginTransaction();
    }

    public static function commit(): bool
    {
        return static::connection()->commit();
    }

    public static function rollBack(): bool
    {
        return static::connection()->rollBack();
    }
}
