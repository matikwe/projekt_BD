<?php


class Actor
{
    private $ID_AKTOR;
    private $IMIE;
    private $NAZWISKO;

    /**
     * Actor constructor.
     * @param $ID_AKTOR
     * @param $IMIE
     * @param $NAZWISKO
     */
    public function __construct($ID_AKTOR, $IMIE, $NAZWISKO)
    {
        $this->ID_AKTOR = $ID_AKTOR;
        $this->IMIE = $IMIE;
        $this->NAZWISKO = $NAZWISKO;
    }

    /**
     * @return mixed
     */
    public function getIDAKTOR()
    {
        return $this->ID_AKTOR;
    }

    /**
     * @param mixed $ID_AKTOR
     */
    public function setIDAKTOR($ID_AKTOR): void
    {
        $this->ID_AKTOR = $ID_AKTOR;
    }

    /**
     * @return mixed
     */
    public function getIMIE()
    {
        return $this->IMIE;
    }

    /**
     * @param mixed $IMIE
     */
    public function setIMIE($IMIE): void
    {
        $this->IMIE = $IMIE;
    }

    /**
     * @return mixed
     */
    public function getNAZWISKO()
    {
        return $this->NAZWISKO;
    }

    /**
     * @param mixed $NAZWISKO
     */
    public function setNAZWISKO($NAZWISKO): void
    {
        $this->NAZWISKO = $NAZWISKO;
    }


}