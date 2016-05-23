<?php

namespace Udec\HomeBundle\Entity;

/**
 * Proyecto
 */
class Proyecto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $resumen;


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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Proyecto
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Proyecto
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
     * Set resumen
     *
     * @param string $resumen
     *
     * @return Proyecto
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Get resumen
     *
     * @return string
     */
    public function getResumen()
    {
        return $this->resumen;
    }
    
    /**
     * @var \Udec\HomeBundle\Entity\User
     */
    private $director;


    /**
     * Set director
     *
     * @param \Udec\HomeBundle\Entity\User $director
     *
     * @return Proyecto
     */
    public function setDirector(\Udec\HomeBundle\Entity\User $director = null)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return \Udec\HomeBundle\Entity\User
     */
    public function getDirector()
    {
        return $this->director;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $participantes;

    

    /**
     * Add participante
     *
     * @param \Udec\HomeBundle\Entity\User $participante
     *
     * @return Proyecto
     */
    public function addParticipante(\Udec\HomeBundle\Entity\User $participante)
    {
        $this->participantes[] = $participante;

        return $this;
    }

    /**
     * Remove participante
     *
     * @param \Udec\HomeBundle\Entity\User $participante
     */
    public function removeParticipante(\Udec\HomeBundle\Entity\User $participante)
    {
        $this->participantes->removeElement($participante);
    }

    /**
     * Get participantes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipantes()
    {
        return $this->participantes;
    }
    /**
     * @var string
     */
    private $documento;


    /**
     * Set documento
     *
     * @param string $documento
     *
     * @return Proyecto
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    public function getAbsolutePath() {
        return null === $this->documento ? null : $this->getUploadRootDir() . '/' . $this->documento;
    }

    public function getWebPath() {
        return null === $this->documento ? null : $this->getUploadDir() . '/' . $this->documento;
    }

    public function getUploadRootDir() {
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        return 'documentos/'.$this->getNombre();
    }

    public function upload() {

        if (null === $this->getDocumento()) {
            return;
        }

        $this->getDocumento()->move(
            $this->getUploadRootDir(), $this->getDocumento()->getClientOriginalName()
            );

        $this->documento = $this->getDocumento()->getClientOriginalName();

        $this->file = null;
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $aportes;


    /**
     * Add aporte
     *
     * @param \Udec\HomeBundle\Entity\Aporte $aporte
     *
     * @return Proyecto
     */
    public function addAporte(\Udec\HomeBundle\Entity\Aporte $aporte)
    {
        $this->aportes[] = $aporte;

        return $this;
    }

    /**
     * Remove aporte
     *
     * @param \Udec\HomeBundle\Entity\Aporte $aporte
     */
    public function removeAporte(\Udec\HomeBundle\Entity\Aporte $aporte)
    {
        $this->aportes->removeElement($aporte);
    }

    /**
     * Get aportes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAportes()
    {
        return $this->aportes;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->participantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->aportes = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
