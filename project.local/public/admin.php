<?php
$host = 'localhost';
$port = '5432';    
$dbname = 'testdb'; 
$user = 'myuser';   
$password = '1111'; // пароль пользователя базы данных

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} 
catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $original_url = $_POST['original_url'];
        $stmt = $pdo->prepare("UPDATE links SET original_url = :original_url WHERE id = :id");
        $stmt->execute([':original_url' => $original_url, ':id' => $id]);
    } 
    elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM links WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

$stmt = $pdo->query("SELECT * FROM links");
$links = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Админка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container url_2">
        <div class="row">
            <h1>Все URL:</h1>
            <table>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-6">Оригинальная ссылка</th>
                    <th class="col-1">Короткий код</th>
                    <th class="col-2">Действия</th>
                </tr>
                <?php foreach ($links as $link): ?>
                <tr>
                    <form method="POST" action="">
                        <td><?php echo htmlspecialchars($link['id']); ?></td>
                        <td><input class="form-control" type="text" name="original_url" value="<?php echo htmlspecialchars($link['original_url']); ?>"></td>
                        <td><?php echo htmlspecialchars($link['short_code']); ?></td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($link['id']); ?>">
                            <button type="submit" class="btn btn-secondary" name="update">Обновить</button>
                            <button type="submit" class="btn btn-secondary" name="delete">Удалить</button>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>