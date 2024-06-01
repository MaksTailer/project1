<?php
    $newUrl = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $original_url = $_POST['original_url'];
    $short_code = substr(md5(uniqid(rand(), true)), 0, 6);

    $host = 'localhost';
    $port = '5432';
    $dbname = 'testdb';
    $user = 'myuser';
    $password = '1111';

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

    try {
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $stmt = $pdo->prepare("INSERT INTO links (original_url, short_code) VALUES (:original_url, :short_code)");
        $stmt->execute([':original_url' => $original_url, ':short_code' => $short_code]);
        
        $newUrl = "Сокращенная ссылка: <a href=\"/{$short_code}\">http://project.local/{$short_code}</a>";
    } 
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Сокращатель ссылок</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="url_1">
            <div class="row">
                <div class="main_text"><h1>Сокращатель ссылок</h1></div>
                <form method="POST" action="">
                <div class="input-group mb-3">
                    <!-- <label for="original_url">Введите оригинальную ссылку:</label> -->
                    <input class="col-4 form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Введите исходную ссылку:" type="text" id="original_url" name="original_url" required>
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Сократить</button>
                </div>
                    <br>
                </form>
            </div>
        
            <h1><?php echo $newUrl; ?></h1>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>