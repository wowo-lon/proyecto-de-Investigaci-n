<?php

namespace Udec\HomeBundle\Entity;

/**
 * Semillero
 */
class Semillero
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Semillero
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * @var \Udec\HomeBundle\Entity\Grupo
     */
    private $grupo;


    /**
     * Set grupo
     *
     * @param \Udec\HomeBundle\Entity\Grupo $grupo
     *
     * @return Semillero
     */
    public function setGrupo(\Udec\HomeBundle\Entity\Grupo $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \Udec\HomeBundle\Entity\Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }
}
