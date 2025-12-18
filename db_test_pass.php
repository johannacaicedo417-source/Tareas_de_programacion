<?php
$passwords = ['', 'root', 'password', '123456', 'admin', '1234', 'secret'];

echo "Testing passwords for user 'root'...\n";

foreach ($passwords as $pass) {
    try {
        $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', $pass);
        echo "[SUCCESS] Password found: '$pass'\n";
        exit(0);
    } catch (PDOException $e) {
        // echo "Failed with '$pass'\n";
    }
}

echo "[FAILED] No common password worked.\n";
