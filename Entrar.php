<?php
//Conexión con la BD
mysql_query("SET NAMES 'utf8'");
if (!($link = mysql_connect("localhost", "usuario_desa", "pd3sar*270"))) {
 echo "Error conectando a la base de datos.";
 exit();
}
if (!mysql_select_db("Indicadores_desa", $link)) {
 echo "Error seleccionando la base de datos.";
 exit();
}
mysql_query("SET NAMES 'utf8'");
return $link;
mysqli_close($link);
 ?>
