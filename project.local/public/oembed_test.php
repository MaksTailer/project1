<?php
require 'vendor/autoload.php';

use Embed\Embed;
use Embed\Http\Crawler;
use Embed\Http\CurlClient;
use Nyholm\Psr7\Factory\Psr17Factory;

$url = $_GET['url'] ?? null;
$info = null;

if ($url) {
    $psr17Factory = new Psr17Factory();
    $httpClient = new CurlClient();

    // Создаем объект Crawler
    $crawler = new Crawler($httpClient, $psr17Factory, $psr17Factory);

    $embed = new Embed($crawler);

    try {
        $info = $embed->get($url);
    } catch (Exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>oEmbed Тестирование</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>oEmbed Тестирование</h1>
        <form method="GET" action="">
            <div class="mb-3">
                <label for="url" class="form-label">Введите URL:</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="Введите URL для тестирования" required>
            </div>
            <button type="submit" class="btn btn-primary">Получить информацию</button>
        </form>

        <?php if ($info): ?>
            <div class="mt-5">
                <h2>Информация по ссылке</h2>
                <p><strong>Title:</strong> <?php echo $info->title; ?></p>
                <p><strong>Description:</strong> <?php echo $info->description; ?></p>
                <?php if ($info->image): ?>
                    <p><strong>Image:</strong></p>
                    <img src="<?php echo $info->image; ?>" alt="Image" class="img-fluid">
                <?php endif; ?>
                <p><strong>URL:</strong> <a href="<?php echo $info->url; ?>"><?php echo $info->url; ?></a></p>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
