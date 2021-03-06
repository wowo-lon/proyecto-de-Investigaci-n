<?php

namespace Udec\HomeBundle\Entity;

/**
 * Grupo
 */
class Grupo
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
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var bool
     */
    private $estado;


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
     * @return Grupo
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Grupo
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Grupo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @var \Udec\HomeBundle\Entity\Grupo
     */
    private $lider;


    /**
     * Set lider
     *
     * @param \Udec\HomeBundle\Entity\Grupo $lider
     *
     * @return Grupo
     */
    public function setLider(\Udec\HomeBundle\Entity\User $lider = null)
    {
        $this->lider = $lider;

        return $this;
    }

    /**
     * Get lider
     *
     * @return \Udec\HomeBundle\Entity\User
     */
    public function getLider()
    {
        return $this->lider;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $semilleros;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $LineasInvestigacion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->semilleros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->LineasInvestigacion = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add lineasInvestigacion
     *
     * @param \Udec\HomeBundle\Entity\LineaInvestigacion $lineaInvestigacion
     *
     * @return LineaInvestigacion
     */
    public function addLineasInvestigacion(\Udec\HomeBundle\Entity\LineaInvestigacion $lineasInvestigacion)
    {
        $this->LineasInvestigacion[] = $lineasInvestigacion;

        return $this;
    }

    /**
     * Remove lineaInvestigacion
     *
     * @param \Udec\HomeBundle\Entity\LineaInvestigacion $lineaInvestigacion
     */
    public function removeLineasInvestigacion(\Udec\HomeBundle\Entity\LineaInvestigacion $lineasInvestigacion)
    {
        $this->LineasInvestigacion->removeElement($lineasInvestigacion);
    }

    /**
     * Get lineaInvestigacion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLineasInvestigacion()
    {
        return $this->LineasInvestigacion;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $integrantes;


    /**
     * Add integrante
     *
     * @param \Udec\HomeBundle\Entity\User $integrante
     *
     * @return Grupo
     */
    public function addIntegrante(\Udec\HomeBundle\Entity\User $integrante)
    {
        $this->integrantes[] = $integrante;

        return $this;
    }

    /**
     * Remove integrante
     *
     * @param \Udec\HomeBundle\Entity\User $integrante
     */
    public function removeIntegrante(\Udec\HomeBundle\Entity\User $integrante)
    {
        $this->integrantes->removeElement($integrante);
    }

    /**
     * Get integrantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntegrantes()
    {
        return $this->integrantes;
    }
}
