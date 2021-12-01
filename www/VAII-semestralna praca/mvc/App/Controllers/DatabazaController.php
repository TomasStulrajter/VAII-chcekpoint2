<?php


namespace App\Controllers;

use App\Core\AControllerBase;
use App\Model\Databaza;

class DatabazaController extends AControllerBase
{
    /**
     * @var \App\Models\Databaza
     */
    private $databaza;

    public function __construct()
    {
        $this->databaza = new \App\Models\Databaza("root", "dtb456", "statistika", "localhost");
    }

    public function index()
    {
        $vysledky = $this->zistiStatistiky();
        return
            [ $this->databaza->NacitajCeluTabulku(),
            'priemer' => $vysledky[0], 'minimum' => $vysledky[1], 'maximum' => $vysledky[2]];


    }

    public function vlozZaznam()
    {

        if(!empty($_POST['datum']) && !empty($_POST['pocetNakazenych'])){
            if($_POST['pocetNakazenych'] <= 5500000 && !$this->existujeDatum($_POST['datum'])) {
                $this->databaza->vlozZaznam(new \App\Models\Zaznam(0, $_POST['datum'], $_POST['pocetNakazenych']));
                header("Location: http://localhost/VAII-semestralna praca/mvc?c=Databaza&a=index");
                die();
            } else if($_POST['pocetNakazenych'] > 5500000 && $this->existujeDatum($_POST['datum'])) {
                return ['chyba' => 'Záznam z tohoto dňa už existuje a počet nemôže byť väčší ako 5 500 000, čo predstavuje celú populáciu Slovenska!'];
            } else if($this->existujeDatum($_POST['datum'])) {
                return ['chyba' => 'Záznam z tohoto dňa už existuje!'];
            } else if($_POST['pocetNakazenych'] > 5500000) {
                return ['chyba' => 'Počet nemôže byť väčší ako 5 500 000, čo predstavuje celú populáciu Slovenska!'];
            }
        } else if(empty($_POST['datum']) || empty($_POST['pocetNakazenych'])){
            return ['chyba' => 'Prosím vypíšte všetky polia!'];
        }
    }

    public function zmazZaznam()
    {
        if(isset($_GET['cislo']) && !isset($_POST['cisloZaznamu'])){
            $cislo = intval($_GET['cislo']);
            return ['cislo' => $cislo, 'chyba' => 'Prosím vypíšte pole!'];
        }

        if(isset($_POST['cisloZaznamu'])){

            if ($this->existujeZaznam($_POST['cisloZaznamu'])) {
                $this->databaza->zmazZaznam($_POST['cisloZaznamu']);
                header("Location: http://localhost/VAII-semestralna praca/mvc?c=Databaza&a=index");
                die();
            } else {
                return ['chyba' => 'Taký záznam neexistuje!', 'cislo' => 0];
            }
        } else {
            return ['chyba' => 'Prosím vypíšte pole!', 'cislo' => 0];
        }
    }

    public function editujZaznam()
    {
        if(isset($_GET['cislo']) && !isset($_POST['cisloZaznamu'])){
            $cislo = intval($_GET['cislo']);
            return ['cislo' => $cislo, 'chyba' => 'Prosím vypíšte pole!'];
        }

        if(isset($_POST['cisloZaznamu']) && !empty($_POST['novyDatum']) && !empty($_POST['novyPocetNakazenych'])){
            if ($this->existujeZaznam($_POST['cisloZaznamu']) && $_POST['novyPocetNakazenych'] <= 5500000) {
                $this->databaza->editujZaznam($_POST['novyDatum'], $_POST['novyPocetNakazenych'], $_POST['cisloZaznamu']);
                header("Location: http://localhost/VAII-semestralna praca/mvc?c=Databaza&a=index");
                die();
            } else if(!$this->existujeZaznam($_POST['cisloZaznamu']) && $_POST['novyPocetNakazenych'] > 5500000) {
                return ['chyba' => 'Taký záznam neexistuje a počet nemôže byť väčší ako 5 500 000, čo predstavuje celú populáciu Slovenska!', 'cislo' => 0];
            } else if(!$this->existujeZaznam($_POST['cisloZaznamu'])) {
                return ['chyba' => 'Taký záznam neexistuje!', 'cislo' => 0];
            } else if($_POST['novyPocetNakazenych'] > 5500000) {
                return ['chyba' => 'Počet nemôže byť väčší ako 5 500 000, čo predstavuje celú populáciu Slovenska!', 'cislo' => 0];
            }
        } else {
            return ['chyba' => 'Prosím vypíšte všetky polia!', 'cislo' => 0];
        }
    }

    public function existujeZaznam(int $cisloZaznamu) : bool {
        $zaznam = $this->databaza->SkontrolujZaznam($cisloZaznamu);
        $existuje = false;

            if (!empty($zaznam)) {
                $existuje = true;
            }
        return $existuje;
    }

    public function existujeDatum($datum) : bool {
        $zaznam = $this->databaza->SkontrolujDatum($datum);
        $existuje = false;

        if (!empty($zaznam)) {
            $existuje = true;
        }
        return $existuje;
    }

    public function zistiStatistiky() : array {
        $pole = $this->databaza->getPoleDennychNakaz();
        $priemer = 0;
        $maximum = $pole[0][0];
        $minimum = $pole[0][0];;
        for ($i = 0; $i < count($pole); $i++) {

            if($pole[$i][0] < $minimum) {
                $minimum = $pole[$i][0];
            }
            if($pole[$i][0] > $maximum) {
                $maximum = $pole[$i][0];
            }
            $priemer = $priemer + $pole[$i][0];
        }
        $priemer = $priemer / count($pole);

        $vysledky = [];
        $vysledky[0] = $priemer;
        $vysledky[1] = $minimum;
        $vysledky[2] = $maximum;
        return $vysledky;
    }




}