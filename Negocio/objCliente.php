<?php
class Cliente{
	private $id;
	private $nombre;
	private $apellido;
	private $domicilio;
	private $ciudad;
	private $telefono;
	private $nombreEmpresa;
	private $activo;
	private $cantidadDeCompras;
	private $tipoDeCliente;
	private $importeUltimaFactura;
	private $fechaCreacion;
	private $fechaModificacion;

	function __construct(){}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
	return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function getDomicilio(){
		return $this->domicilio;
	}

	public function setDomicilio($domicilio){
		$this->domicilio = $domicilio;
	}

	public function getCiudad(){
		return $this->ciudad;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getNombreEmpresa(){
		return $this->nombreEmpresa;
	}

	public function setNombreEmpresa($nombreEmpresa){
		$this->nombreEmpresa = $nombreEmpresa;
	}

	public function getActivo(){
		return $this->activo;
	}

	public function setActivo($activo){
		$this->activo = $activo;
	}

	public function getCantidadDeCompras(){
		return $this->cantidadDeCompras;
	}

	public function setCantidadDeCompras($cantidad){
		$this->cantidadDeCompras = $cantidad;
	}

	public function getTipoDeCliente(){
		return $this->tipoDeCliente;
	}

	public function setTipoDeCliente($tipoDeCliente){
		$this->tipoDeCliente = $tipoDeCliente;
	}

	public function getImporteUltimaFactura(){
		return $this->importeUltimaFactura;
	}

	public function setImporteUltimaFactura($importeUltimaFactura){
		$this->importeUltimaFactura = $importeUltimaFactura;
	}

	public function getFechaCreacion(){
		return $this->fechaCreacion;
	}

	public function setFechaCreacion($fechaCreacion){
		$this->fechaCreacion = $fechaCreacion;
	}

	public function getFechaModificacion(){
		return $this->fechaModificacion;
	}

	public function setFechaModificacion($fechaModificacion){
		$this->fechaModificacion = $fechaModificacion;
	}
}