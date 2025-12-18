-- Script para crear la base de datos del proyecto
-- Ejecutar desde MySQL Console de Laragon

CREATE DATABASE IF NOT EXISTS example_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Verificar que se creó correctamente
SHOW DATABASES LIKE 'example_app';

-- Seleccionar la base de datos
USE example_app;
