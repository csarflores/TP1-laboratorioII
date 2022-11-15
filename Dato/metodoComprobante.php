<?php

require_once('conexion.php');

class MetodosCabeceraFacturacion
{
    // constructor de la clase
    public function __construct()
    {
    }

    /**
     * Inserta la cabecera del comprobante
     */
    public function insertar($cabeceraFacturacion)
    {
        $db = baseDatos::conectar();
        $insert = $db->prepare('INSERT INTO ventas VALUES (NULL, :idCliente, :fechaComprobante, :tipoComprobante, :talonarioComprobante, :numeroComprobante, :subtotal, :iva, :total)');
        $insert->bindValue('idCliente', $cabeceraFacturacion->getIdCliente());
        $insert->bindValue('fechaComprobante', $cabeceraFacturacion->getFechaComprobante());
        $insert->bindValue('tipoComprobante', $cabeceraFacturacion->getTipoComprobante());
        $insert->bindValue('talonarioComprobante', $cabeceraFacturacion->getTalonarioComprobante());
        $insert->bindValue('numeroComprobante', $cabeceraFacturacion->getNumeroComprobante());
        $insert->bindValue('subtotal', $cabeceraFacturacion->getSubtotal());
        $insert->bindValue('iva', $cabeceraFacturacion->getIva());
        $insert->bindValue('total', $cabeceraFacturacion->getTotal());
        $insert->execute();

        //paso el id correspondiente a esta cabecera
        $id = $db->lastInsertId();
        $cabeceraFacturacion->setIdVenta($id);
    }

    /**
     * Actualiza el número del comprobante en la tabla tipos_comprobantes
     */
    public function actualizarTiposComprobantes($idTipoComprobante)
    {
        $db = baseDatos::conectar();
        $actualizarNroComprobante = $db->prepare('UPDATE tipos_comprobantes SET ultimo_numero=:numeroComprobante WHERE id_tipo_comprobante=:tipoComprobante');
        $actualizarNroComprobante->bindValue('tipoComprobante', $idTipoComprobante->getTipoComprobante());
        $actualizarNroComprobante->bindValue('numeroComprobante', $idTipoComprobante->getNumeroComprobante());
        $actualizarNroComprobante->execute();
    }

    /**
     * Obtiene los datos del tipo de comprobante y lo carga en el objeto tipoComprobante
     */
    public function obtenerTipoComprobante($idTipoComprobante)
    {
        $db = baseDatos::conectar();
        $select = $db->prepare('SELECT * FROM tipos_comprobantes WHERE id_tipo_comprobante=:id');
        $select->bindValue('id', $idTipoComprobante);
        $select->execute();
        try{
        //al encontrar el id creo un nuevo objeto para pasar los datos
            $comprobante = $select->fetch();
            $tipoComprobante = new TipoComprobante();
            $tipoComprobante->setTipo($comprobante['id_tipo_comprobante']);
            $tipoComprobante->setDescripcion($comprobante['descripcion']);
            $tipoComprobante->setTalonario($comprobante['talonario']);
            $tipoComprobante->setNumero($comprobante['ultimo_numero']);
            return $tipoComprobante;            
        } catch (Exception $e) {
            echo "Ups! Error al encontrar el número de comprobante. <br> \n";
            echo "Error: " . $e;
        }
    }
    
    /**
     * Lista en un array todos los tipos de comprobantes
     */
    public function mostrarTiposComprobantes()
    {
        $db = baseDatos::conectar();
        $listarTiposComprobantes = [];
        $select = $db->query('SELECT * FROM tipos_comprobantes');

        foreach ($select->fetchAll() as $tipoComprobante) {
            //Creo el objeto Cliente
            $atributoComprobante = new CabeceraComprobanteFacturacion();

            //Consulto los atributos del objeto
            $atributoComprobante->setCodigoTipoComprobante($tipoComprobante['id_tipo_comprobante']);
            $atributoComprobante->setTipoComprobante($tipoComprobante['codigo']);
            $atributoComprobante->setDescripcionTipoComprobante($tipoComprobante['descripcion']);
            $atributoComprobante->setTalonarioComprobante($tipoComprobante['talonario']);
            $atributoComprobante->setNumeroComprobante($tipoComprobante['ultimo_numero']);

            $listarTiposComprobantes[] = $atributoComprobante;
        }
        return $listarTiposComprobantes;
    }

    /**
     * Obtener cabecera
     */
     public function obtenerCabecera($idCabecera)
     {
        $db = baseDatos::conectar();
        $select = $db->prepare('SELECT * FROM ventas WHERE id_venta=:id');
        $select->bindValue('id', $idCabecera);
        $select->execute();
        try{
            //al encontrar el id creo un nuevo objeto para pasar los datos
            $cabecera = $select->fetch();
            $datoCabecera = new CabeceraComprobanteFacturacion();
            $datoCabecera->setIdVenta($cabecera['id_venta']);
            $datoCabecera->setIdCliente($cabecera['id_cliente']);
            $datoCabecera->setFechaComprobante($cabecera['fecha_comprobante']);
            $datoCabecera->setTipoComprobante($cabecera['tipo_comprobante']);
            $datoCabecera->setCodigoTipoComprobante($cabecera['tipo_comprobante']);
            $datoCabecera->setDescripcionTipoComprobante('');
            $datoCabecera->setTalonarioComprobante($cabecera['talonario_comprobante']);
            $datoCabecera->setNumeroComprobante($cabecera['numero_comprobante']);
            $datoCabecera->setSubtotal($cabecera['subtotal']);
            $datoCabecera->setIva($cabecera['iva']);
            $datoCabecera->setTotal($cabecera['total']);
            return $datoCabecera;            
        } catch (Exception $e) {
            echo "Ups! Error al encontrar el número de comprobante. <br> \n";
            echo "Error: " . $e;
        }
     }

    public function actualizarTiposComprobantesDecremento($idTipoComprobante, $numeroComprobante)
    {
        $db = baseDatos::conectar();
        $actualizarNroComprobante = $db->prepare('UPDATE tipos_comprobantes SET ultimo_numero=:numeroComprobante WHERE id_tipo_comprobante=:tipoComprobante');

        $actualizarNroComprobante->bindValue('tipoComprobante', $idTipoComprobante);
        $actualizarNroComprobante->bindValue('numeroComprobante', $numeroComprobante-1);
        $actualizarNroComprobante->execute();
    }

    // método para eliminar la cabecera, se activa cuando el usuario cancela el detalle del comprobante
    public function eliminarCabecera($id){
        $db=baseDatos::conectar();
        $eliminar=$db->prepare('DELETE FROM ventas WHERE id_venta=:id');
        $eliminar->bindValue('id',$id);
        $eliminar->execute();
    }

    public function facturar($idVenta)
    {
        $db = baseDatos::conectar();
        $facturar = $db->prepare('UPDATE detalle_ventas SET facturado=1 WHERE id_venta=:idVenta');
        $facturar->bindValue('idVenta', $idVenta);
        $facturar->execute();
    }
}
