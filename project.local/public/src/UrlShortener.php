<?php
namespace App;

use PDO;
use Embed\Embed;
use Embed\Http\Crawler;
use Embed\Http\CurlClient;
use Nyholm\Psr7\Factory\Psr17Factory;

class UrlShortener
{
    private $pdo;
    private $embed;

    public function __construct()
    {
        $host = 'localhost';
        $port = '5432';
        $dbname = 'testdb';
        $user = 'myuser';
        $password = '1111';

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";

        $this->pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $psr17Factory = new Psr17Factory();
        $httpClient = new CurlClient();
        $crawler = new Crawler($httpClient, $psr17Factory, $psr17Factory);
        $this->embed = new Embed($crawler);
    }

    public function shortenUrl($originalUrl)
    {
        $shortCode = substr(md5(uniqid(rand(), true)), 0, 6);

        $stmt = $this->pdo->prepare("INSERT INTO links (original_url, short_code) VALUES (:original_url, :short_code)");
        $stmt->execute([':original_url' => $originalUrl, ':short_code' => $shortCode]);

        return $shortCode;
    }

    public function fetchEmbedInfo($url)
    {
        try {
            $info = $this->embed->get($url);
            return $info;
        } catch (\Exception $e) {
            return null;
        }
    }
}
?>