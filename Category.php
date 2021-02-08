<?php


class Category
{
    private $ID_KATEGORIA;
    private $KATEGORIA;

    /**
     * Category constructor.
     * @param $ID_KATEGORIA
     * @param $KATEGORIA
     */
    public function __construct($ID_KATEGORIA, $KATEGORIA)
    {
        $this->ID_KATEGORIA = $ID_KATEGORIA;
        $this->KATEGORIA = $KATEGORIA;
    }

    /**
     * @return mixed
     */
    public function getIDKATEGORIA()
    {
        return $this->ID_KATEGORIA;
    }

    /**
     * @param mixed $ID_KATEGORIA
     */
    public function setIDKATEGORIA($ID_KATEGORIA): void
    {
        $this->ID_KATEGORIA = $ID_KATEGORIA;
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


}