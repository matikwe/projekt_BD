<?php


class Director
{
    private $ID_REZYSER;
    private $IMIE;
    private $NAZWISKO;

    /**
     * Director constructor.
     * @param $ID_REZYSER
     * @param $IMIE
     * @param $NAZWISKO
     */
    public function __construct($ID_REZYSER, $IMIE, $NAZWISKO)
    {
        $this->ID_REZYSER = $ID_REZYSER;
        $this->IMIE = $IMIE;
        $this->NAZWISKO = $NAZWISKO;
    }

    /**
     * @return mixed
     */
    public function getIDREZYSER()
    {
        return $this->ID_REZYSER;
    }

    /**
     * @param mixed $ID_REZYSER
     */
    public function setIDREZYSER($ID_REZYSER): void
    {
        $this->ID_REZYSER = $ID_REZYSER;
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