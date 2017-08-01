<?php
//EL pdf donde se puede ver la información del colaborador se realizó con la ayuda de la libreria "TCPDF" en la que simplemente se tiene una cabecera y un pie para todas las páginas y dentro de cada página se crea una variable con toda la información y las variables que se necesitan, que llegan aquí mediante el método post de "Index.php"//
$AbrirPDF =$_POST["AbrirPDF"];//Controla si abre el pdf
$tamano=$_FILES['imagen']['size'];//tamaño del archivo que se sube
$tamaño_max="200000000";//tamaño máximo  del archivo
$mensaje="";
$Tipo = explode(".", $_FILES['imagen']['name']);//Tipo de archivo
$extension = end($Tipo);// extension del archivo a subir
if ($tamano<$tamaño_max and $extension=="png" || $extension=="jpeg" )//solo se admiten archivos
{
  $target_path = "subidas/";
  $target_path = $target_path . basename( $_FILES['imagen']['name']);
  if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path))
  {
    $mensaje= "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";
  }
  else
  {
    $mensaje= "Ha ocurrido un error, trate de nuevo!";
  }
}else {
  $mensaje ="el archivo es demasiado grande o no corresponde con las extensiones válidas";
}
$tamano1=$_FILES['imagen1']['size'];
$mensaje1="";
$Tipo1 = explode(".", $_FILES['imagen1']['name']);
$extension1 = end($Tipo1);
if ($tamano1<$tamaño_max and $extension1=="png" || $extension1=="jpeg" )
{
  $target_path = "subidas/";
  $target_path = $target_path . basename( $_FILES['imagen1']['name']);
  if(move_uploaded_file($_FILES['imagen1']['tmp_name'], $target_path))
  {
    $mensaje1 = "El archivo ". basename( $_FILES['imagen1']['name']). " ha sido subido";
  }
  else
  {
    $mensaje1 = "Ha ocurrido un error, trate de nuevo!";
  }
}else {
  $mensaje1 ="el archivo es demasiado grande o no corresponde con las extensiones válidas";
}
$Archivo=$_FILES['imagen']['name'];//Datos
$Archivo1=$_FILES['imagen1']['name'];
$firmaJefe= $_POST["subirJefe"];
$Nombres= $_POST["Nombres"];
$Nombres= "  ".$Nombres;
$TipoDocumento= $_POST["TipoDocumento"];
$Documento= $_POST["Documento"];
$Lugar =$_POST["Lugar"];
$CiudadLaboro =$_POST["CiudadLaboro"];
$FRetiro =$_POST["FRetiro"];
$Telefonoc =$_POST["Telefonoc"];
$Correo =$_POST["Correo"];
$CiudadResidencia =$_POST["CiudadResidencia"];
$MotivoRetiro =$_POST["MotivoRetiro"];
$Suma =$_POST["Suma"];
$conceptos =$_POST["conceptos"];
$Respuesta =$_POST["Respuesta"];
$NombreJefeInmediato =$_POST["NombreJefeInmediato"];
$CargoJefeInmediato =$_POST["CargoJefeInmediato"];
$file= $_POST["firmate"];
$file1= $_POST["firmate1"];
$firma= $_POST["firma"];

$DescuentosHerramientas =$_POST["DHerramientas"];
$DescuentoEquipos =$_POST["DEquipos"];
$NombreOtro = $_POST["NDOtro"];
$DescuentoOtro = $_POST["DOtro"];
$firmaColaborador= $_POST["subir"];
//Si el colaborador en Index.php eligió firmar o no
//Este condicional al fin del proyecto no es tan eficaz ya que si el colaborador elige subir su firma de igual manera se guarda en código en la BD, y al realizar la consulta de los datos no toma la ubicación si no que lee el código y lo muestra
if ($firmaColaborador=="subir") {
  $FirmaDelColaborador="subidas/".$Archivo;
}
else if ($firmaColaborador=="Firmar") {
  $file='data:'.$file;
  $FirmaDelColaborador=$file;
}
if ($firmaJefe=="subirJefe") {
  $FirmaDelJefe="subidas/".$Archivo1;
}
else if ($firmaJefe=="FirmarJefe") {
  $file1='data:'.$file1;
  $FirmaDelJefe=$file1;
}

$NoDevolucion = <<<EOD

EOD;
//Este condicional se hace para mostrarle al colaborador lo que se le va  a descontar, en caso de que el jefe halla respondido que No se le va a descontar nada, en el pdf solo se muestra un mensaje "El colaborador no aplica a descuentos" y desparecen campos como "suma" y la lista de conceptos

//Variables de la calificación de la experiencia del colaborador
$Induccion =$_POST["Induccion"];
$Jefe =$_POST["Jefe"];
$Puesto =$_POST["Puesto"];
$General =$_POST["General"];
$Recomendaciones =$_POST["Recomendaciones"];
$ObservacionesInduccion =$_POST["ObservacionesInduccion"];//Observaciones
$ObservacionesJefe =$_POST["ObservacionesJefe"];
$Observacionespuesto =$_POST["Observacionespuesto"];
$ObservacionesGeneral =$_POST["ObservacionesGeneral"];
$cambiar = $_POST["cambios"];
$Cambiarias = '';
//Los diferentes conceptos que el colaborador quisiera cambiar de la empresa
foreach($cambiar as $selector){
  $Cambiarias = $Cambiarias.$selector.".";
}
$ResultadoI="";
$ResultadoJ="";
$ResultadoP="";
$ResultadoG="";
//paz y salvo
$Computador =$_POST["Computador"];
$OComputador =$_POST["OComputador"];
$Telefono =$_POST["Telefono"];
$OTelefono =$_POST["OTelefono"];
$Sim =$_POST["Sim"];
$OSim =$_POST["OSim"];
$portatil =$_POST["portatil"];
$Oportatil =$_POST["Oportatil"];
$Tablet =$_POST["Tablet"];
$OTablet =$_POST["OTablet"];
$Diadema =$_POST["Diadema"];
$ODiadema =$_POST["ODiadema"];
$Avaya =$_POST["Avaya"];
$OAvaya =$_POST["OAvaya"];
$carne=$_POST["carne"];
$Ocarne=$_POST["Ocarne"];
$Tarjeta=$_POST["Tarjeta"];
$OTarjeta=$_POST["OTarjeta"];
$Vestuario=$_POST["Vestuario"];
$OVestuario=$_POST["OVestuario"];
$Elementos=$_POST["Elementos"];
$OElementos=$_POST["OElementos"];
$Herramientas=$_POST["Herramientas"];
$OHerramientas=$_POST["OHerramientas"];
$Documentos=$_POST["Documentos"];
$ODocumentos=$_POST["ODocumentos"];
$Anticipo=$_POST["Anticipo"];
$OAnticipo=$_POST["OAnticipo"];
$NombreOtros=$_POST["NombreOtros"];
$Otros=$_POST["Otros10"];
$Descripcion=$_POST["Descripcion"];
$Respuesta="";
//En caso de que el colaborador halla renunciado se pregunta porqué motivo y se muestra lo que se tenga que mostrar, en caso de que lo halla despedido solo se muestra el motivo y ya//
if ($MotivoRetiro=="Renuncia voluntaria"){
  $Respuesta=$MotivoRenuncia =$_POST["MotivoRenuncia"];
  //En caso de que halla renunciado por una mejor oferta  se llena un array con los diferentes motivos especificos y se muestran en la primer hoja //
  if ($MotivoRenuncia=="Mejor oferta laboral")
  {
    $Mejor=$_POST["Mejor"];
    $datosMejor = "<br>";
    foreach($Mejor as $selected){
      $datosMejor=$datosMejor.$selected.".";
    }
    $Respuesta=$Respuesta. $datosMejor."<br>".$NuevaEmpresa=$_POST["ObservacionesOferta"];
  };
  if ($MotivoRenuncia=="Situación familiar")
  {
    $Respuesta=$Respuesta."<br>".$Familiar=$_POST["Familiar"];
    if ($Familiar=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Otro=$_POST["Otro1"];
    };
  };
  if ($MotivoRenuncia=="Dificultades con su jefe inmediato")
  {
    $Respuesta=$Respuesta."<br>".$Dificultades=$_POST["Dificultades"];
    if ($Dificultades=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Otro=$_POST["Otro2"];
    };
  };
  if ($MotivoRenuncia=="Inflexibilidad de horarios")
  {
    $Respuesta=$Respuesta."<br>".$Inflexibilidad=$_POST["Inflexibilidad"];
    if ($Inflexibilidad=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Otro=$_POST["Otro3"];
    };
  };
  if ($MotivoRenuncia=="Continuidad de estudios")
  {
    $Respuesta=$Respuesta."<br>".$Continuidad=$_POST["Continuidad"];
    if ($Continuidad=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Otro=$_POST["Otro4"];
    };
  };
  if ($MotivoRenuncia=="Incumplimiento de las condiciones ofertadas en el proceso de selección y capacitación")
  {
    $Respuesta=$MotivoRenuncia."<br>".$observaciones=$_POST["Otro5"];
  };
  if ($MotivoRenuncia=="Impuntualidad e inconvenientes con el pago de la nómina")
  {
    $Respuesta=$MotivoRenuncia."<br>".$observaciones=$_POST["Otro6"];
  };
  if ($MotivoRenuncia=="Ambiente laboral")
  {
    $Respuesta=$Respuesta."<br>".$Ambiente=$_POST["Ambiente"];
    if ($Ambiente=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Otro=$_POST["Otro7"];
    };
  };
  if ($MotivoRenuncia=="Traslado de ciudad / viaje")
  {
    $Respuesta=$Respuesta."<br>".$Traslado=$_POST["Traslado"];
    if ($Traslado=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Otro=$_POST["Otro8"];
    };
  };
  if ($MotivoRenuncia=="Otros proyectos")
  {
    $Respuesta=$Respuesta."<br>".$Otros=$_POST["Otros"];
    if ($Otros=="Otro") {
      $Respuesta=$MotivoRenuncia."<br>".$Observaciones=$_POST["Otro9"];
    };
  };
}elseif ($MotivoRetiro=="Decisión de la empresa") {
  $Respuesta=$Empresa =$_POST["Empresa"];
};
if ($Induccion=="Regular" OR $Induccion=="Mala" ) {
  $ResultadoI="Justificación:"." ".$ObservacionesInduccion =$_POST["ObservacionesInduccion"];
};
if ($Jefe=="Regular" OR $Jefe=="Mala" ) {
  $ResultadoJ="Justificación: "." ".$ObservacionesJefe =$_POST["ObservacionesJefe"];
};
if ($Puesto=="Regular" OR $Puesto=="Mala" ) {
  $ResultadoP="Justificación: "." ".$Observacionespuesto =$_POST["Observacionespuesto"];
};
if ($General=="Regular" OR $General=="Mala" ) {
  $ResultadoG="Justificación: "." ".$ObservacionesGeneral =$_POST["ObservacionesGeneral"];
};
//Aquí empieza la contrucción del pdf//
require_once('TCPDF-master/tcpdf.php');
$numero=date('n');
function nombremes($mes){
  setlocale(LC_TIME, 'spanish');
  $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000));
  return $nombre;
}
$mes=nombremes($numero);
class MYPDF extends TCPDF {
  public function Header() {//Logo que se muestra en todas la hojas del pdf
    $image_file = K_PATH_IMAGES.'logo-emtelco-_cxbpo.png';
    $this->Image($image_file, 10, 10,70, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
    $this->SetFont('helvetica', 'B', 18);//fuente
  }
  public function Footer() {  // Page footer
    $this->SetY(-11);//posición del pie de página
    $this->SetFont('helvetica', 'I',5 );//fuente
    $this->Cell(0, 7, 'Ubicación: calle 14 Nº 52 A 174 / Código Postal 050024 / Correspondencia: calle 14 N° 52A - 174, Sede Olaya, Medellín
    Teléfono: +57 (4) 389 7000 / Sede Bogotá carrera 69 Nº 98 A - 11 Piso 2 / C.C. Floresta Outlet / Teléfono: + 57 (1) 486 3500');
  }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);// información del documento
$pdf->SetAuthor('Emtelco');//autor
$pdf->SetTitle('DocumentosRetiro');//Título
$Semana=date('d');//Sacar el día de la seman
$año=date('Y');// año
$dias = array("domingo","lunes","martes","mi&eacute;rcoles","jueves","viernes","s&aacute;bado");
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('times',  11);
$pdf->AddPage();
$dia="".$dias[date("w")];//día del mes
$html = <<<EOD
<p style="text-align:center"><h1>ENCUESTA DE RETIRO</h1></p>
<p>
Para Emtelco S.A.S es importante contar con tu opinión y experiencia durante el tiempo laborado en nuestra compañía.
Te invitamos a realizar esta encuesta que contribuirá al mejoramiento y desarrollo organizacional.
La información aquí suministrada es de uso confidencial de la Dirección de Talento Humano.
</p>
1.Nombres y apellidos:<b>$Nombres</b> <br>
2.Número de Identificación:  <b>$Documento</b>  <br>
3.Ciudad en la que laboró:   <b>$Lugar</b>  <br>
4.Fecha de retiro:    <b>$FRetiro</b>  <br>
5.Motivo de retiro:     <b>$MotivoRetiro</b>  <br>
6.Motivo específico:     <b>$Respuesta</b>
<p><b>7.Capacitación al cargo</b>
<br>
¿Cómo califica la inducción/capacitación que recibió para el desarrollo de sus funciones?: $Induccion <br> $ResultadoI
<br>
<br>
<b>8.¿Cómo considera el apoyo recibido de su jefe inmediato para el desarrollo de sus funciones?:</b> <br> $Jefe  <br>$ResultadoJ
<br>
<br>
<b>9.Acondicionamiento del puesto de trabajo</b>
<br>
¿Cómo considera el nivel de recursos en la organización (Equipos, Ventilación, Infraestructura,)?: $Puesto  <br>$ResultadoP
<br>
<br>
<b>10.Conclusión general</b><br>
La experiencia de haber trabajo con Emtelco, fue:$General  <br>$ResultadoG
<br>
<br>
<b>11.Si tuviera la oportunidad de cambiar aspectos de su experiencia en la compañía, ¿qué cambiarías?:</b> <br>
$Cambiarias
<br>
<br>
<b>Deseas compartir observaciones/recomendaciones que contribuyan al mejoramiento de la compañía: </b> <br>$Recomendaciones</p>
</div>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->AddPage();
$Instrucciones ='
<div style="text-align:center"><h1>INSTRUCCIONES PARA RETIRO DE PERSONAL</h1></div>
<div style="align="center>
Para realizar el retiro de personal se deben diligenciar los siguientes documentos en un
tiempo <b> no mayor a 48 horas  </b>   a la fecha de retiro y entregarse físicamente o si está fuera de
Medellín debe enviarse a través del CAD al área de nómina en un sobre cerrado si el
empleador es Emtelco, y si el empleador es la temporal se debe entregar al ejecutivo de
Acción que se encuentra en las sedes de Emtelco.
<br>
<br>
<b>Responsabilidad y gestión del jefe inmediato    </b>    (La mayoría de documentos se deben
diligenciar por ambas partes Jefe inmediato y colaborador en proceso de retiro):
<p>
<table  align="center" border="1px">
<thead>
<tr bgcolor="#0070c0" style="color:#FFFFFF">
<th width="20">#</th>
<th width="450">Tipo de Documentos</th>
<th width="150" align="justify">Jefe inmediato debe legalizar con:</th>
</tr>
</thead>
<tbody>
<tr>
<td width="20">1</td>
<td width="450" align="justify">Recibir y firmar con fecha de recibido la carta de Renuncia</td>
<td width="150" align="justify">Área de Nómina</td>
</tr>
<tr>
<td width="20">2</td>
<td width="450" align="justify">Entregar formato de aceptación de renuncia
</td>
<td width="150" align="justify">Área de Nómina y
copia al colaborador
</td>
</tr>
<tr>
<td width="20">3</td>
<td width="450" align="justify">Registrar retiro en Signov con fecha exacta del retiro</td>
<td width="150" align="justify">Registro en aplicativo</td>
</tr>
<tr>
<td width="20">4</td>
<td width="450" align="justify">Recibir el acta de entrega de puesto</td>
<td width="150" align="justify">Custodia del jefe inmediato</td>
</tr>
<tr>
<td width="20">5</td>
<td width="450" align="justify">Recibir carné y tarjeta acceso</td>
<td width="150" align="justify">Área de Nómina</td>
</tr>
<tr>
<td width="20">6</td>
<td width="450" align="justify">Recibir con la firma respectiva la autorización de descuento</td>
<td width="150" align="justify">Área de Nómina y copia al colaborador*</td>
</tr>
<tr>
<td width="20">7</td>
<td  width="450" align="justify">Recibir dotación con identificación corporativa del cliente</td>
<td width="150" align="justify">Dotación</td>
</tr>
<tr>
<td width="20">8</td>
<td  width="450" align="justify">Recibir equipos, herramientas y/o útiles de trabajo (si aplica)</td>
<td width="150"  align="justify">Logística</td>
</tr>
<tr>
<td width="20">9</td>
<td  width="450" align="justify">Entregar encuesta física diligenciada</td>
<td width="150" align="justify" >Área de Nómina</td>
</tr>
<tr>
<td width="20">10</td>
<td  width="450" align="justify">Entregar formato de notificación del examen médico de retiro y actualizar los datos del colaborador en caso de necesitar una información adicional para el pago de su liquidación.</td>
<td width="150" align="justify">Área de Nómina</td>
</tr>
<tr>
<td width="20">11</td>
<td  width="450" align="justify">Entregar paz y salvo de entrega de elementos, equipos herramientas de trabajo</td>
<td width="150" align="justify">Área de Nómina y copia al colaborador*</td>
</tr>
</tbody>
</table>
<br>
<br>
*Entregar al colaborador en proceso de retiro las copias de los documentos que se anexan a
estas instrucciones, en los cuales debe quedar registrado el recibido.
<br>
<br>
<b>Nota:</b> Se debe diligenciar en toda la documentación la fecha de retiro, dicha fecha debe ser
igual a la registrada en la carta de renuncia o de terminación de contrato por parte de
Emtelco, así mismo a la fecha registrada en signov.<p></div>
<div style="text-align:center">< style=" color: ‎#989898"p>Copia para el jefe inmediato</p></div>';
$pdf->writeHTML($Instrucciones, true, false, true, false, '');
$pdf->AddPage();
$Examen=  <<<EOD
<div style="text-align:center"><h1>NOTIFICACIÓN DE EXAMEN MÉDICO DE RETIRO</h1></div>
<div "align:justify">
Este documento debe diligenciarlo el jefe inmediato y hacer firmar del colaborador en proceso de retiro.  <br> <br>
Por medio del presente nos permitimos informarle que a la fecha de su retiro usted cuenta con cinco <b>(5) días hábiles </b>
para solicitar y realizarse el examen médico de egreso para dar cumplimiento a lo estipulado por el artículo 57 del CST y
artículo 6 de la resolución 2346 del 2007. De no realizarse dicho examen
comprendemos que usted se encuentra en excelente estado de salud.
<br>
<br>
Para la solicitud de realización del examen médico debe adjuntar al correo electrónico <a href="mailto:saludocupacional@emtelco.com.co">saludocupacional@emtelco.com.co</a> los siguientes datos:
<br>
<br>
- Copia de la cédula de ciudadanía <br>
- Copia de la carta de retiro y/o renuncia. (opcional a mano en letra legible) <br>
- Teléfono de contacto <br>
- Ciudad de residencia.<br>
</p>
<p>Firma del colaborador en proceso de retiro:  </p>
<p>Nombre:  $Nombres</p>
<p>Cédula: $Documento</p>
<p>Correo-e personal: $Correo  </p>
<p>Número de teléfono: $Telefonoc  </p>
<p>Ciudad: $CiudadResidencia </p>
<p>Fecha de notificación: $dia, $Semana de $mes de $año. </p>
<p>
*Es importante que registre y actualice sus datos en caso que necesitemos información adicional para el pago de su liquidación.
</p>
</div>
<div style="text-align:center">< style=" color: ‎#989898"p>Copia para área de nómina</p></div>
EOD;
$pdf->Image($FirmaDelColaborador, 90, 127, 50, 20, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);

$pdf->writeHTML($Examen, true, false, true, false, '');
$pdf->AddPage();
$Autorizacion=  <<<EOD
<div style="text-align:center"><h1>AUTORIZACIÓN DE DESCUENTO</h1></div>
<p align="justify">Por medio de la presente $Nombres  Identificado con $TipoDocumento número $Documento
expedida en $Lugar autorizo de manera expresa a la empresa Emtelco S.A.S me sean descontados de mi salario,
vacaciones, prima, cesantías, intereses de cesantías, incapacidades y/o prestaciones sociales,
la suma de: $Suma  en caso que sea terminada
por cualquier causa mi vinculación laboral con la empresa.
<p>
<p align="justify">Este descuento sólo será aplicable en los siguientes conceptos:
<br>
<br>
<label>Deuda adquirida a través del fondo de crédito Emtelco</label>
<br>
<label>Fondo de empleados Femtelco</label>
<br>
<label>Obligación pendiente por concepto de Capacitaciones</label>
<br>
<label>Viáticos no legalizados</label>
<br>
<label>Mayor salario y prestaciones sociales pagadas</label>
<br>
<label>La No devolución de equipos y herramientas de trabajo asignados.</label>
<br> En la siguiente tabla relacionar los valores a descontar y adjuntar soportes respectivos:
</p>
<div class=tabla>
<table  border="1px">
<thead>
<tr align="center" bgcolor="#0070c0" style="color:#FFFFFF">
<th>Concepto de descuento</th>
<th>Valor a descontar </th>
</tr>
</thead>
<tbody>
<tr>
<td text-justify>Equipos</td>
<td>$DescuentoEquipos</td>
</tr>
<tr>
<td text-justify>Herramientas, materiales y EPP</td>
<td>$DescuentosHerramientas</td>
</tr>
<tr>
<td text-justify>Otro: $NombreOtro </td>
<td>$DescuentoOtro</td>
</tr>
</tbody>
</table>
</div>
<p>Firma jefe inmediato/responsable (e):<br>
<br>
<br>
<br>
Firma y fecha de retiro del colaborador:</b><br>$dia, $Semana de $mes de $año.
</p>
<p text-justify ><h6>Nota para colaboradores vinculados por la temporal: deben legalizar y diligenciar el respectivo formato de descuento con el ejecutivo de cuenta de la temporal.</h6></p>
<div style="text-align:center">< style=" color: ‎#989898"p>Copia para área de nómina y colaborador en proceso de retiro</p></div>
EOD;
$im="subidas/verify.png";
for ($i=0; $i <= count($conceptos); $i++) {//Para ponerle el chulito a los conceptos
    if ($conceptos[$i]=="Deuda adquirida a través del fondo de crédito Emtelco") {
      $pdf->Image($im, 12, 94, 3, 3, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
    }
    if ($conceptos[$i]=="Fondo de empleados Femtelco") {
      $pdf->Image($im, 12, 99, 3, 3, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
    }
    if ($conceptos[$i]=="Obligación pendiente por concepto de Capacitaciones") {
      $pdf->Image($im, 12, 104, 3, 3, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
    }
    if ($conceptos[$i]=="Viáticos no legalizados") {
      $pdf->Image($im, 12, 109, 3, 3, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
    }
    if ($conceptos[$i]=="Mayor salario y prestaciones sociales pagadas") {
      $pdf->Image($im, 12, 115, 3, 3, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
    }
    if ($conceptos[$i]=="La No devolución de equipos y herramientas de trabajo asignados") {
      $pdf->Image($im, 12, 120, 3, 3, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
    }
}
$pdf->Image($FirmaDelJefe, 100,160, 50, 20, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
$pdf->Image($FirmaDelColaborador, 100, 184, 50, 20, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
$pdf->writeHTMLCell(0,0,'', '', $Autorizacion, 0, 1, 0, true, true);
$pdf->writeHTMLCell(0,0,'', '', $Firmas, 0, 1, 0, true, true);
$pdf->AddPage();
$paz=  <<<EOD
<div style="text-align:center"><h1>PAZ Y SALVO DE ENTREGA DE ELEMENTOS, EQUIPOS Y HERRAMIENTAS DE
TRABAJO</h1></div>
<div class=tabla>
<table align="justify" border="1px">
<thead>
<tr  align="center" bgcolor="#0070c0" style="color:#FFFFFF">
<th width="150">El jefe inmediato debe entregar a: </th>
<th width="180">Descripción de equipos y elementos de trabajo </th>
<th width="100"> Entregó </th>
<th width="200"> Observaciones </th>
</tr>
</thead>
<tbody>
<tr>
<td width="150" rowspan="7">Logística</td>
<td width="180">Computador y accesorios</td>
<td width="100">$Computador</td>
<td width="200">$OComputador</td>
</tr>
<tr>
<td width="180">Teléfono móvil</td>
<td>$Telefono</td>
<td width="200">$OTelefono</td>
</tr>
<tr>
<td width="180">Sim card</td>
<td>$Sim</td>
<td width="200">$OSim</td>
</tr>
<tr>
<td width="180">Computador portátil</td>
<td>$portatil</td>
<td width="200">$Oportatil</td>
</tr>
<tr>
<td width="180">Tablet</td>
<td>$Tablet</td>
<td width="200">$OTablet</td>
</tr>
<tr>
<td width="180">Diadema</td>
<td>$Diadema</td>
<td width="200">$ODiadema</td>
</tr>
<tr>
<td width="180">Teléfono Avaya</td>
<td>$Avaya</td>
<td width="200">$OAvaya</td>
</tr>
<tr>
<td width="150" rowspan="2">Nómina</td>
<td width="180">carné</td>
<td>$carne</td>
<td width="200">$Ocarne</td>
</tr>
<tr>
<td width="180">Tarjeta de acceso</td>
<td>$Tarjeta</td>
<td width="200">$OTarjeta</td>
</tr>
<tr>
<td width="150">Centro de Distribución</td>
<td width="180">Vestuario y accesorios con imagen corporativa</td>
<td>$Vestuario</td>
<td width="200"><h6>Nota: Para las ciudades diferentes a <br> Medellín entregar al jefe inmediato</h6>$OVestuario</td>
</tr>
<tr>
<td width="150">Salud ocupacional</td>
<td width="180">Elementos de Protección personal</td>
<td>$Elementos</td>
<td width="200">$OElementos</td>
</tr>
<tr>
<td width="150">Almacén</td>
<td width="180">Herramientas</td>
<td> $Herramientas</td>
<td width="200">$OHerramientas</td>
</tr>
<tr>
<td width="150" >CAD</td>
<td width="180">Documentos pendientes entregar al CAD</td>
<td>$Documentos</td>
<td width="200">$ODocumentos</td>
</tr>
<tr>
<td width="150">Oficina Administrativa</td>
<td width="180">Anticipo de gastos de viaje</td>
<td>$Anticipo</td>
<td width="200">$OAnticipo</td>
</tr>
<tr>
<td colspan="6">Otros elementos. ¿Cuáles?: $NombreOtros</td>
</tr>
<tr>
<td style="color:#989898"colspan="6">Nombre del colaborador en proceso de retiro: <b>$Nombres</b></td>
</tr>
<tr>
<td style="color:#989898"colspan="6">Cedula: <b>$Documento</b></td>
</tr>
</tbody>
</table>
</div>
<p text-align:left>Firma jefe inmediato/responsable (e):<br>
<br>
<br>
<br>
Firma y fecha de retiro del colaborador:</b><br>$dia, $Semana de $mes de $año.
</p>
<p text-justify ><h6>Nota: Dentro de las obligaciones especiales del trabajador está conservar y restituir un buen estado, salvo el deterioro natural, los instrumentos y útiles que le hayan sido facilitados y las materias primas sobrantes. Artículo 58 CST.</h6></p>
<div style="text-align:center">< style=" color: ‎#989898"p>Copia para área de nómina y colaborador en proceso de retiro</p></div>
EOD;
$pdf->writeHTMLCell(0,0,'', '', $paz, 0, 1, 0, true, true);
$pdf->Image($FirmaDelJefe, 100, 187, 50, 20, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
$pdf->Image($FirmaDelColaborador, 100, 208, 50, 20, 'PNG', '', '', true, 200, '', false, false, 0, false, false, false);
// IDEA: DERECHA;ARRIBA,  ANCHO, LARGO
$pdf->AddPage();
$Aceptacion=  <<<EOD
<div style="text-align:center"><h1>ACEPTACIÓN DE RENUNCIA</h1></div>
$dia, $Semana de $mes de $año.
<br>
<br>
<br>
Señor(a): $Nombres
<br>
<br>
La ciudad:$Lugar
<br>
<br>
<b>Referencia: </b> Aceptación de Renuncia.
<br>
<p>Estimado(a) colaborador(a):$Nombres</p>
<br>
<p text-justify>Por medio de la presente comunicación le informo que EMTELCO S.A.S, acepta, a partir del $dia, $Semana de $mes de $año,  la renuncia presentada por usted al cargo que viene
desempeñando en esta entidad, día que será el último de vigencia de su contrato de trabajo.
</p>
<br>
<br>
<p text-justify>La compañía le expresa sinceros agradecimientos por la labor realizada durante su
permanencia en el cargo y le deseo éxitos en sus nuevas actividades. Dentro del término legal
el área de nómina de la Dirección de Talento Humano, liquidará y pagará las prestaciones
sociales definitivas a que tenga derecho con ocasión de su retiro; dicha liquidación será
consignada directamente en la cuenta de nómina en la cual se consignaban sus salarios, sin
embargo, si no es su deseo recibir de esta forma su liquidación, deberá expresarlo por escrito
dentro de los 3 días siguientes al recibo de esta comunicación.</p>
<br>
<br>
Cordialmente,
<br>
<br>
<p>Nombre Jefe: $NombreJefeInmediato</p>
<br>
<p>Cargo jefe: $CargoJefeInmediato</p>
<div style="text-align:center">< style=" color: ‎#989898"p>Copia para área de nómina y colaborador en proceso de retiro</p></div>
EOD;
$pdf->writeHTML($Aceptacion, true, false, true, false, '');
$pdf->AddPage();
$Responsabilidad='<div style="text-align:center"><h1>RESPONSABILIDAD E INFORMACIÓN DE INTERÉS PARA EL COLABORADOR EN
PROCESO DE RETIRO:</h1></div>
<div style="text-align:justify">
1. Entregar la carta de renuncia, elementos y herramientas de trabajo al jefe inmediato,
excepto para personal de Instalaciones y reparaciones deben entregar equipos y
herramientas directamente al almacén.<br><br>
2. Diligenciar los documentos de retiro que su jefe inmediato le entregue:<br><br>
- Notificación del examen médico de retiro. Actualizar sus datos personales en la
notificación de examen médico de retiro.<br>
- Autorización de descuento de retiro<br>
- Paz y salvo de entrega de elementos, equipos y herramientas de trabajo.<br>
- Diligenciar encuesta de retiro física o puedes ingresar a través de cualquier red externa o
interna en el link: <a href="http://web.emtelco.co/formtalentohumano
">web.emtelco.co/formtalentohumano</a> <br>
<br>
3. El pago de su liquidación se realizará dentro del término legal conforme a la legislación
laboral, la cuál será consignada en la última cuenta informada por usted; en caso que no
desee recibir el pago de su liquidación a través de consignación bancaria deberá informar al
área de nómina por escrito a través de la ventanilla ACI (atención del cliente interno) o al
buzón <a href=" aci@emtelco.com.co"> aci@emtelco.com.co</a> dentro de los tres (3) días siguientes al recibido de ésta
comunicación, de lo contrario se entenderá que éstas deben ser consignadas en su cuenta
bancaria inicialmente registrada.
<br><br>
4. Solicitar los siguientes documentos de retiro a través de la ventanilla ACI ubicada en el
área de nómina tel: (4) 3897000 ext.6210 o al siguiente buzón:
<a href=" aci@emtelco.com.co"> aci@emtelco.com.co</a>
<br>
- Para certificado laboral y retiro de cesantías (si aplica) se entregará a los 8 días del retiro.<br>
- Soporte de pago de la seguridad social de los últimos 3 meses el cual será entregado una
vez pagada la liquidación.<br><br>
5. Notificación del examen médico:
  Notificamos que a partir de la fecha de su retiro usted cuenta con <b>cinco (5) días</b> hábiles
  para solicitar y realizarse el examen médico de egreso para dar cumplimiento a lo estipulado
  por el artículo 57 del CST. De no realizarse dicho examen comprendemos que usted se
  encuentra en excelente estado de salud. Para la solicitud de realización del examen médico
  debe incluir al correo electrónico saludocupacional@emtelco.com.co los siguientes datos:<br>
  - Cédula de ciudadanía <br>
  - Carta de retiro y/o renuncia. (opcional a mano en letra legible)<br>
  - Informar Ciudad de residencia y teléfono de contacto.
  <h5>Nota: Para personal vinculado por la temporal debe solicitar los documentos anteriormente mencionados al ejecutivo de cuenta
  o en las oficinas de la temporal respectiva.</h5>
  </div>';
  $pdf->writeHTML($Responsabilidad, true, false, true, false, '');
  $pdf->Output('DocumentosRetiro.pdf', 'I');


  //Sin esta línea de código el pdf no funciona ya que esta dice que se salga el pdf en caso de que se valla a descargar se descarga con el nombre 'DocumentosRetiro.pdf' y si se ha descargado empieza a incrementar la I//
  // IDEA: fin del documento
  //  ?>
