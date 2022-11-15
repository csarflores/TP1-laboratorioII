<?php

require_once('conexion.php');

class MetodosProductos
{

  public function buscarProducto($codigoProducto)
  {
    $db = baseDatos::conectar();
    $select = $db->prepare('SELECT * FROM productos WHERE codigo_producto=:id');
    $select->bindValue('id', $codigoProducto);
    $select->execute();
    try {
      //al encontrar el id creo un nuevo objeto para pasar los datos
      $producto = $select->fetch();
      if ($producto) {
        $datoProducto = new Producto($producto['codigo_producto'], $producto['descripcion_producto'], $producto['precio'], $producto['porc_iva']);

        return $datoProducto;
      }
    } catch (Exception $e) {
      echo "Ups! Error al encontrar el número de comprobante. <br> \n";
      echo "Error: " . $e;
    }
  }

  public function insertarProducto($idVenta, $codigoProducto, $cantidad, $facturado=0)
  {
    if ($this->buscarProducto($codigoProducto)) {

      $db = baseDatos::conectar();
      $insert = $db->prepare('INSERT INTO detalle_ventas VALUES (NULL, :idVenta, :idProducto, :cantidad, :facturado)');
      $insert->bindValue('idVenta', $idVenta);
      $insert->bindValue('idProducto', $codigoProducto);
      $insert->bindValue('cantidad', $cantidad);
      $insert->bindValue('facturado', $facturado);
      $insert->execute();

      //paso el id correspondiente a esta cabecera
      return $this->listarIdVenta($idVenta);
    } else {
      return '404';
    }
  }

  public function listarIdVenta($idVenta)
  {
    $db = baseDatos::conectar();
    $select = $db->prepare("SELECT detalle_ventas.id_detalle AS 'Id Detalle', 
    detalle_ventas.id_producto AS 'Código Producto', 
    productos.descripcion_producto AS 'Descripcion', 
    detalle_ventas.cantidad AS 'Cantidad',
    productos.precio AS 'Precio',  
    productos.porc_iva AS 'Porcentaje IVA' 
    FROM detalle_ventas INNER JOIN productos 
    ON detalle_ventas.id_producto = productos.codigo_producto 
    AND detalle_ventas.id_venta = :id 
    ORDER BY detalle_ventas.id_detalle");
    $select->bindValue('id', $idVenta);
    $select->execute();

    try {
      $articulo = 1;
      $subtotal = 0;
      $iva = 0;
      $total = 0;
      while ($fila = $select->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $subtotal = $subtotal+($fila[3] * $fila[4]);
        $iva = $iva + ($fila[3] * $fila[4] * $fila[5]);
        $total = $subtotal + $iva;

        $datos = "<tr>
        <td class='text-center'>" . $articulo . "</td>" . 
        "<td class='text-center'>" . $fila[1] . "</td>" . 
        "<td class='text-start'>" . $fila[2] . "</td>" . 
        "<td class='text-center'>" . $fila[3] . "</td>" . 
        "<td class='text-center'>" . $fila[4] . "</td>" . 
        "<td class='text-center'>" . $fila[5] * 100 . "</td>" . 
        "<td class='text-center'>" . ($fila[3] * $fila[4]) * (1 + $fila[5]) . "</td>" . 
        "<td><a class='accion' onclick='eliminarProducto(" . $fila[0] . ")'><i class='bi bi-trash' style='margin: 3px;'></i></a></td>
        </tr>";
        print $datos;
        $articulo++;
      }
      //echo "<td class='text-center' id='subtotal'>". $subtotal . "</td>";
      $select = null;
    } catch (PDOException $e) {
      print $e->getMessage();
    }
  }

  public function eliminarProductoDeComprobante($idDetalle, $idVenta)
  {
    $db = baseDatos::conectar();
    $eliminar = $db->prepare('DELETE FROM detalle_ventas WHERE id_detalle=:id');
    $eliminar->bindValue('id', $idDetalle);
    $eliminar->execute();

    //paso el id correspondiente a esta cabecera
    return $this->listarIdVenta($idVenta);
  }
}
