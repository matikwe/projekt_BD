<?php


class MovieV2
{
    private $TYTUL;
    private $KATEGORIA;
    private $ROK_WYDANIA;
    private $DATA_WYPOZYCZENIA;
    private $DATA_WYGASNIECIA_FILMU;
    private $CENA;/**
 * MovieV2 constructor.
 * @param $TYTUL
 * @param $KATEGORIA
 * @param $ROK_WYDANIA
 * @param $DATA_WYPOZYCZENIA
 * @param $DATA_WYGASNIECIA_FILMU
 * @param $CENA
 */public function __construct($TYTUL, $KATEGORIA, $ROK_WYDANIA, $DATA_WYPOZYCZENIA, $DATA_WYGASNIECIA_FILMU, $CENA)
{
    $this->TYTUL = $TYTUL;
    $this->KATEGORIA = $KATEGORIA;
    $this->ROK_WYDANIA = $ROK_WYDANIA;
    $this->DATA_WYPOZYCZENIA = $DATA_WYPOZYCZENIA;
    $this->DATA_WYGASNIECIA_FILMU = $DATA_WYGASNIECIA_FILMU;
    $this->CENA = $CENA;


}/**
 * @return mixed
 */
public function getTYTUL()
{
    return $this->TYTUL;
}/**
 * @param mixed $TYTUL
 */
public function setTYTUL($TYTUL): void
{
    $this->TYTUL = $TYTUL;
}/**
 * @return mixed
 */
public function getKATEGORIA()
{
    return $this->KATEGORIA;
}/**
 * @param mixed $KATEGORIA
 */
public function setKATEGORIA($KATEGORIA): void
{
    $this->KATEGORIA = $KATEGORIA;
}/**
 * @return mixed
 */
public function getROKWYDANIA()
{
    return $this->ROK_WYDANIA;
}/**
 * @param mixed $ROK_WYDANIA
 */
public function setROKWYDANIA($ROK_WYDANIA): void
{
    $this->ROK_WYDANIA = $ROK_WYDANIA;
}/**
 * @return mixed
 */
public function getDATAWYPOZYCZENIA()
{
    return $this->DATA_WYPOZYCZENIA;
}/**
 * @param mixed $DATA_WYPOZYCZENIA
 */
public function setDATAWYPOZYCZENIA($DATA_WYPOZYCZENIA): void
{
    $this->DATA_WYPOZYCZENIA = $DATA_WYPOZYCZENIA;
}/**
 * @return mixed
 */
public function getDATAWYGASNIECIAFILMU()
{
    return $this->DATA_WYGASNIECIA_FILMU;
}/**
 * @param mixed $DATA_WYGASNIECIA_FILMU
 */
public function setDATAWYGASNIECIAFILMU($DATA_WYGASNIECIA_FILMU): void
{
    $this->DATA_WYGASNIECIA_FILMU = $DATA_WYGASNIECIA_FILMU;
}/**
 * @return mixed
 */
public function getCENA()
{
    return $this->CENA;
}/**
 * @param mixed $CENA
 */
public function setCENA($CENA): void
{
    $this->CENA = $CENA;
}


}