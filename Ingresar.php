<?php
// Se llega aquí mediante el método de "consultar" en el cual por medio de vue resource se mandan las variables aquí donde las recibimos por el método GET, se arma el query y se ejecuta; si el query se ejecuta con exito o no se muestra la alerta según el caso
if ( isset($_GET)) {
  mysql_query("SET NAMES 'utf8'");
  extract($_GET);
  include 'Entrar.php';
  $sql="(SELECT * FROM Retiros WHERE Cedula = '$cedula')";
  $resultado = mysql_query($sql,$link);
  if (!$resultado) {
    die('Invalid query: ' . mysql_error());
  } else {
    $output = array();
    while ($row = mysql_fetch_assoc($resultado)){
      $output[] = $row;
    };
    echo json_encode( $output , JSON_UNESCAPED_UNICODE);
    mysql_free_result($resultado);
    mysql_close($link);
  }
}else {
  $output = "Ingresa un valor valido";
  echo json_encode( $output , JSON_UNESCAPED_UNICODE);
}
?>
