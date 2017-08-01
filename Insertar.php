<?php
//Se llega aquí mediante el método de vue resource "subir", en el cual por medio de la librería "papaparse" se extraen los datos y se reciben aquí por "post" en un array; array que se recorre, en cada registro se crea un query, se va ingresando la información de cada uno de los colaboradores//
  header("Content-Type: text/html;charset=utf-8");
  mysql_query("SET NAMES 'utf8'");
  include 'Entrar.php';
  $data = $_POST['data'];
  // // Recibimos todos los datos por medio de POST y realizamos las respectivas validaciones
  $values = '';
  $mensajes = [];

  for ($i=1; $i < (count($data))-1; $i++) {
    $values = "'".implode("', '", $data[$i])."'";
    $sql="INSERT INTO Retiros (Cedula, Nombre,TipoDocumento,CiudadExpedicion,CiudadLoboro,FechaRetiro,Telefono,
      CorreoE,CiudadResidencia,MotivoRetiro,NombreJefe,CargoJefe,FirmaJefe,Suma,Conceptos,
      ValorEquipo,ValorHerramientas,NombreOtro,ValorOtro,Computador,ObservacionComputador,
      TelefonoMovil,ObservacionMovil,SimCard,ObservacionSim,Portatil,ObservacionPortatil,
      Tablet,ObservacionTablet, Diadema, ObservacionDiadema, Avaya, ObservacionAvaya, Carne, ObservacionCarne, Tarjeta, ObservacionTarjeta, Vestuario, ObservacionVestuario, Proteccion, ObservacionProteccion, Herramientas, ObservacionHerramientas, Documento, ObservacionDocumento, Anticipo, ObservacionAnticipo, NombreElementos, ObservacionElementos, EntregaElementos)
      VALUES ($values)";

      // Creamos la consulta
      // Ejecutamos el Query para Actualizar la información en BD
      $resultado = mysql_query($sql,$link);
      if (!$resultado) {
        $mensajes[] = 'Entrada ' . $i . ' errada: ' . mysql_error();
      } else {
        $mensajes[] = 'Entrada ' . $i . ' correcta'. $data[$i][0];
      }
  }
  echo json_encode($mensajes);// echo json_encode($sql);
  mysql_close($link);
?>
