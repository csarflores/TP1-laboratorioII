<?php

class CabeceraComprobanteFacturacion{
    private $idVenta;
    private $idCliente;
    private $fechaComprobante;
    private $tipoComprobante;
    private $codigoTipoComprobante;
    private $descripcionTipoComprobante;
    private $talonarioComprobante;
    private $numeroComprobante;
	private $subtotal;
	private $iva;
	private $total;
	private $tabla;

    function __construct(){}

	public function getIdVenta(){
		return $this->idVenta;
	}

	public function setIdVenta($idVenta){
		$this->idVenta = $idVenta;
	}

	public function getIdCliente(){
		return $this->idCliente;
	}

	public function setIdCliente($idCliente){
		$this->idCliente = $idCliente;
	}

	public function getFechaComprobante(){
		return $this->fechaComprobante;
	}

	public function setFechaComprobante($fechaComprobante){
		$this->fechaComprobante = $fechaComprobante;
	}

	public function getTipoComprobante(){
		return $this->tipoComprobante;
	}

    public function setTipoComprobante($tipoComprobante){
		$this->tipoComprobante = $tipoComprobante;
	}

	public function getCodigoTipoComprobante(){
		return $this->codigoTipoComprobante;
	}

    public function setCodigoTipoComprobante($codigoTipoComprobante){
		$this->codigoTipoComprobante = $codigoTipoComprobante;
	}

	public function getDescripcionTipoComprobante(){
		return $this->descripcionTipoComprobante;
	}

    public function setDescripcionTipoComprobante($descripcionTipoComprobante){
		$this->descripcionTipoComprobante = $descripcionTipoComprobante;
	}

	public function getTalonarioComprobante(){
		return $this->talonarioComprobante;
	}

	public function setTalonarioComprobante($talonarioComprobante){
		$this->talonarioComprobante = $talonarioComprobante;
	}

	public function getNumeroComprobante(){
		return $this->numeroComprobante;
	}

	public function setNumeroComprobante($numeroComprobante){
		$this->numeroComprobante = $numeroComprobante;
	}

	public function getSubtotal(){
		return $this->subtotal;
	}

	public function setSubtotal($subtotal){
		$this->subtotal = $subtotal;
	}

	public function getIva(){
		return $this->iva;
	}

	public function setIva($iva){
		$this->iva = $iva;
	}

	public function getTotal(){
		return $this->total;
	}

	public function setTotal($total){
		$this->total = $total;
	}
}


class DetalleComprobanteFacturacion{
    private $idVenta;
    private $idProducto;
    private $cantidad;

    function __construct(){}

    public function getIdVenta(){
		return $this->idVenta;
	}

	public function setIdVenta($idVenta){
		$this->idVenta = $idVenta;
	}

    public function getNroArticuloVenta(){
		return $this->nroArticuloVenta;
	}

    public function getIdProducto(){
		return $this->idProducto;
	}

	public function setIdProducto($idProducto){
		$this->idProducto = $idProducto;
	}

    public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}
}

class TipoComprobante{
	private $tipo;
	private $descripcion;
	private $talonario;
	private $numero;

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	public function getTalonario()
	{
		return $this->talonario;
	}

	public function setTalonario($talonario)
	{
		$this->talonario = $talonario;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}
}

?>