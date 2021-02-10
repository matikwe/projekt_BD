<?php


class Employees
{
    private $ID_PRACOWNIK;
    private $LOGIN;
    private $ID_ROLA;

    /**
     * Employees constructor.
     * @param $ID_PRACOWNIK
     * @param $LOGIN
     * @param $ID_ROLA
     */
    public function __construct($ID_PRACOWNIK, $LOGIN, $ID_ROLA)
    {
        $this->ID_PRACOWNIK = $ID_PRACOWNIK;
        $this->LOGIN = $LOGIN;
        $this->ID_ROLA = $ID_ROLA;
    }

    /**
     * @return mixed
     */
    public function getIDPRACOWNIK()
    {
        return $this->ID_PRACOWNIK;
    }

    /**
     * @param mixed $ID_PRACOWNIK
     */
    public function setIDPRACOWNIK($ID_PRACOWNIK): void
    {
        $this->ID_PRACOWNIK = $ID_PRACOWNIK;
    }

    /**
     * @return mixed
     */
    public function getLOGIN()
    {
        return $this->LOGIN;
    }

    /**
     * @param mixed $LOGIN
     */
    public function setLOGIN($LOGIN): void
    {
        $this->LOGIN = $LOGIN;
    }

    /**
     * @return mixed
     */
    public function getIDROLA()
    {
        return $this->ID_ROLA;
    }

    /**
     * @param mixed $ID_ROLA
     */
    public function setIDROLA($ID_ROLA): void
    {
        $this->ID_ROLA = $ID_ROLA;
    }

}