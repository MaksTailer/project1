<?php
// Подключение к базе данных PostgreSQL
$host = 'localhost';
$port = '5432';
$dbname = 'testdb';
$user = 'myuser';
$password = '1111';

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
try {
    // Создаем экземпляр PDO для соединения с базой данных
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $conn = $pdo->query('SELECT version()');
    $version = $conn->fetchColumn();

    echo "PostgreSQL version: " . $version; 
    
    } catch (PDOException $e) {
        // Обработка ошибок подключения к базе данных
        echo "Error: " . $e->getMessage();
    }
?>