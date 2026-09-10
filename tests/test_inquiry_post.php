<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
\Core\Dotenv::load(__DIR__ . '/../.env');

// First simulate direct submission
$data = [
    'name' => 'Mrs. Ananya Sharma',
    'phone' => '+91 99887 76655',
    'email' => 'ananya.sharma@example.com',
    'project_id' => 1,
    'budget_range' => '₹ 50 Lakhs - ₹ 1 Crore',
    'message' => 'Automated verification inquiry test.',
];

$id = \App\Models\Inquiry::create($data);
echo "Direct Inquiry Created: ID #{$id}\n";

// Verify CSV export includes this inquiry
$rows = \App\Models\Inquiry::exportRows();
$found = false;
foreach ($rows as $r) {
    if ($r[2] === 'Mrs. Ananya Sharma') {
        $found = true;
        break;
    }
}
echo "CSV Export Contains Lead: " . ($found ? "YES" : "NO") . "\n";
