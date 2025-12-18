<?php
echo "Testing Connection to MySQL...\n";
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    echo "Authentication: OK\n";
    
    try {
        $pdo->exec("USE example_app");
        echo "Database 'example_app': FOUND\n";
    } catch (Exception $e) {
        echo "Database 'example_app': NOT FOUND (" . $e->getMessage() . ")\n";
        echo "Attempting to create...\n";
        try {
            $pdo->exec("CREATE DATABASE example_app");
            echo "Database 'example_app': CREATED SUCCESSFULLY\n";
        } catch (Exception $e2) {
            echo "Failed to create database: " . $e2->getMessage() . "\n";
        }
    }
    
} catch (PDOException $e) {
    echo "Authentication: FAILED (" . $e->getMessage() . ")\n";
}
