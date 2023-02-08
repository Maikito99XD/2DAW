<?php

class ImagenGaleria
{
    const RUTA_IMAGENES_GALLERY = 'images/';
    
    private int $id;
    private string $nombre;
    private string $descripcion;
    private int $numVisualizaciones;
    private int $numLikes;
    private int $numDownload;

    //CONSTRUCTOR
    public function __construct(string $nombre="", 
                                string $descripcion="", 
                                int $numVisualizaciones = 0, 
                                int $numLikes = 0,
                                int $numDownload = 0)
    {
        //$this->id = 0;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownload = $numDownload;
    }


    //METDODOS
    public function __toString()
    {
        return $this->getDescripcion();
    }


    //GETERS Y SETERS
    public function getID()
    {
    return $this->id;
    }
    
    public function getNombre()
    {
    return $this->nombre;
    }

    public function setNombre(string $nombre) : ImagenGaleria
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDescripcion()
    {
    return $this->descripcion;
    }

    public function setDescripcion(string $descripcion) : ImagenGaleria
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getNumVisualizaciones()
    {
    return $this->numVisualizaciones;
    }

    public function setNumVisualizaciones(int $numVisualizaciones) : ImagenGaleria
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    public function getNumLikes()
    {
    return $this->numLikes;
    }

    public function setNumLikes(int $numLikes) : ImagenGaleria
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    public function getNumDownload()
    {
    return $this->numDownload;
    }

    public function setNumDownload(int $numDownload) : ImagenGaleria
    {
        $this->numDownload = $numDownload;
        return $this;
    }


    //GETERS Rutas
    public function getUrlGallery() : string
    {
    return self::RUTA_IMAGENES_GALLERY . $this->getNombre();
    }

}

