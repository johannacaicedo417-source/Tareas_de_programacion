<?php
try {
    // Intenta conectar con las credenciales que fallaron según el error
    $pdo = new PDO('mysql:host=localhost;dbname=example_app', 'laravel_user', '');
    echo "Conexión exitosa con laravel_user (sin password)\n";
} catch (PDOException $e) {
    echo "Falla con laravel_user (sin password): " . $e->getMessage() . "\n";
}

try {
    // Intenta conectar con root (común en Laragon)
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    echo "Conexión exitosa con root (sin password)\n";
} catch (PDOException $e) {
    echo "Falla con root (sin password): " . $e->getMessage() . "\n";
}
