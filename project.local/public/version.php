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

    // Выполняем SQL-запрос для получения версии PostgreSQL
    $stmt = $pdo->query('SELECT version()');
    $version = $stmt->fetchColumn();

    // Выводим версию PostgreSQL
    echo "PostgreSQL version: " . $version;
} catch (PDOException $e) {
    // Обработка ошибок подключения к базе данных
    echo "Error: " . $e->getMessage();
}
?>