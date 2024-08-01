<?php
require_once 'config/config.php';
require_once 'controllers/URLController.php';

use App\Controllers\URLController;

$urlController = new URLController();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Kısaltıcı</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container text-center">
        <h1 class="mt-5">URL Kısaltıcı</h1>
        <form action="index.php" method="post" class="form-inline justify-content-center mt-4">
            <div class="form-group mx-sm-3 mb-2">
                <label for="url" class="sr-only">URL</label>
                <input type="url" class="form-control" id="url" name="url" placeholder="Uzun URL'nizi girin" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Kısalt</button>
        </form>
        <?php if (isset($urlController->shortUrl)) : ?>
            <div class="alert alert-success text-center mt-4" role="alert">
                Kısa URL: <a href="<?= BASE_URL . $urlController->shortUrl ?>" target="_blank"><?= BASE_URL . $urlController->shortUrl ?></a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>