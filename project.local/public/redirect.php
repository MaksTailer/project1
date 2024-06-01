<?php
    $short_code = $_GET['code'];
  
    $host = 'localhost';
    $port = '5432';
    $dbname = 'testdb';
    $user = 'myuser';
    $password = '1111';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

    try{
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $stmt = $pdo->prepare("SELECT original_url FROM links WHERE short_code = :short_code");
        $stmt->execute([':short_code' => $short_code]);
        $original_url = $stmt->fetchColumn();

        if ($original_url){
            header("Location: $original_url");
            exit();
        }
        else {
            echo "Ссылка не найдена";
        }
    }
    catch (PDOException $e){
        echo "Error: ".$e->getMessage();
    }
?>
        

