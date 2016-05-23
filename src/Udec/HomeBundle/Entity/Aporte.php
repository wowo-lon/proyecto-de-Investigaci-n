<?php

namespace Udec\HomeBundle\Entity;

/**
 * Aporte
 */
class Aporte
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $resumen;

    /**
     * @var string
     */
    private $documento;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Aporte
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set resumen
     *
     * @param string $resumen
     *
     * @return Aporte
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
     * Set documento
     *
     * @param string $documento
     *
     * @return Aporte
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

    
    /**
     * @var \Udec\HomeBundle\Entity\Proyecto
     */
    private $proyecto;


    /**
     * Set proyecto
     *
     * @param \Udec\HomeBundle\Entity\Proyecto $proyecto
     *
     * @return Aporte
     */
    public function setProyecto(\Udec\HomeBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \Udec\HomeBundle\Entity\Proyecto
     */
    public function getProyecto()
    {
        return $this->proyecto;
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
        return 'documentos/'.$this->getProyecto()->getNombre();
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
}
