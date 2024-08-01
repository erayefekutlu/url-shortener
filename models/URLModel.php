<?php

namespace App\Models;

use PDO;

class URLModel
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Veritabanı bağlantı hatası: " . $e->getMessage());
        }
    }

    public function createShortURL($url)
    {
        $code = $this->generateCode();
        $stmt = $this->db->prepare("INSERT INTO urls (code, long_url) VALUES (:code, :long_url)");
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':long_url', $url);
        $stmt->execute();

        return $code;
    }

    public function getLongURL($code)
    {
        $stmt = $this->db->prepare("SELECT long_url FROM urls WHERE code = :code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['long_url'] : false;
    }

    private function generateCode()
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6);
    }
}
?>
