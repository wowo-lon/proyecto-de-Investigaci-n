<?php

namespace Udec\HomeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
//use Doctrine\ORM\Mapping as ORM;
/**
 * User
 */
class User extends BaseUser 
{
    
    protected $id;
    
    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_DOCENTE');
    }

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return User
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return User
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }
    
    public function getNombreCompleto()
    {
        return $this->nombre." ".$this->apellido ;
    }
    /**
     * @var string
     */
    private $cedula;


    /**
     * Set cedula
     *
     * @param string $cedula
     *
     * @return User
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $grupos;


    /**
     * Add grupo
     *
     * @param \Udec\HomeBundle\Entity\Grupo $grupo
     *
     * @return User
     */
    public function addGrupo(\Udec\HomeBundle\Entity\Grupo $grupo)
    {
        $this->grupos[] = $grupo;

        return $this;
    }

    /**
     * Remove grupo
     *
     * @param \Udec\HomeBundle\Entity\Grupo $grupo
     */
    public function removeGrupo(\Udec\HomeBundle\Entity\Grupo $grupo)
    {
        $this->grupos->removeElement($grupo);
    }

    /**
     * Get grupos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGrupos()
    {
        return $this->grupos;
    }
    /**
     * @var \Udec\HomeBundle\Entity\Proyecto
     */
    private $participantes;

    /**
     * @var \Udec\HomeBundle\Entity\Proyecto
     */
    private $protectos;


    /**
     * Set participantes
     *
     * @param \Udec\HomeBundle\Entity\Proyecto $participantes
     *
     * @return User
     */
    public function setParticipantes(\Udec\HomeBundle\Entity\Proyecto $participantes = null)
    {
        $this->participantes = $participantes;

        return $this;
    }

    /**
     * Get participantes
     *
     * @return \Udec\HomeBundle\Entity\Proyecto
     */
    public function getParticipantes()
    {
        return $this->participantes;
    }

    private $proyectos;


    /**
     * Add proyecto
     *
     * @param \Udec\HomeBundle\Entity\Proyecto $proyecto
     *
     * @return User
     */
    public function addProyecto(\Udec\HomeBundle\Entity\Proyecto $proyecto)
    {
        $this->proyectos[] = $proyecto;

        return $this;
    }

    /**
     * Remove proyecto
     *
     * @param \Udec\HomeBundle\Entity\Proyecto $proyecto
     */
    public function removeProyecto(\Udec\HomeBundle\Entity\Proyecto $proyecto)
    {
        $this->proyectos->removeElement($proyecto);
    }

    /**
     * Get proyectos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProyectos()
    {
        return $this->proyectos;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $proyectosParticipa;


    /**
     * Add proyectosParticipa
     *
     * @param \Udec\HomeBundle\Entity\Proyecto $proyectosParticipa
     *
     * @return User
     */
    public function addProyectosParticipa(\Udec\HomeBundle\Entity\Proyecto $proyectosParticipa)
    {
        $this->proyectosParticipa[] = $proyectosParticipa;

        return $this;
    }

    /**
     * Remove proyectosParticipa
     *
     * @param \Udec\HomeBundle\Entity\Proyecto $proyectosParticipa
     */
    public function removeProyectosParticipa(\Udec\HomeBundle\Entity\Proyecto $proyectosParticipa)
    {
        $this->proyectosParticipa->removeElement($proyectosParticipa);
    }

    /**
     * Get proyectosParticipa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProyectosParticipa()
    {
        return $this->proyectosParticipa;
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
     * @return User
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
