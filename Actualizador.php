<?php
// Se llega aquí mediante el método de actualizar en el cual por medio de vue resource se mandan las variables aquí donde las recibimos por el método post, se arma el query y se ejecuta; si el query se ejecuta con exito o no se muestra la alerta según el caso
mysql_query("SET NAMES 'utf8'");
include 'Entrar.php';
// Recibimos todos los datos por medio de POST y realizamos las respectivas validaciones
$nombres = $_POST['nombres'];
$cedula = $_POST['cedula'];
$Tipo = $_POST['Tipo'];
$Lugar  = $_POST['Lugar'];
$Laboro = $_POST['Laboro'];
$FechaRetiro = $_POST['FechaRetiro'];
$Telefono = $_POST['Telefono'];
$correoE = $_POST['correoE'];
$CiudadResidencia = $_POST['CiudadResidencia'];
$MotivoRetiro = $_POST['MotivoRetiro'];
$Jefe = $_POST['Jefe'];
$CargoJefe = $_POST['CargoJefe'];
$MotivoEspecifico = $_POST['MotivoEspecifico'];
$opciones = $_POST['MotivoRenuncia'];
$ObservacionesRenuncia = $_POST['ObservacionesRenuncia'];
$CapacitacionCargo = $_POST['CapacitacionCargo'];
$ObservacionesCargo = $_POST['ObservacionesCargo'];
$JefeInmediato = $_POST['JefeInmediato'];
$ObservacionesJefe = $_POST['ObservacionesJefe'];
$AcondicionamientoPuesto = $_POST['AcondicionamientoPuesto'];
$ObservacionesPuesto = $_POST['ObservacionesPuesto'];
$Experiencia = $_POST['Experiencia'];
$ObservacionesExperiencia = $_POST['ObservacionesExperiencia'];
$Cambiar = $_POST['Cambiar'];
$Recomendaciones = $_POST['Recomendaciones'];
$FirmaColaborador = $_POST['FirmaColaborador'];
// Creamos la consulta
$sql="UPDATE Retiros
SET
Nombre = '$nombres',
TipoDocumento = '$Tipo',
CiudadExpedicion = '$Lugar',
CiudadLoboro = '$Laboro',
FechaRetiro = '$FechaRetiro',
Telefono = '$Telefono',
CorreoE = '$correoE',
CiudadResidencia = '$CiudadResidencia',
MotivoRetiro = '$MotivoRetiro',
NombreJefe = '$Jefe',
CargoJefe = '$CargoJefe',
MotivoEspecifico = '$MotivoEspecifico',
MotivoRenuncia = '$opciones',
ObservacionRenuncia = '$ObservacionesRenuncia',
CapacitacionCargo = '$CapacitacionCargo',
ObservacionCapacitacion = '$ObservacionesCargo',
JefeInmediato = '$JefeInmediato',
ObservacionJefe = '$ObservacionesJefe',
AcondicionamientoPuesto = '$AcondicionamientoPuesto',
ObservacionPuesto = '$ObservacionesPuesto',
ConclusionGeneral= '$Experiencia',
ObservacionConclusion = '$ObservacionesExperiencia',
Cambiarias = '$Cambiar',
Recomendaciones = '$Recomendaciones',
FirmaColaborador = '$FirmaColaborador'
WHERE Cedula = '$cedula'";
//La firma del jefe no se puede actualizar por que la actualizaria el colaborador, entonces no la ponemos en el query; la firma del Jefe se sube mediante el excel//
// Ejecutamos el Query para Actualizar la información en BD
echo $sql;
$resultado = mysql_query($sql,$link);
if (!$resultado) {
  $Respuesta= ('Invalid query: ' . mysql_error());
} else {

  $Respuesta= json_encode("Datos actualizados", JSON_UNESCAPED_UNICODE);
}
mysql_close($link);
?>
