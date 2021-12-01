<?php

namespace App\Models;


class Zaznam
{
    protected $cisloZaznamu;
    protected $datum;
    protected $pocetNakazenych;

    /**
     * Zaznam constructor.
     * @param $datum
     * @param $pocetNakazenych
     */
    public function __construct($cisloZaznamu,$datum, $pocetNakazenych)
    {
        $this->cisloZaznamu = $cisloZaznamu;
        $this->datum = $datum;
        $this->pocetNakazenych = $pocetNakazenych;
    }

    /**
     * @return int
     */
    public function getCisloZaznamu()
    {
        return $this->cisloZaznamu;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @return int
     */
    public function getPocetNakazenych()
    {
        return $this->pocetNakazenych;
    }

    /**
     * @param int $pocetNakazenych
     */
    public function setPocetNakazenych($pocetNakazenych)
    {
        $this->pocetNakazenych = $pocetNakazenych;
    }

}