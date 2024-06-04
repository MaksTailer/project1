<?php
require './vendor/autoload.php';

use App\UrlShortener;

$newUrl = '';
$info = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $originalUrl = $_POST['original_url'];
    $urlShortener = new UrlShortener();
    $shortCode = $urlShortener->shortenUrl($originalUrl);

    $newUrl = "Сокращенная ссылка: <a href=\"/{$shortCode}\">http://project.local/{$shortCode}</a>";
    
    $info = $urlShortener->fetchEmbedInfo($originalUrl);
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
                        <input class="col-4 form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Введите исходную ссылку:" type="text" id="original_url" name="original_url" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Сократить</button>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        
            <h1><?php echo $newUrl; ?></h1>

            <?php if ($info): ?>
                <div class="mt-5">
                    <h2><strong>Title:</strong> <?php echo $info->title; ?></h2>
                    <p><strong>Description:</strong> <?php echo $info->description; ?></p>
                    <?php if ($info->image): ?>
                        <img src="<?php echo $info->image; ?>" alt="Image" class="img-fluid">
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
