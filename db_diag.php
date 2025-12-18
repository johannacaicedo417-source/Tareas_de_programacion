<?php
$databases = ['example_app', 'laravel', 'mysql', 'test'];
$usernames = ['root'];
$passwords = ['', 'root', 'password', '123456'];

echo "--- Starting DB Diagnostic ---\n";

foreach ($databases as $db) {
    foreach ($usernames as $user) {
        foreach ($passwords as $pass) {
            try {
                $pdo = new PDO("mysql:host=127.0.0.1;dbname=$db", $user, $pass);
                echo "[SUCCESS] Connected! DB: $db, User: $user, Pass: '$pass'\n";
                exit(0);
            } catch (PDOException $e) {
                // Silently fail to keep output clean
            }
        }
    }
}

echo "[ERROR] Could not connect with any common combination.\n";
exit(1);
