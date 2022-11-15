<?php

class Producto{
    private $idVenta;
    private $codigoProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $porcentajeIvaProducto;

    //PHP no acepta sobrecarga
    public function __construct($codigoProducto, $descripcionProducto, $precioProducto, $porcentajeIvaProducto){
        $this->codigoProducto = $codigoProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->precioProducto = $precioProducto;
        $this->porcentajeIvaProducto = $porcentajeIvaProducto;
    }

    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;
    }

    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;
    }

    public function getPorcentajeIvaProducto()
    {
        return $this->porcentajeIvaProducto;
    }

    public function setPorcentajeIvaProducto($porcentajeIvaProducto)
    {
        $this->porcentajeIvaProducto = $porcentajeIvaProducto;
    }
    public function mostrarProducto(){
         
        // Llamamos a otros métodos
        $info = "<h1>Información del producto:</h1>";
        $info.= "Codigo: ".$this->codigoProducto;
        $info.= "<br/> Descripcion: ".$this->descripcionProducto;
        $info.= "<br/> Precio: ".$this->precioProducto;
        $info.= "<br/> IVA: ".$this->ivaProducto;
         
        return $info;
    }

    public function getIdVenta()
    {
        return $this->idVenta;
    }
}