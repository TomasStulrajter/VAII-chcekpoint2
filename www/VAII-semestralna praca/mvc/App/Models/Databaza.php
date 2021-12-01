<?php

namespace App\Models;

use PDO;
use App\Model\Zaznam;

class Databaza
{
    /**
     * @var PDO
     */
    private $pdo;

    private $user;
    private $password;
    private $database;
    private $host;

    public function __construct($user, $password, $database, $host)
    {
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->host = $host;

        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database}",$this->user,$this->password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
        );
    }

    public function VlozZaznam(\App\Models\Zaznam $zaznam)
    {
        $stmt = $this->pdo->prepare("INSERT INTO zaznamy (datum, pocetNakazenych) values (?, ?)");
        $stmt->execute([$zaznam->getDatum(), $zaznam->getPocetNakazenych()]);
    }

    public function EditujZaznam($novyDatum, int $novyPocetNakazenych, int $cisloZaznamu)
    {
        $stmt = $this->pdo->prepare("UPDATE zaznamy SET datum=?, pocetNakazenych=? WHERE id=?");
        $stmt->execute([$novyDatum, $novyPocetNakazenych, $cisloZaznamu]);
    }

    public function ZmazZaznam(int $cisloZaznamu)
    {
        $stmt = $this->pdo->prepare("DELETE FROM zaznamy WHERE id=?");
        $stmt->execute([$cisloZaznamu]);
    }

    public function NacitajCeluTabulku() : array
    {
        $stmt = $this->pdo->query("SELECT * FROM zaznamy");
        $zaznamy = [];
        while ($riadok = $stmt->fetch()) {
            $zaznamy[] = new \App\Models\Zaznam($riadok['id'], $riadok['datum'], $riadok['pocetNakazenych']);
        }
        return $zaznamy;
    }

    public function SkontrolujZaznam(int $cisloZaznamu) : array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM zaznamy WHERE id=?");
        $stmt->execute([$cisloZaznamu]);

        $zaznamy = $stmt->fetchAll();

        return $zaznamy;
    }

    public function SkontrolujDatum($datum) : array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM zaznamy WHERE datum=?");
        $stmt->execute([$datum]);

        $zaznamy = $stmt->fetchAll();

        return $zaznamy;
    }

    public function getPoleDennychNakaz()
    {
        $stmt = $this->pdo->prepare("SELECT pocetNakazenych FROM zaznamy");
        $stmt->execute();

        $zaznamy = $stmt->fetchAll();

        return $zaznamy;
    }
}