<?php
$databases = ['example_app', 'laravel', 'mysql', 'test'];
$usernames = ['root', 'laravel_user'];
$passwords = ['', 'root', 'password', '123456', 'laravel', 'secret', 'admin'];

echo "--- Starting DB Diagnostic V2 ---\n";

foreach ($usernames as $user) {
    foreach ($passwords as $pass) {
        // Try without database first just to check credentials
        try {
            $pdo = new PDO("mysql:host=127.0.0.1", $user, $pass);
            echo "[SUCCESS] Connected! User: $user, Pass: '$pass'\n";
            
            // Now list databases
            $stmt = $pdo->query("SHOW DATABASES");
            $dbs = $stmt->fetchAll(PDO::FETCH_COLUMN);
            echo "Databases found: " . implode(', ', $dbs) . "\n";
            exit(0);
        } catch (PDOException $e) {
            // Silently fail
        }
    }
}

echo "[ERROR] Could not connect with any combination in V2.\n";
exit(1);
