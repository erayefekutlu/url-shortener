<?php

namespace App\Controllers;

use App\Models\URLModel;

class URLController
{
    public $shortUrl;

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['url'])) {
            $this->shortenURL($_POST['url']);
        } elseif (isset($_GET['code'])) {
            $this->redirectURL($_GET['code']);
        }
    }

    public function handleRequest()
    {
        // Do nothing; methods are triggered in the constructor
    }

    private function shortenURL($url)
    {
        $urlModel = new URLModel();
        $this->shortUrl = $urlModel->createShortURL($url);
    }

    private function redirectURL($code)
    {
        $urlModel = new URLModel();
        $longURL = $urlModel->getLongURL($code);
    
        if ($longURL) {
            header("Location: " . $longURL);
            exit();
        } else {
            // Redirect to home or display an error message
            header("Location: " . BASE_URL);
            exit();
        }
    }
    
}
?>
