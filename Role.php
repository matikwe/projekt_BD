<?php


class Role
{
    private $ID_ROLA;
    private $ROLA;

    /**
     * Role constructor.
     * @param $ID_ROLA
     * @param $ROLA
     */
    public function __construct($ID_ROLA, $ROLA)
    {
        $this->ID_ROLA = $ID_ROLA;
        $this->ROLA = $ROLA;
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

    /**
     * @return mixed
     */
    public function getROLA()
    {
        return $this->ROLA;
    }

    /**
     * @param mixed $ROLA
     */
    public function setROLA($ROLA): void
    {
        $this->ROLA = $ROLA;
    }




}