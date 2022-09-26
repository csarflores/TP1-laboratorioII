<?php

require_once('conexion.php');

class CrudCliente
{
  // constructor de la clase
  public function __construct()
  {
  }

  //método para insertar, recibe como parámetro un objeto de tipo cliente desde controladorCliente.php
  public function insertar($cliente)
  {
    $db = baseDatos::conectar();
    $insert = $db->prepare('INSERT INTO clientes VALUES (NULL, :nombre, :apellido, :domicilio, :ciudad, :telefono, :nombreEmpresa, :activo, :cantidadDeCompras, :tipoDeCliente, :importeUltimaFactura, :fechaCreacion, :fechaModificacion)');
    $insert->bindValue('nombre', $cliente->getNombre());
    $insert->bindValue('apellido', $cliente->getApellido());
    $insert->bindValue('domicilio', $cliente->getDomicilio());
    $insert->bindValue('ciudad', $cliente->getCiudad());
    $insert->bindValue('telefono', $cliente->getTelefono());
    $insert->bindValue('nombreEmpresa', $cliente->getNombreEmpresa());
    $insert->bindValue('activo', $cliente->getActivo());
    $insert->bindValue('cantidadDeCompras', $cliente->getCantidadDeCompras());
    $insert->bindValue('tipoDeCliente', $cliente->getTipoDeCliente());
    $insert->bindValue('importeUltimaFactura', $cliente->getImporteUltimaFactura());
    $insert->bindValue('fechaCreacion', $cliente->getFechaCreacion());
    $insert->bindValue('fechaModificacion', $cliente->getFechaModificacion());
    $insert->execute();
  }

  //método para mostrar todos los clientes
  public function mostrar()
  {
    $db = baseDatos::conectar();
    $listarClientes = [];
    $select = $db->query('SELECT * FROM clientes');

    foreach ($select->fetchAll() as $cliente) {
      //Creo el objeto Cliente
      $atributoCliente = new Cliente();

      //Consulto los atributos del objeto
      $atributoCliente->setId($cliente['id']);
      $atributoCliente->setNombre($cliente['nombre']);
      $atributoCliente->setApellido($cliente['apellido']);
      $atributoCliente->setDomicilio($cliente['domicilio']);
      $atributoCliente->setCiudad($cliente['ciudad']);
      $atributoCliente->setTelefono($cliente['telefono']);
      $atributoCliente->setNombreEmpresa($cliente['nombre_empresa']);
      $atributoCliente->setActivo($cliente['estado']);
      $atributoCliente->setCantidadDeCompras($cliente['cantidad_compras']);
      $atributoCliente->setTipoDeCliente($cliente['tipo_cliente']);
      $atributoCliente->setImporteUltimaFactura($cliente['importe_ultima_factura']);
      $atributoCliente->setFechaCreacion($cliente['fecha_creacion']);
      $atributoCliente->setFechaModificacion($cliente['fecha_modificacion']);
      $listarClientes[] = $atributoCliente;
    }
    return $listarClientes;
  }

  // método para buscar un cliente, recibe como parámetro el id del cliente
  public function obtenerCliente($id)
  {
    $db = baseDatos::conectar();
    $select = $db->prepare('SELECT * FROM clientes WHERE ID=:id');
    $select->bindValue('id', $id);
    $select->execute();
    try{
      //al encontrar el id creo un nuevo objeto para pasar los datos
      $cliente = $select->fetch();
      $clienteObtenido = new Cliente();
      $clienteObtenido->setId($cliente['id']);
      $clienteObtenido->setNombre($cliente['nombre']);
      $clienteObtenido->setApellido($cliente['apellido']);
      $clienteObtenido->setDomicilio($cliente['domicilio']);
      $clienteObtenido->setCiudad($cliente['ciudad']);
      $clienteObtenido->setTelefono($cliente['telefono']);
      $clienteObtenido->setNombreEmpresa($cliente['nombre_empresa']);
      $clienteObtenido->setActivo($cliente['estado']);
      $clienteObtenido->setCantidadDeCompras($cliente['cantidad_compras']);
      $clienteObtenido->setTipoDeCliente($cliente['tipo_cliente']);
      $clienteObtenido->setImporteUltimaFactura($cliente['importe_ultima_factura']);
      $clienteObtenido->setFechaCreacion($cliente['fecha_creacion']);
      $clienteObtenido->setFechaModificacion($cliente['fecha_modificacion']);
      return $clienteObtenido;
    }catch(Exception $e){
      echo "Ups! No hemos encontrado el cliente. <br>";
      echo "Error: " . $e;
    }

  }

  // método para actualizar un cliente, recibe como parámetro el cliente
  public function actualizar($cliente)
  {
    $db = baseDatos::conectar();
    $actualizar = $db->prepare('UPDATE clientes SET nombre=:nombre, apellido=:apellido, domicilio=:domicilio, ciudad=:ciudad, telefono=:telefono, nombre_empresa=:nombreEmpresa, estado=:activo, tipo_cliente=:tipoDeCliente, fecha_modificacion=:fechaModificacion WHERE id=:id');
    $actualizar->bindValue('id', $cliente->getId());
    $actualizar->bindValue('nombre', $cliente->getNombre());
    $actualizar->bindValue('apellido', $cliente->getApellido());
    $actualizar->bindValue('domicilio', $cliente->getDomicilio());
    $actualizar->bindValue('ciudad', $cliente->getCiudad());
    $actualizar->bindValue('telefono', $cliente->getTelefono());
    $actualizar->bindValue('nombreEmpresa', $cliente->getNombreEmpresa());
    $actualizar->bindValue('activo', $cliente->getActivo());
    $actualizar->bindValue('tipoDeCliente', $cliente->getTipoDeCliente());
    $actualizar->bindValue('fechaModificacion', $cliente->getFechaModificacion());
    $actualizar->execute();
  }

 // método para actualizar un cliente, recibe como parámetro el cliente
 public function facturar($cliente)
 {
   $db = baseDatos::conectar();
   $facturar = $db->prepare('UPDATE clientes SET cantidad_compras=:cantidadDeCompras, importe_ultima_factura=:importeUltimaFactura WHERE id=:id');
   $facturar->bindValue('id', $cliente->getId());
   $facturar->bindValue('cantidadDeCompras', $cliente->getCantidadDeCompras());
   $facturar->bindValue('importeUltimaFactura', $cliente->getImporteUltimaFactura());
   $facturar->execute();
 }

  // método para eliminar un cliente, recibe como parámetro el id del cliente
  public function eliminar($id){
    $db=baseDatos::conectar();
    $eliminar=$db->prepare('DELETE FROM clientes WHERE id=:id');
    $eliminar->bindValue('id',$id);
    $eliminar->execute();
  }

}
