<?php

namespace Udec\HomeBundle\Entity;

/**
 * LineaInvestigacion
 */
class LineaInvestigacion
{
    /**
     * @var int
     */
    private $id;


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
     * @var string
     */
    private $nombre;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return LineaInvestigacion
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Grupos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Grupos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add grupo
     *
     * @param \Udec\HomeBundle\Entity\Grupo $grupo
     *
     * @return Grupo
     */
    public function addGrupo(\Udec\HomeBundle\Entity\Grupo $grupo)
    {
        $this->Grupos[] = $grupo;

        return $this;
    }

    /**
     * Remove grupo
     *
     * @param \Udec\HomeBundle\Entity\Grupo $grupo
     */
    public function removeGrupo(\Udec\HomeBundle\Entity\Grupo $grupo)
    {
        $this->Grupos->removeElement($grupo);
    }

    /**
     * Get grupos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrupos()
    {
        return $this->Grupos;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $semilleros;


    /**
     * Add semillero
     *
     * @param \Udec\HomeBundle\Entity\Semillero $semillero
     *
     * @return semillero
     */
    public function addSemillero(\Udec\HomeBundle\Entity\Semillero $semillero)
    {
        $this->semilleros[] = $semillero;

        return $this;
    }

    /**
     * Remove semillero
     *
     * @param \Udec\HomeBundle\Entity\Semillero $semillero
     */
    public function removeSemillero(\Udec\HomeBundle\Entity\Semillero $semillero)
    {
        $this->semilleros->removeElement($semillero);
    }

    /**
     * Get semilleros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSemilleros()
    {
        return $this->semilleros;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $grupos;


}
