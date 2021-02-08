<?php


class Movie
{
    private $ID_FILM;
    private $KATEGORIA;
    private $ID_REZYSER;
    private $TYTUL;
    private $IMIE;
    private $NAZWISKO;
    private $ROK_WYDANIA;
    private $PRZEDZIAL_WIEKOWY;
    private $BIEZACA_CENA;

    /**
     * Movie constructor.
     * @param $ID_FILM
     * @param $KATEGORIA
     * @param $ID_REZYSER
     * @param $TYTUL
     * @param $IMIE
     * @param $NAZWISKO
     * @param $ROK_WYDANIA
     * @param $PRZEDZIAL_WIEKOWY
     * @param $BIEZACA_CENA
     */
    public function __construct($ID_FILM, $KATEGORIA, $ID_REZYSER, $TYTUL, $IMIE, $NAZWISKO, $ROK_WYDANIA, $PRZEDZIAL_WIEKOWY, $BIEZACA_CENA)
    {
        $this->ID_FILM = $ID_FILM;
        $this->KATEGORIA = $KATEGORIA;
        $this->ID_REZYSER = $ID_REZYSER;
        $this->TYTUL = $TYTUL;
        $this->IMIE = $IMIE;
        $this->NAZWISKO = $NAZWISKO;
        $this->ROK_WYDANIA = $ROK_WYDANIA;
        $this->PRZEDZIAL_WIEKOWY = $PRZEDZIAL_WIEKOWY;
        $this->BIEZACA_CENA = $BIEZACA_CENA;
    }

    /**
     * @return mixed
     */
    public function getIDFILM()
    {
        return $this->ID_FILM;
    }

    /**
     * @param mixed $ID_FILM
     */
    public function setIDFILM($ID_FILM): void
    {
        $this->ID_FILM = $ID_FILM;
    }

    /**
     * @return mixed
     */
    public function getKATEGORIA()
    {
        return $this->KATEGORIA;
    }

    /**
     * @param mixed $KATEGORIA
     */
    public function setKATEGORIA($KATEGORIA): void
    {
        $this->KATEGORIA = $KATEGORIA;
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
    public function getTYTUL()
    {
        return $this->TYTUL;
    }

    /**
     * @param mixed $TYTUL
     */
    public function setTYTUL($TYTUL): void
    {
        $this->TYTUL = $TYTUL;
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

    /**
     * @return mixed
     */
    public function getROKWYDANIA()
    {
        return $this->ROK_WYDANIA;
    }

    /**
     * @param mixed $ROK_WYDANIA
     */
    public function setROKWYDANIA($ROK_WYDANIA): void
    {
        $this->ROK_WYDANIA = $ROK_WYDANIA;
    }

    /**
     * @return mixed
     */
    public function getPRZEDZIALWIEKOWY()
    {
        return $this->PRZEDZIAL_WIEKOWY;
    }

    /**
     * @param mixed $PRZEDZIAL_WIEKOWY
     */
    public function setPRZEDZIALWIEKOWY($PRZEDZIAL_WIEKOWY): void
    {
        $this->PRZEDZIAL_WIEKOWY = $PRZEDZIAL_WIEKOWY;
    }

    /**
     * @return mixed
     */
    public function getBIEZACACENA()
    {
        return $this->BIEZACA_CENA;
    }

    /**
     * @param mixed $BIEZACA_CENA
     */
    public function setBIEZACACENA($BIEZACA_CENA): void
    {
        $this->BIEZACA_CENA = $BIEZACA_CENA;
    }


}