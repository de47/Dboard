<html>
<link rel="shortcut icon" href="subidas/emt.ico">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="initial-scale=1.0, width=device-height">
	<script src="libs/modernizr.js"></script>
	<link rel="stylesheet" href="Asistente/css/bootstrap.min.css">
	<link rel="stylesheet" href="Asistente/css/Alertify.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<meta charset="utf-8">
	<title>
		Retiros
	</title>
	<link rel="stylesheet" href="Asistente/css/main.css">
</head>
<body>
	<div id="body">
		<!-- inicialmente se muestra div "consultaUno";  en el cual se digita la cedula del colaborador, si el colaborador se encuentra en la BD se abre "resultado"; un formulario en el cual se puede ingresar la otra mitad de la información -->
		<div class="container">
			<div class="col-sx-2">
				<img src="Asistente\Imagenes\logo-emtelco-_cxbpo.png">
			</div>
			<div class="text col-sx-2" style="color: #A1C1D5; font-family: 'Arial' font-weight: 600;
			font-size: 40px; display: inline-block;">
			<p class="somos" ><b>Somos</b></p>
			<p class="valores">
				<span class="word green">Pasión</span>
				<span class="word green">Innovación</span>
				<span class="word green">Simplicidad</span>
				<span class="word green">Integridad</span>
				<span class="word green">Confianza</span>
			</p>
		</div>
	</div>
	<div class="consulta-Uno" v-show="Datos[19].consultaUno" >
		<div class="container">
			<br>
			<div id="cabecera"><h1 style="color: white;">Documentos de retiro</h1></div>
			<br>
			<!-- @submit.prevent="consultar": Una vez el colaborador pulse el botón "enviar", el fomulario, se envía la cedula a un método y se pregunta si existe en la BD -->
			<form @submit.prevent="consultar" class="searchform cf">
				<input  id="cedula" type="number" placeholder="ingrese su número de documento" v-model="Datos[2].Documento">
				<button type="submit">Ingresar</button>
			</form>
			<br>
			<br>
			<br>
			<div id="pie">&copy Emtelco</div>
		</div>
	</div>
	<div class="resultado" v-show="!Datos[19].consultaUno">
		<div class="container">
			<div class="container">
				<!-- Cada una de las partes del formulario -->
				<div class="row">
					<section>
						<div id="cabecera"><h1 style="color: white;">Documentos de retiro</h1></div>
						<div class="wizard">
							<ul class="nav nav-wizard">
								<li class="active">
									<a href="#step1" data-toggle="tab">Datos del colaborador</a>
								</li>
								<li class="disabled">
									<a href="#step2" data-toggle="tab">Retiro</a>
								</li>
								<li class="disabled">
									<a href="#step3" data-toggle="tab">Experiencia</a>
								</li>
								<li class="disabled">
									<a href="#step4" data-toggle="tab">Intrucciones</a>
								</li>
								<li class="disabled">
									<a href="#step5" data-toggle="tab">Examen</a>
								</li>
								<li class="disabled">
									<a href="#step6" data-toggle="tab">Autorización</a>
								</li>
								<li class="disabled">
									<a href="#step7" data-toggle="tab">Paz y salvo</a>
								</li>
								<li class="disabled">
									<a href="#step8" data-toggle="tab">Información de interés</a>
								</li>
							</ul>
						</div>
						<br>
						<br>
						<!-- action="a.php": En el cual se envía la información a "a" por el método de ´POST, se reciben y  se muestran en  el pdf -->
						<form action="a.php" method="post" target="_blank" enctype="multipart/form-data" @submit="Actualizar" >
							<div class="tab-content">
								<div class="tab-pane active" id="step1">
									<div class="Datos" id="Datos">
										<div id="titulo"><b>DATOS DEL COLABORADOR</b></div>
										<br>
										<div class="row">
											<div hidden="hidden" class="col-md-4"><?php // IDEA: Esta variable controla el abrir del pdf; si no ha llenado algún campo no abre ?>
												<input type="text" value="True" name="AbrirPDF" id="AbrirPDF"/>
											</div>
											<div class="col-md-4">
												<label for="">Nombre</label>
												<input required type="text" class="form-control" placeholder="Escriba su nombre completo" name="Nombres" id="Nombres" v-model="Datos[0].Nombres"/>
											</div>
											<div class="col-md-4">
												<label for="">Tipo de documento</label>
												<br>
												<?php // IDEA: Lista de los posibles tipos de documentos ?>
												<select required form=""name="TipoDocumento" class="form-control"  id="TipoDocumento" v-model="Datos[6].TipoDocumento" />
												<option value="" disabled>Elige un tipo de documento</option>
												<option>Cedula de ciudadanía</option>
												<option>Cedula de extrajería</option>
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Número de identificación</label>
											<input required type="number" class=" form-control" name="Documento" id="Documento" placeholder="Escriba su número de documento" v-model="Datos[2].Documento" readonly/>
										</div>
									</div>
									<div class="row">
										<br>
										<div class="col-md-4">
											<label for="">Lugar de expedición</label>
											<input required type="text" class="form-control" name="Lugar" id="Lugar1" placeholder="Fecha de expedición del documento" v-model="Datos[7].Lugar" />
										</div>
										<div class="col-md-4">
											<label for="">Ciudad en la que laboró</label>
											<input type="text" class="form-control" name="CiudadLaboro"  id="CiudadLaboro" placeholder="Escriba la Ciudad donde laboró" v-model="Datos[3].CiudadLaboro"/>
										</div>
										<div class="col-md-4">
											<label for="">Fecha de retiro</label>
											<input  required type="date" class="form-control" name="FRetiro"  id="FRetiro"  v-model="Datos[1].FRetiro"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<br>
											<label for="">Teléfono</label>
											<input Required type="number" class="form-control" name="Telefonoc"  id="Telefono" placeholder="Escriba su teléfono" v-model="Datos[10].Telefono"/>
										</div>
										<div class="col-md-4">
											<br>
											<label for="Correo">Correo-e personal</label>
											<input required type="email" class="form-control" name="Correo" id="Correo"  placeholder="Escriba su correo corporativo" v-model="Datos[8].Correo"/>
										</div>
										<div class="col-md-4">
											<br>
											<label for="">Ciudad de residencia</label>
											<input requiered type="text" class="form-control"  name="CiudadResidencia"  id="CiudadResidencia" placeholder="Escriba ciudad de residencia"  v-model="Datos[9].CiudadResidencia"/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<br>
											<label for="">Motivo de retiro</label>
											<select requiered name="MotivoRetiro" id="MotivoRetiro" class="form-control"  v-model="Datos[4].MotivoRetiro">
												<option value="" disabled>Elige un motivo de retiro</option>
												<option>Renuncia voluntaria</option>
												<option>Decisión de la empresa</option>
											</select>
										</div>
										<div class="col-md-4">
											<br>
											<label for="">Nombre Jefe inmediato</label>
											<input requiered type="text" placeholder="Escriba el cargo de su jefe inmediato" class="form-control" name="NombreJefeInmediato" id="NombreJefeInmediato" v-model="Datos[15].NombreJefe">
										</div>
										<div class="col-md-4">
											<br>
											<label for="">Cargo jefe inmediato</label>
											<input requiered type="text" placeholder="Escriba el jefe de su jefe inmediato" class="form-control" name="CargoJefeInmediato" id="CargoJefeInmediato" v-model="Datos[16].CargoJefe" >
										</div>
									</div>
								</div>
								<br>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary">Continuar</button></li>
								</ul>
							</div>
							<div class="tab-pane" id="step2">
								<div v-if="Datos[4].MotivoRetiro=='Renuncia voluntaria'">
									<?php //IDEA: Asigarle aquí un valor null a motivoRenuncia ?>
									<div class="row">
										<div class="col-md-12">
											<div id="titulo"><b>MOTIVO DE RETIRO</b></div>
											<br>
											<div id="titulo"><b>RENUNCIA VOLUNTARIA</b></div>
										</div>
										<div class="col-md-8">
											<label for="">Motivo retiro específico</label>
											<br>
											<select requiered name="MotivoRenuncia" class="form-control"  id="MotivoRenuncia" v-model="Datos[5].MotivoRenuncia">
												<option value="" disabled>Elige un motivo de renuncia</option>
												<option>Mejor oferta laboral</option>
												<option>Situación familiar</option>
												<option>Dificultades con su jefe inmediato</option>
												<option>Inflexibilidad de horarios</option>
												<option>Continuidad de estudios</option>
												<option>Incumplimiento de las condiciones ofertadas en el proceso de selección y capacitación</option>
												<option>Impuntualidad e inconvenientes con el pago de la nómina</option>
												<option>Ambiente laboral</option>
												<option>Traslado de ciudad / viaje</option>
												<option>Otros proyectos</option>
											</select>
											<br>
										</div>
										<div class="col-md-8" id="testeo">
											<div v-if="Datos[5].MotivoRenuncia=='Mejor oferta laboral'">
												<input name="Mejor[]"  type="checkbox" id="Salario" value="Mejor Salario" v-model="a[0].Opciones">
												<label for="Salario">Mejor Salario</label>
												<br>
												<input name="Mejor[]"   type="checkbox" id="Ascenso" value="Oportunidad de ascenso" v-model="a[0].Opciones">
												<label for="Ascenso">Oportunidad de ascenso</label>
												<br>
												<input name="Mejor[]" type="checkbox" id="Beneficios" value="Mejores beneficios" v-model="a[0].Opciones">
												<label for="Beneficios">Mejores beneficios</label>
												<br>
												<input name="Mejor[]" type="checkbox" id="Profesion" value="Cargo relacionado con profesión" v-model="a[0].Opciones">
												<label for="Profesion">Cargo relacionado con profesión</label>
												<br>
												<label>¿Quieres compartir el nombre de la empresa/beneficios ofrecidos?</label>
												<br>
												<textarea rows="3" name="ObservacionesOferta" class="form-control" cols="50" v-model="a[0].Observaciones">
												</textarea>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Situación familiar'">
												<!-- El colaborador puede elegir varias opciones -->
												<input name="Familiar" type="radio" id="Enfermedad" value="Enfermedad propia y/o familiar" v-model="a[0].TipoRadio">
												<label for="Enfermedad">Enfermedad propia y/o familiar</label>
												<br>
												<input name="Familiar" type="radio" id="Hijo" value="No tiene quién cuide de su hijo (a)" v-model="a[0].TipoRadio">
												<label for="Hijo">No tiene quién cuide de su hijo (a)</label>
												<br>
												<input name="Familiar" type="radio" id="Otra" value="Otro" v-model="a[0].TipoRadio">
												<label for="Otra">Otro</label>
												<br>
												<div v-if="a[0].TipoRadio=='Otro'">
													<textarea rows="3" name="Otro1" class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Dificultades con su jefe inmediato' ">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<input name="Dificultades" type="radio" id="Acompañamiento" value="Poco acompañamiento" v-model="a[0].TipoRadio">
												<label for="Acompañamiento">Poco acompañamiento</label>
												<br>
												<input name="Dificultades" type="radio" id="Equipo" value="Poca Motivación con el equipo de trabajo" v-model="a[0].TipoRadio">
												<label for="Equipo">Poca Motivación con el equipo de trabajo</label>
												<br>
												<input name="Dificultades" type="radio" id="Incompatibilidad" value="Incompatibilidad con el jefe" v-model="a[0].TipoRadio">
												<label for="Incompatibilidad">Incompatibilidad con el jefe</label>
												<br>
												<input name="Dificultades" type="radio" id="9" value="Otro" v-model="a[0].TipoRadio">
												<label for="9">Otro</label>
												<br>
												<div class="" v-if="a[0].TipoRadio=='Otro'">
													<textarea rows="3" name="Otro2" class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Inflexibilidad de horarios'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<input name="Inflexibilidad" type="radio" id="IncompatibilidadH" value="Incompatibilidad con horario de estudio" v-model="a[0].TipoRadio">
												<label for="IncompatibilidadH">Incompatibilidad con horario de estudio</label>
												<br>
												<input name="Inflexibilidad" type="radio" id="HorariosExtensos" value="Horarios extensos" v-model="a[0].TipoRadio">
												<label for="HorariosExtensos">Horarios extensos</label>
												<br>
												<input name="Inflexibilidad" type="radio" id="Politicas" value="Políticas de horarios" v-model="a[0].TipoRadio">
												<label for="Politicas">Políticas de horarios</label>
												<br>
												<input name="Inflexibilidad" type="radio" id="9" value="Otro" v-model="a[0].TipoRadio">
												<label for="9">Otro</label>
												<br>
												<div class="" v-if="a[0].TipoRadio=='Otro'">
													<textarea rows="3" name="Otro3" class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Continuidad de estudios'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<input name="Continuidad" type="radio" id="Practicas" value="Inicio de prácticas" v-model="a[0].TipoRadio">
												<label for="Practicas">Inicio de prácticas</label>
												<br>
												<input name="Continuidad" type="radio" id="" value="Dedicación tiempo completo al estudio" v-model="a[0].TipoRadio">
												<label for="TiempoCompleto">Dedicación tiempo completo al estudio</label>
												<br>
												<input name="Continuidad" type="radio" id="Exterior" value="Estudios en el exterior" v-model="a[0].TipoRadio">
												<label for="Exterior">Estudios en el exterior</label>
												<br>
												<input name="Continuidad" type="radio" id="9" value="Otro" v-model="a[0].TipoRadio">
												<label for="9">Otro</label>
												<br>
												<div class="" v-if="a[0].TipoRadio=='Otro'">
													<textarea rows="3" name="Otro4" class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Incumplimiento de las condiciones ofertadas en el proceso de selección y capacitación'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<label>¿Quieres compartir las inconformidades</label>
												<br>
												<textarea rows="3" name="Otro5" cols="50" class="form-control" v-model="a[0].Observaciones">
												</textarea>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Impuntualidad e inconvenientes con el pago de la nómina'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<label>¿Quieres compartir las inconformidades</label>
												<br>
												<textarea rows="3" name="Otro6" class="form-control" cols="50" v-model="a[0].Observaciones">
												</textarea>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Ambiente laboral'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<input name="Ambiente" type="radio" id="NoAjuste" value="No se ajustó al cargo" v-model="a[0].TipoRadio">
												<label for="NoAjuste">No se ajustó al cargo</label>
												<br>
												<input name="Ambiente" type="radio" id="NoDefinidas" value="Funciones y responsabilidades no definidas" v-model="a[0].TipoRadio">
												<label for="NoDefinidas">Funciones y responsabilidades no definidas</label>
												<br>
												<input name="Ambiente" type="radio" id="MalaRelacion" value="Mala relación con compañeros" v-model="a[0].TipoRadio">
												<label for="MalaRelacion">Mala relación con compañeros</label>
												<br>
												<input name="Ambiente" type="radio" id="9" value="Otro" v-model="a[0].TipoRadio">
												<label for="9">Otro</label>
												<br>
												<div class="" v-if="a[0].TipoRadio=='Otro'">
													<textarea name="Otro7" rows="3"  class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Traslado de ciudad / viaje'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<input name="Traslado" type="radio" id="Viaje" value="Viaje al exterior" v-model="a[0].TipoRadio">
												<label for="Viaje">Viaje al exterior</label>
												<br>
												<input name="Traslado" type="radio" id="Traslado" value="Traslado de Conyugue/Familiar" v-model="a[0].TipoRadio">
												<label for="Traslado">Traslado de Conyugue/Familiar</label>
												<br>
												<input name="Traslado" type="radio" id="Vacaciones" value="Vacaciones" v-model="a[0].TipoRadio">
												<label for="Vacaciones">Vacaciones</label>
												<br>
												<input name="Traslado" type="radio" id="9" value="Otro" v-model="a[0].TipoRadio">
												<label for="9">Otro</label>
												<br>
												<div class="" v-if="a[0].TipoRadio=='Otro'">
													<textarea rows="3" name="Otro8" class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
											<div v-if="Datos[5].MotivoRenuncia=='Otros proyectos'">
												<?php // IDEA: //Esto se hace para mostrar cada una de las opciones según el motivo de renuncia del usuario ?>
												<input name="Otros" type="radio" id="Emprendimiento" value="Emprendimiento de propia empresa" v-model="a[0].TipoRadio">
												<label for="Emprendimiento">Emprendimiento de propia empresa</label>
												<br>
												<input name="Otros" type="radio" id="Oportunidades" value="Busca nuevas oportunidades" v-model="a[0].TipoRadio">
												<label for="Oportunidades">Busca nuevas oportunidades</label>
												<br>
												<input name="Otros" type="radio" id="9" value="Otro" v-model="a[0].TipoRadio">
												<label for="9">Otro</label>
												<br>
												<div class="" v-if="a[0].TipoRadio=='Otro'">
													<textarea rows="3" name="Otro9" class="form-control" cols="50" v-model="a[0].Observaciones">
													</textarea>
												</div>
												<br>
											</div>
										</div>
									</div>
									<?php // IDEA: En caso de que el usuario halla renunciado por un mejor oferta laboral ?>
								</div>
								<div v-if="Datos[4].MotivoRetiro=='Decisión de la empresa'">
									<div class="row">
										<div class="col-md-12">
											<div id="titulo"><b>MOTIVO DE RETIRO</b></div>
											<br>
										</div>
									</div>
									<div class="container" id='Decision'>
										<div class="row">
											<div class="col-md-12">
												<div id="titulo"><b>DECISIÓN DE LA EMPRESA</b></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<input name="Empresa" type="radio" id="ObraLabor" value="Terminación por obra o labor" v-model="a[0].TipoRadio">
												<label for="ObraLabor">Terminación por obra o labor</label>
												<br>
												<input name="Empresa" type="radio" id="bilateral" value="Terminación bilateral de contrato" v-model="a[0].TipoRadio">
												<label for="bilateral">Terminación bilateral de contrato</label>
												<br>
												<input name="Empresa" type="radio" id="PeriodoPrueba" value="Período de prueba" v-model="a[0].TipoRadio">
												<label for="PeriodoPrueba">Período de prueba</label>
												<br>
												<input name="Empresa" type="radio" id="JustaCausa" value="Terminación de contrato con justa causa" v-model="a[0].TipoRadio">
												<label for="JustaCausa">Terminación de contrato con justa causa</label>
												<br>
												<input name="Empresa" type="radio" id="SinJustaCausa" value="Terminación de contrato sin justa causa" v-model="a[0].TipoRadio">
												<label for="SinJustaCausa">Terminación de contrato sin justa causa</label>
												<br>
												<input name="Empresa" type="radio" id="Pension" value="Pensión" v-model="a[0].TipoRadio">
												<label for="Pension">Pensión</label>
											</div>
										</div>
									</div>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary">Continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" id="step3">
								<div class="container">
									<div id="titulo"><b>EXPERIENCIA</b></div>
									<!-- Acordion container -->
									<div class="panel-group" id="accordion">
										<div class="row">
											<div class="col-md-12">

												<p class="text-justify">
													<b>
														Para Emtelco S.A.S es importante contar con tu opinión y experiencia durante el tiempo laborado en nuestra compañía.
														Te invitamos a realizar esta encuesta que contribuirá al mejoramiento y desarrollo organizacional.
														La información aquí suministrada es de uso confidencial de la Dirección de Talento Humano.
													</b>
												</p>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">    ¿Cómo califica la inducción/capacitación que recibió para el desarrollo de sus funciones? <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
											</div>
											<div id="collapse1" class="panel-collapse collapse">
												<div class="panel-body">
													<div id="titulo"><b>Capacitación al cargo</b></div>
													<br>
													<div class="row">
														<div  class="col-md-4">
															<input  name="Induccion" type="radio" id="1" value="Alta" v-model="Experiencia[0].Capacitacion_Calificacion" required>
															<label for="1">Alta</label>
															<input name="Induccion" type="radio" id="2" value="Buena" v-model="Experiencia[0].Capacitacion_Calificacion">
															<label for="2">Buena</label>
															<input name="Induccion" type="radio" id="3" value="Regular" v-model="Experiencia[0].Capacitacion_Calificacion">
															<label for="3">Regular</label>
															<input name="Induccion" type="radio" id="4" value="Mala" v-model="Experiencia[0].Capacitacion_Calificacion">
															<label for="4">Mala</label>
															<div class="" v-if="Experiencia[0].Capacitacion_Calificacion=='Regular'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="ObservacionesInduccion" class="form-control" cols="50" v-model="Experiencia[0].Capacitacion_Observaciones">
																</textarea>
															</div>
															<div class="" v-if="Experiencia[0].Capacitacion_Calificacion=='Mala'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="ObservacionesInduccion" class="form-control" cols="50" v-model="Experiencia[0].Capacitacion_Observaciones">
																</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> ¿Cómo considera el apoyo recibido de su jefe inmediato para el desarrollo de sus funciones? <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
											</div>
											<div id="collapse2" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-4">
															<input name="Jefe" type="radio" id="5" value="Alta" required v-model="Experiencia[1].jefe_Calificacion">
															<label for="5">Alta</label>
															<input name="Jefe" type="radio" id="6" value="Buena" v-model="Experiencia[1].jefe_Calificacion">
															<label for="6">Buena</label>
															<input name="Jefe" type="radio" id="7" value="Regular" v-model="Experiencia[1].jefe_Calificacion">
															<label for="7">Regular</label>
															<input name="Jefe" type="radio" id="8" value="Mala" v-model="Experiencia[1].jefe_Calificacion">
															<label for="8">Mala</label>
															<div class="" v-if="Experiencia[1].jefe_Calificacion=='Regular'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="ObservacionesJefe" class="form-control" cols="50" v-model="Experiencia[1].jefe_Observaciones">
																</textarea>
															</div>
															<div class="" v-if="Experiencia[1].jefe_Calificacion=='Mala'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="ObservacionesJefe" class="form-control" cols="50" v-model="Experiencia[1].jefe_Observaciones">
																</textarea>
															</div>
															<br>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">  ¿Cómo considera el nivel de recursos en la organización (Equipos, Ventilación, Infraestructura,)? <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
											</div>
											<div id="collapse3" class="panel-collapse collapse">
												<div class="panel-body">
													<div id="titulo"><b>Acondicionamiento del puesto de trabajo</b></div>
													<br>
													<div class="row">
														<div class="col-md-4">
															<input name="Puesto" type="radio" id="9" value="Alta" v-model="Experiencia[2].puesto_Calificacion" required>
															<label for="9">Alta</label>
															<input name="Puesto" type="radio" id="10" value="Buena" v-model="Experiencia[2].puesto_Calificacion">
															<label for="10">Buena</label>
															<input name="Puesto" type="radio" id="11" value="Regular" v-model="Experiencia[2].puesto_Calificacion">
															<label for="11">Regular</label>
															<input name="Puesto" type="radio" id="12" value="Mala" v-model="Experiencia[2].puesto_Calificacion">
															<label for="12">Mala</label>
															<div class="" v-if="Experiencia[2].puesto_Calificacion=='Regular'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="Observacionespuesto" class="form-control" cols="50" v-model="Experiencia[2].puesto_Observaciones">
																</textarea>
															</div>
															<div class="" v-if="Experiencia[2].puesto_Calificacion=='Mala'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="Observacionespuesto" class="form-control" cols="50" v-model="Experiencia[2].puesto_Observaciones">
																</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">  La experiencia de haber trabajo con Emtelco, fue: <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
											</div>
											<div id="collapse4" class="panel-collapse collapse">
												<div class="panel-body">
													<div id="titulo"><b>Conclusión general</b></div>
													<br>
													<div class="row">
														<div class="col-md-4">
															<input name="General" type="radio" id="13" value="Alta" v-model="Experiencia[3].Conclusion_Calificacion" required>
															<label for="13">Alta</label>
															<input name="General" type="radio" id="14" value="Buena" v-model="Experiencia[3].Conclusion_Calificacion">
															<label for="14">Buena</label>
															<input name="General" type="radio" id="15" value="Regular" v-model="Experiencia[3].Conclusion_Calificacion">
															<label for="15">Regular</label>
															<input name="General" type="radio" id="16" value="Mala" v-model="Experiencia[3].Conclusion_Calificacion">
															<label for="16">Mala</label>
															<div class="" v-if="Experiencia[3].Conclusion_Calificacion=='Regular'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3" name="ObservacionesGeneral" class="form-control" cols="50" v-model="Experiencia[3].Conclusion_Observaciones">
																</textarea>
															</div>
															<div class="" v-if="Experiencia[3].Conclusion_Calificacion=='Mala'">
																<p>Justifica tu respuesta</p>
																<textarea rows="3"  name="ObservacionesGeneral" class="form-control" cols="50" v-model="Experiencia[3].Conclusion_Observaciones">
																</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"> Si tuviera la oportunidad de cambiar aspectos de su experiencia en la compañía <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
											</div>
											<div id="collapse5" class="panel-collapse collapse">
												<div class="panel-body">
													<div id="titulo"><b>¿Qué cambiarías?</b></div>
													<br>
													<div class="row">
														<div class="col-md-12">
															<input name="cambios[]" type="checkbox" id="JefeInmediato" value="Jefe inmediato" v-model="Experiencia[4].Aspectos">
															<label for="JefeInmediato">Jefe inmediato</label>
															<br>
															<input name="cambios[]" type="checkbox" id="Salario" value="Salario" v-model="Experiencia[4].Aspectos">
															<label for="Salario">Salario</label>
															<br>
															<input name="cambios[]" type="checkbox" id="Horarios" value="Horarios" v-model="Experiencia[4].Aspectos">
															<label for="Horarios">Horarios</label>
															<br>
															<input name="cambios[]" type="checkbox" id="Distribucion" value="Distribución del trabajo" v-model="Experiencia[4].Aspectos">
															<label for="Distribucion">Distribución del trabajo</label>
															<br>
															<input name="cambios[]" type="checkbox" id="Funciones" value="Funciones a nivel general" v-model="Experiencia[4].Aspectos">
															<label for="Funciones">Funciones a nivel general</label>
															<br>
															<input name="cambios[]" type="checkbox" id="Metas" value="Metas y logros que se puedan alcanzar en él" v-model="Experiencia[4].Aspectos">
															<label for="Metas">Metas y logros que se puedan alcanzar en él</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"> Deseas compartir observaciones/recomendaciones que contribuyan al mejoramiento de la compañía <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
											</div>
											<div id="collapse6" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="col-md-4">
														<textarea rows="3" name="Recomendaciones" cols="50" class="form-control" v-model="Experiencia[5].Recomendaciones">
														</textarea>
													</div>
												</div>
											</div>
										</div>
										<!-- Fin del acordión de la experiencia del usuario -->
									</div>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary">Continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" id="step4">
								<div class="Instrucciones" id="Intrucciones">
									<div class="col-md-12">
										<div id="titulo"><b>INSTRUCCIONES PARA RETIRO DE PERSONAL</b></div>
										<br>
										<p>
											Para realizar el retiro de personal se deben diligenciar los siguientes documentos en un
											tiempo <b>no mayor a 48 horas</b> a la fecha de retiro y entregarse físicamente o si está fuera de
											Medellín debe enviarse a través del CAD al área de nómina en un sobre cerrado si el
											empleador es Emtelco, y si el empleador es la temporal se debe entregar al ejecutivo de
											Acción que se encuentra en las sedes de Emtelco.
											<br>
											<br>
											<b>Responsabilidad y gestión del jefe inmediato </b>(La mayoría de documentos se deben
											diligenciar por ambas partes Jefe inmediato y colaborador en proceso de retiro):
										</p>
										<div class="col-md-12"><!-- Tabla de instrucciones -->
											<table border="1px">
												<thead>
													<tr bgcolor="#0070c0" style="color:#FFFFFF">
														<th>#</th>
														<th>Tipo de Documentos</th>
														<th>Jefe inmediato debe legalizar con:</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Recibir y firmar con fecha de recibido la carta de Renuncia</td>
														<td>Área de Nómina</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Entregar formato de aceptación de renuncia
														</td>
														<td>Área de Nómina y
															copia al colaborador
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Registrar retiro en Signov con fecha exacta del retiro</td>
														<td>Registro en aplicativo</td>
													</tr>
													<tr>
														<td>4</td>
														<td>Recibir el acta de entrega de puesto</td>
														<td>Custodia del jefe inmediato</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Recibir carné y tarjeta acceso</td>
														<td>Área de Nómina</td>
													</tr>
													<tr>
														<td>6</td>
														<td>Recibir con la firma respectiva la autorización de descuento</td>
														<td>Área de Nómina y copia al colaborador*</td>
													</tr>
													<tr>
														<td>7</td>
														<td>Recibir dotación con identificación corporativa del cliente</td>
														<td>Dotación</td>
													</tr>
													<tr>
														<td>8</td>
														<td>Recibir equipos, herramientas y/o útiles de trabajo (si aplica)</td>
														<td>Logística</td>
													</tr>
													<tr>
														<td>9</td>
														<td>Entregar encuesta física diligenciada</td>
														<td>Área de Nómina</td>
													</tr>
													<tr>
														<td>10</td>
														<td>Entregar formato de notificación del examen médico de retiro y actualizar los datos del colaborador en caso de necesitar una información adicional para el pago de su liquidación.</td>
														<td>Área de Nómina</td>
													</tr>
													<tr>
														<td>11</td>
														<td>Entregar paz y salvo de entrega de elementos, equipos herramientas de trabajo</td>
														<td>Área de Nómina y copia al colaborador*</td>
													</tr>
												</tbody>
											</table>
											<br>
										</div>
									</div>
									<p class="text-justify">
										*Entregar al colaborador en proceso de retiro las copias de los documentos que se anexan a
										estas instrucciones, en los cuales debe quedar registrado el recibido.
										<br>
										<br>
										Nota: Se debe diligenciar en toda la documentación la fecha de retiro, dicha fecha debe ser
										igual a la registrada en la carta de renuncia o de terminación de contrato por parte de
										Emtelco, así mismo a la fecha registrada en signov.
									</p>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary">Continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" id="step5">
								<div class="NotificacionMedica" id="NotificacionMedica">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<div id="titulo"><b>NOTIFICACIÓN DE EXAMEN MÉDICO DE RETIRO</b></div>
												<br>
												<p class="text-justify">
													Por medio del presente nos permitimos informarle que a la fecha de su retiro usted cuenta con cinco <b>(5) días hábiles</b><br>
													para solicitar y realizarse el examen médico de egreso para dar cumplimiento a lo estipulado por el artículo 57 del CST y
													artículo 6 de la resolución 2346 del 2007. De no realizarse dicho examen
													comprendemos que usted se encuentra en excelente estado de salud.<br><br>
													Para la solicitud de realización del examen médico debe adjuntar al correo electrónico <a style="color:blue" href="mailto:saludocupacional@emtelco.com.co">saludocupacional@emtelco.com.co</a>
													a:<br>
													- Copia de la cédula de ciudadanía <br>
													- Copia de la carta de retiro y/o renuncia. (opcional a mano en letra legible) <br>
													- Teléfono de contacto <br>
													- Ciudad de residencia.<br>
												</p>
												<br>
												<p>
													<b>
														*Es importante que registre y actualice sus datos en caso que necesitemos información adicional para el pago de su liquidación.
													</b>
												</p>
											</div>
											<br>
											<div class="row" id="titulo"><b>FIRMA DEL COLABORADOR</b>
												<div class="col-md-12">
													<input name="subir" type="radio" id="subir" value="subir" v-model="Datos[17].firmar">
													<label for="subir">Subir firma</label>
													<input name="subir" type="radio" id="firmar" value="Firmar" v-model="Datos[17].firmar">
													<label for="subir">firmar aquí</label>
													<br>
												</div>
											</div>
											<div>
												<div v-if="Datos[17].firmar=='subir'">
													<input type="file" name="imagen" @change="subirFirmaColaborador"/>
												</div>
											</div>
											<div id="content" v-show="Datos[17].firmar=='Firmar'">
												<div class="">
													<p style="text-align:center">Firme y al finalizar haga clic en "Generar Firma"</p>
												</div>
												<div id="signatureparent">
													<div></div>
													<div id="signature"></div>
												</div>
												<div id="tools"></div>
											</div>
											<div id="scrollgrabber"></div>
										</div>
									</div>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary">Continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" id="step6">
								<div class="AutorizacionDescuento" id="AutorizacionDescuento">
									<div class="col-md-12">
										<div id="titulo"><b>AUTORIZACIÓN DE DESCUENTO</b></div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<label for="Si">¿El colaborador aplica para descuento de salario?</label>
												<input disabled name="Respuesta" type="radio" id="Si" value="Si" v-model="Datos[12].AplicaDescuento">
												<label for="Si">Si</label>
												<input disabled name="Respuesta" type="radio" id="No" value="No" v-model="Datos[12].AplicaDescuento">
												<label for="No">No</label>
												<br>
											</div>
										</div>
										<div v-if="Datos[12].AplicaDescuento=='Si'">
											<p>
												autorizo de manera expresa a la empresa Emtelco S.A.S me sean descontados de mi salario,
												vacaciones, prima, cesantías, intereses de cesantías, incapacidades y/o prestaciones sociales
											</p>
											<div class="row">
												<div class="col-md-4">
													<label for="Suma">la suma de:</label>
													<input readonly name="Suma" type="number" onkeyup="format(this)" onchange="format(this)" class="form-control" id="number" v-model="AtorizacionDescuento[0].suma">
												</div>
											</div>
											<p>en caso que sea terminada
												por cualquier causa mi vinculación laboral con la empresa.
											</p>
											<br>
											<label>Este descuento sólo será aplicable en los siguientes conceptos:</label>
											<div class="row"><?php // IDEA: doble div para mostrar los conceptos y que se envien al pdf, div oculto que  toma lso valores?>
												<div class="col-md-8">
													  <fieldset hidden="hidden">
													<input  name="conceptos[]" type="checkbox" id="Deuda" value="Deuda adquirida a través del fondo de crédito Emtelco"  v-model="AtorizacionDescuento[1].Conceptos">
													<label for="Deuda">Deuda adquirida a través del fondo de crédito Emtelco</label>
													<br>
													<input readonly name="conceptos[]" type="checkbox" id="Fondo" value="Fondo de empleados Femtelco" v-model="AtorizacionDescuento[1].Conceptos" >
													<label for="Fondo">Fondo de empleados Femtelco</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="Obligacion" value="Obligación pendiente por concepto de Capacitaciones" v-model="AtorizacionDescuento[1].Conceptos" >
													<label for="Obligacion">Obligación pendiente por concepto de Capacitaciones</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="Viaticos" value="Viáticos no legalizados" v-model="AtorizacionDescuento[1].Conceptos" >
													<label for="Viaticos">Viáticos no legalizados</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="MayorSociales" value="Mayor salario y prestaciones sociales pagadas" v-model="AtorizacionDescuento[1].Conceptos" >
													<label for="MayorSociales">Mayor salario y prestaciones sociales pagadas</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="NoDevolucion"  value="La No devolución de equipos y herramientas de trabajo asignados" v-model="AtorizacionDescuento[1].Conceptos" @change="CambiarBandera">
													<label for="NoDevolucion">La No devolución de equipos y herramientas de trabajo asignados</label>
													<br>
													<div v-if="AtorizacionDescuento[1].bandera==true">
														<div class="col-md-8" v-show="AtorizacionDescuento[1].Conceptos">
															<p>Conceptos de descuento</p>
															<label for="Equipos">Equipos</label>
															<input readonly  name="DEquipos" type="number" class="form-control" placeholder="000.000" id="Equipos"  v-model="AtorizacionDescuento[2].ValoresNoDevueltos[0].Equipos">
															<br>
															<label for="Herramientas">Herramientas, materiales y EPP</label>
															<input readonly name="DHerramientas" type="number" class="form-control" id="Herramientas" placeholder="000.000" v-model="AtorizacionDescuento[2].ValoresNoDevueltos[1].Herramientas">
															<br>
															<label for="Cual">¿Otro, Cuál?</label>
															<input readonly name="NDOtro" type="text" class="form-control" id="cual"  v-model="AtorizacionDescuento[2].ValoresNoDevueltos[2].OtrosNombre">
															<br>
															<label for="Ovalor">Valor</label>
															<input readonly name="DOtro" type="number" class="form-control" id="Ovalor" placeholder="000.000" v-model="AtorizacionDescuento[2].ValoresNoDevueltos[2].valor">
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<br>
													<h6>
														Nota: para colaboradores vinculados por la temporal: deben legalizar y diligenciar el respectivo formato de
														descuento con el ejecutivo de cuenta de la temporal.
													</h6>
												</div>
											</div>

											<div class="row">
												<div class="col-md-8">
													  <fieldset disabled><?php // IDEA: Primer div, que se muestra ?>
													<input  name="conceptos[]" type="checkbox" id="Deuda" value="Deuda adquirida a través del fondo de crédito Emtelco"  v-model="AtorizacionDescuento[1].Conceptos">
													<label>Deuda adquirida a través del fondo de crédito Emtelco</label>
													<br>
													<input readonly name="conceptos[]" type="checkbox" id="Fondo" value="Fondo de empleados Femtelco" v-model="AtorizacionDescuento[1].Conceptos" >
													<label>Fondo de empleados Femtelco</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="Obligacion" value="Obligación pendiente por concepto de Capacitaciones" v-model="AtorizacionDescuento[1].Conceptos" >
													<label>Obligación pendiente por concepto de Capacitaciones</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="Viaticos" value="Viáticos no legalizados" v-model="AtorizacionDescuento[1].Conceptos" >
													<label>Viáticos no legalizados</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="MayorSociales" value="Mayor salario y prestaciones sociales pagadas" v-model="AtorizacionDescuento[1].Conceptos">
													<label>Mayor salario y prestaciones sociales pagadas</label>
													<br>
													<input  name="conceptos[]" type="checkbox" id="NoDevolucion"  value="La No devolución de equipos y herramientas de trabajo asignados" v-model="AtorizacionDescuento[1].Conceptos">
													<label>La No devolución de equipos y herramientas de trabajo asignados</label>
													<br>
												</fieldset>
													<div v-if="AtorizacionDescuento[1].bandera==true">
														<div class="col-md-8" v-show="AtorizacionDescuento[1].Conceptos">
															<p>Conceptos de descuento</p>
															<label for="Equipos">Equipos</label>
															<input readonly  name="DEquipos" type="number" class="form-control" placeholder="000.000" id="Equipos"  v-model="AtorizacionDescuento[2].ValoresNoDevueltos[0].Equipos">
															<br>
															<label for="Herramientas">Herramientas, materiales y EPP</label>
															<input readonly name="DHerramientas" type="number" class="form-control" id="Herramientas" placeholder="000.000" v-model="AtorizacionDescuento[2].ValoresNoDevueltos[1].Herramientas">
															<br>
															<label for="Cual">¿Otro, Cuál?</label>
															<input readonly name="NDOtro" type="text" class="form-control" id="cual"  v-model="AtorizacionDescuento[2].ValoresNoDevueltos[2].OtrosNombre">
															<br>
															<label for="Ovalor">Valor</label>
															<input readonly name="DOtro" type="number" class="form-control" id="Ovalor" placeholder="000.000" v-model="AtorizacionDescuento[2].ValoresNoDevueltos[2].valor">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<fieldset hidden="hidden">
								<?php // IDEA: Firma del jefe  ?>
								<div class="row" id="titulo"><b>FIRMA DEL JEFE INMEDIATO</b>



									<div class="col-md-12">
										<!-- <input class="" name="subirJefe" type="radio" id="subir" value="subirJefe" v-model="Datos[18].firmarJefe">
										<label for="subirJefe">Subir firma</label> -->
										<input  name="subirJefe" type="radio" id="firmar" value="FirmarJefe" v-model="Datos[18].firmarJefe">
										<label for="subirJefe">firmar aquí</label>
										<br>
									</div>
								</div>
								<div>
									<div v-if="Datos[18].firmarJefe=='subirJefe'">
										<input type="file" name="imagen1" >
									</div>
								</div>
								<div id="contentJefe" v-show="Datos[18].firmarJefe=='FirmarJefe'">
									<div id="signatureparentJefe" >
										<div></div>
										<div id="signatureJefe"></div>
									</div>

									<div id="toolsJefe"></div>
								</div>
								</fieldset hidden>
								<div id="scrollgrabberJefe"></div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary">Continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" id="step7">
								<div class="PazSalvo" id="PazSalvo">
									<div id="titulo"><b>PAZ Y SALVO</b></div>
									<div class="container">
										<!-- Acordión de paz y salvo del colaborador -->
										<div class="panel-group" id="accordion">
											<p class="text-align center"><b>
												Nota: Dentro de las obligaciones especiales del trabajador está conservar y restituir un buen estado, salvo el deterioro natural, los instrumentos y útiles que le hayan sido facilitados y las materias primas sobrantes. Artículo 58 CST.
												<br>
											</b></p>
											<p class="discontinuo"><b> El jefe inmediato debe entregar a:</b></p>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">LOGÍSTICA<i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
												</div>
												<div id="collapse10" class="panel-collapse collapse">
													<div class="panel-body">
														<div id="titulo"><b>Descripción de equipos y elementos de trabajo</b></div>
														<br>
														<div class="row">
															<div class="tabla" class="col-md-12">
																<table  align="center">
																	<thead>
																		<tr bgcolor="#0070c0" style="color:#FFFFFF">
																			<th>Descripción de equipos y elementos de trabajo</th>
																			<th>Entrega</th>
																			<th>Observaciones</th>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Computador y accesorios</td>
																				<td>
																					<select name="Computador" class="form-control"  id="Computador" v-model="PazYSalvo[0].Computador">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[0].Computador != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[0].Computador != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[0].Computador != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea readonly name="OComputador" rows="2" cols="12" v-model="PazYSalvo[0].ObservacionComputador"></textarea>
																				</td>
																			</tr>
																			<tr>
																				<td>Teléfono móvil</td>
																				<td>
																					<select name="Telefono" class="form-control"  id="Telefono" v-model="PazYSalvo[1].movil">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[1].movil != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[1].movil != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[1].movil != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea readonly name="OTelefono" rows="2" cols="12" v-model="PazYSalvo[1].Observacionmovil"></textarea>
																				</td>
																			</tr>
																			<tr>
																				<td>Sim card</td>
																				<td>
																					<select name="Sim" class="form-control"  id="Sim" v-model="PazYSalvo[2].Sim">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[2].Sim != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[2].Sim != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[2].Sim != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea name="OSim" rows="2" cols="12" v-model="PazYSalvo[2].ObservacionSim"></textarea>
																				</td>
																			</tr>
																			<tr>
																				<td>Computador portátil</td>
																				<td>
																					<select name="portatil" class="form-control"  id="portatil" v-model="PazYSalvo[3].portatil">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[3].portatil != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[3].portatil != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[3].portatil != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea name="Oportatil" rows="2" cols="12" v-model="PazYSalvo[3].Observacionportatil"></textarea>
																				</td>
																			</tr>
																			<tr>
																				<td>Tablet</td>
																				<td>
																					<select name="Tablet" class="form-control"  id="Tablet" v-model="PazYSalvo[4].Tablet">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[4].Tablet != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[4].Tablet != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[4].Tablet != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea name="OTablet" rows="2" cols="12" v-model="PazYSalvo[4].ObservacionTablet"></textarea>
																				</td>
																			</tr>
																			<tr>
																				<td>Diadema</td>
																				<td>
																					<select name="Diadema" class="form-control"  id="Diadema" v-model="PazYSalvo[5].Diadema">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[5].Diadema != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[5].Diadema != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[5].Diadema != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea name="ODiadema" rows="2" cols="12" v-model="PazYSalvo[5].ObservacionDiadema"></textarea>
																				</td>
																			</tr>
																			<tr>
																				<td>Teléfono Avaya</td>
																				<td>
																					<select name="Avaya" class="form-control"  id="Avaya" v-model="PazYSalvo[6].Avaya">
																						<option value="" disabled>Elije una opción</option>
																						<option value="Si"  :disabled="PazYSalvo[6].Avaya != 'Si'">Si</option>
																						<option value="No" :disabled="PazYSalvo[6].Avaya != 'No'">No</option>
																						<option value="No aplica" :disabled="PazYSalvo[6].Avaya != 'No aplica'">No aplica</option>
																					</select>
																				</td>
																				<td>
																					<textarea name="OAvaya" rows="2" cols="12" v-model="PazYSalvo[6].ObservacionAvaya"></textarea>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse11"> NÓMINA <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
													</div>
													<div id="collapse11" class="panel-collapse collapse">
														<div class="panel-body">
															<div class="row">
																<p class="titulo">Descripción de equipos y elementos de trabajo </p>
																<br>
																<div class="row">
																	<div class="tabla" class="col-md-12">
																		<table  align="center">
																			<thead>
																				<tr bgcolor="#0070c0" style="color:#FFFFFF">
																					<th>Descripción de equipos y elementos de trabajo</th>
																					<th>Entrega</th>
																					<th>Observaciones</th>
																				</thead>
																				<tbody>
																					<tr>
																						<td>carné</td>
																						<td>
																							<select  name="carne" class="form-control"  id="carne" v-model="PazYSalvo[7].carne">
																								<option value="" disabled>Elije una opción</option>
																								<option value="Si"  :disabled="PazYSalvo[7].carne != 'Si'">Si</option>
																								<option value="No" :disabled="PazYSalvo[7].carne != 'No'">No</option>
																								<option value="No aplica" :disabled="PazYSalvo[7].carne != 'No aplica'">No aplica</option>
																							</select>
																						</td>
																						<td>
																							<textarea readonly name="Ocarne" rows="2" cols="12" v-model="PazYSalvo[7].Observacioncarne"></textarea>
																						</td>
																					</tr>
																					<tr>
																						<td>Tarjeta de acceso</td>
																						<td>
																							<select  name="Tarjeta" class="form-control"  id="Tarjeta" v-model="PazYSalvo[8].acceso">
																								<option value="" disabled>Elije una opción</option>
																								<option value="Si"  :disabled="PazYSalvo[8].acceso != 'Si'">Si</option>
																								<option value="No" :disabled="PazYSalvo[8].acceso != 'No'">No</option>
																								<option value="No aplica" :disabled="PazYSalvo[8].acceso != 'No aplica'">No aplica</option>
																							</select>
																						</td>
																						<td>
																							<textarea readonly name="OTarjeta" rows="2" cols="12" v-model="PazYSalvo[8].Observacionacceso"></textarea>
																						</td>
																					</tr>
																				</tbody><!-- Fin tbody de paz y salvo -->
																			</table><!-- Fin de la tabla de paz y salvo -->
																		</div><!-- Fin del div tabla -->
																	</div><!-- Fin del row -->
																</div><!-- Fin del row -->
															</div><!-- Fin panel-body -->
														</div><!-- Fin id="collapse11" -->
													</div><!-- Fin del panel "Nómina"  -->
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">CENTRO DE DISTRIBUCIÓN<i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
														</div>
														<div id="collapse12" class="panel-collapse collapse">
															<div class="panel-body">
																<div class="row">
																	<p class="titulo">Descripción de equipos y elementos de trabajo </p>
																	<br>
																	<div class="row">
																		<div class="tabla" class="col-md-12">
																			<table  align="center">
																				<thead>
																					<tr bgcolor="#0070c0" style="color:#FFFFFF">
																						<th>Descripción de equipos y elementos de trabajo</th>
																						<th>Entrega</th>
																						<th>Observaciones</th>
																					</thead>
																					<tbody>
																						<tr>
																							<td>Vestuario y accesorios con imagen corporativa</td>
																							<td>
																								<select  name="Vestuario" class="form-control"  id="Vestuario" v-model="PazYSalvo[9].Vestuario">
																									<option value="" disabled>Elije una opción</option>
																									<option value="Si"  :disabled="PazYSalvo[9].Vestuario != 'Si'">Si</option>
																									<option value="No" :disabled="PazYSalvo[9].Vestuario != 'No'">No</option>
																									<option value="No aplica" :disabled="PazYSalvo[9].Vestuario != 'No aplica'">No aplica</option>
																								</select>
																							</td>
																							<td>
																								<textarea readonly name="OVestuario" rows="2" cols="12" v-model="PazYSalvo[9].ObservacionVestuario"></textarea>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">SALUD OCUPACIONAL <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
															</div>
															<div id="collapse13" class="panel-collapse collapse">
																<div class="panel-body">
																	<div class="row">
																		<p class="titulo">Descripción de equipos y elementos de trabajo </p>
																		<br>
																		<div class="row">
																			<div class="tabla" class="col-md-12">
																				<table  align="center">
																					<thead>
																						<tr bgcolor="#0070c0" style="color:#FFFFFF">
																							<th>Descripción de equipos y elementos de trabajo</th>
																							<th>Entrega</th>
																							<th>Observaciones</th>
																						</thead>
																						<tbody>
																							<tr>
																								<td>Elementos de Protección personal</td>
																								<td>
																									<select  name="Elementos" class="form-control"  id="Elementos" v-model="PazYSalvo[10].Elementos">
																										<option value="" disabled>Elije una opción</option>
																										<option value="Si"  :disabled="PazYSalvo[10].Elementos != 'Si'">Si</option>
																										<option value="No" :disabled="PazYSalvo[10].Elementos != 'No'">No</option>
																										<option value="No aplica" :disabled="PazYSalvo[10].Elementos != 'No aplica'">No aplica</option>
																									</select>
																								</td>
																								<td>
																									<textarea readonly name="OElementos" rows="2" cols="12" v-model="PazYSalvo[10].ObservacionElementos"></textarea>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</div>
																			</div>

																		</div>

																	</div>
																</div>
															</div>
															<!--  14 item -->
															<div class="panel panel-default">
																<div class="panel-heading">
																	<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">ALMACÉN <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
																</div>
																<div id="collapse14" class="panel-collapse collapse">
																	<div class="panel-body">
																		<div class="row">
																			<div class="tabla" class="col-md-12">
																				<table  align="center">
																					<thead>
																						<tr bgcolor="#0070c0" style="color:#FFFFFF">
																							<th>Descripción de equipos y elementos de trabajo</th>
																							<th>Entrega</th>
																							<th>Observaciones</th>
																						</thead>
																						<tbody>
																							<tr>
																								<td>Herramientas</td>
																								<td>
																									<select  name="Herramientas" class="form-control"  id="Herramientas" v-model="PazYSalvo[11].Herramientas">
																										<option value="" disabled>Elije una opción</option>
																										<option value="Si"  :disabled="PazYSalvo[11].Herramientas != 'Si'">Si</option>
																										<option value="No" :disabled="PazYSalvo[11].Herramientas != 'No'">No</option>
																										<option value="No aplica" :disabled="PazYSalvo[11].Herramientas != 'No aplica'">No aplica</option>
																									</select>
																								</td>
																								<td>
																									<textarea readonly name="OHerramientas" rows="2" cols="12" v-model="PazYSalvo[11].ObservacionHerramientas"></textarea>
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</div>
																			</div>

																		</div>
																	</div>
																</div>
																<!--  15 item -->
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">CAD<i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
																	</div>
																	<div id="collapse15" class="panel-collapse collapse">
																		<div class="panel-body">
																			<div class="row">
																				<div class="tabla" class="col-md-12">
																					<table  align="center">
																						<thead>
																							<tr bgcolor="#0070c0" style="color:#FFFFFF">
																								<th>Descripción de equipos y elementos de trabajo</th>
																								<th>Entrega</th>
																								<th>Observaciones</th>
																							</thead>
																							<tbody>
																								<tr>
																									<td>Documentos pendientes a entregar al CAD</td>
																									<td>
																										<select  name="Documentos" class="form-control"  id="Documentos" v-model="PazYSalvo[12].Documentos">
																											<option value="" disabled>Elije una opción</option>
																											<option value="Si"  :disabled="PazYSalvo[12].Documentos != 'Si'">Si</option>
																											<option value="No" :disabled="PazYSalvo[12].Documentos != 'No'">No</option>
																											<option value="No aplica" :disabled="PazYSalvo[12].Documentos != 'No aplica'">No aplica</option>
																										</select>
																									</td>
																									<td>
																										<textarea readonly name="ODocumentos" rows="2" cols="12" v-model="PazYSalvo[12].ObservacionDocumentos"></textarea>
																									</td>
																								</tr>
																							</tbody>
																						</table>
																					</div>
																				</div>

																			</div>
																		</div>

																	</div>
																	<!--  16 item -->
																	<div class="panel panel-default">
																		<div class="panel-heading">
																			<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse16">OFICINA ADMINISTRATIVA<i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
																		</div>
																		<div id="collapse16" class="panel-collapse collapse">
																			<div class="panel-body">
																				<div class="row">
																					<div class="tabla" class="col-md-12">
																						<table  align="center">
																							<thead>
																								<tr bgcolor="#0070c0" style="color:#FFFFFF">
																									<th>Descripción de equipos y elementos de trabajo</th>
																									<th>Entrega</th>
																									<th>Observaciones</th>
																								</thead>
																								<tbody>
																									<tr>
																										<td>Anticipo de gastos de viaje</td>
																										<td>
																											<select name="Anticipo" class="form-control"  id="Anticipo" v-model="PazYSalvo[13].Anticipo">
																												<option value="" disabled>Elije una opción</option>
																												<option value="Si"  :disabled="PazYSalvo[13].Anticipo != 'Si'">Si</option>
																												<option value="No" :disabled="PazYSalvo[13].Anticipo != 'No'">No</option>
																												<option value="No aplica" :disabled="PazYSalvo[13].Anticipo != 'No aplica'">No aplica</option>
																											</select>
																										</td>
																										<td>
																											<textarea readonly name="OAnticipo" rows="2" cols="12" v-model="PazYSalvo[13].ObservacionAnticipo"></textarea>
																										</td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																			</div>

																		</div>
																		<!--  17 item -->
																		<div class="panel panel-default">
																			<div class="panel-heading">
																				<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse17">OTROS<i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i> </a> </h4>
																			</div>
																			<div id="collapse17" class="panel-collapse collapse">
																				<div class="panel-body">
																					<div class="row">
																						<div class="tabla col-md-12" class="col-md-12">
																							<table >
																								<thead >
																									<tr bgcolor="#0070c0" style="color:#FFFFFF">
																										<th>Descripción de equipos y elementos de trabajo </th>
																										<th>Nombre</th>
																										<th>Entrega</th>
																										<th>Observaciones</th>
																									</thead>
																									<tbody>
																										<tr>
																											<td>Otros elementos. ¿Cuáles?:</td>
																											<td>
																												<input readonly type="text" name="NombreOtros" class="form-control" v-model="PazYSalvo[14].Otros[0].Nombre">
																											</td>
																											<td>
																												<select name="Otros10" class="form-control"  id="Anticipo" v-model="PazYSalvo[14].Otros[0].Entrega">
																													<option value="" disabled>Elije una opción</option>
																													<option value="Si"  :disabled="PazYSalvo[14].Otros[0].Entrega != 'Si'">Si</option>
																													<option value="No" :disabled="PazYSalvo[14].Otros[0].Entrega != 'No'">No</option>
																													<option value="No aplica" :disabled="PazYSalvo[14].Otros[0].Entrega != 'No aplica'">No aplica</option>
																												</select>
																											</td>
																											<td>
																												<textarea readonly name="Descripcion" rows="2" cols="12" v-model="PazYSalvo[14].Otros[0].Descripcion"></textarea>
																											</td>
																										</tr>
																									</tbody>
																								</table>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div><!-- Fin del acordión -->
																	</div>
																	<ul class="list-inline pull-right">
																		<li><button type="button" class="btn btn-primary">Continue</button></li>
																	</ul>
																</div>
															</div>
															<div class="tab-pane" id="step8">
																<div class="Responsabilidad" id="Responsabilidad">
																	<div class="col-md-12">
																		<div id="titulo"><b>RESPONSABILIDAD E INFORMACIÓN DE INTERÉS PARA EL COLABORADOR EN PROCESO DE RETIRO:</b></div>
																		<div class="box">
																			<div class="left1">
																				<div class="content1">
																					<p>1. Entregar la carta de renuncia, elementos y herramientas de trabajo al jefe inmediato,
																						excepto para personal de Instalaciones y reparaciones deben entregar equipos y
																						herramientas directamente al almacén.
																						<br>
																						<br>
																						2. Diligenciar los documentos de retiro que su jefe inmediato le entregue:
																						<br>
																						- Notificación del examen médico de retiro. Actualizar sus datos personales en la
																						notificación de examen médico de retiro.<br>
																						- Autorización de descuento de retiro<br>
																						- Paz y salvo de entrega de elementos, equipos y herramientas de trabajo.<br>
																						- Diligenciar encuesta de retiro física o puedes ingresar a través de cualquier red externa o
																						interna en el link:
																						<a style="color: blue" href="http://web.emtelco.co/formtalentohumano/view.php?id=218348">http://web.emtelco.co/formtalentohumano/view.php?id=218348</a>
																						<br>
																						<br>
																						3. El pago de su liquidación se realizará dentro del término legal conforme a la legislación
																						laboral, la cuál será consignada en la última cuenta informada por usted; en caso que no
																						desee recibir el pago de su liquidación a través de consignación bancaria deberá informar al
																						área de nómina por escrito a través de la ventanilla ACI (atención del cliente interno) o al
																						buzón <a style="color: blue" href="mailto:aci@emtelco.com.co">aci@emtelco.com.co</a>  dentro de los tres (3) días siguientes al recibido de ésta
																						comunicación, de lo contrario se entenderá que éstas deben ser consignadas en su cuenta
																						bancaria inicialmente registrada.
																					</div>
																				</div>
																				<div class="right1">
																					<div class="content1">
																						4. Solicitar los siguientes documentos de retiro a través de la ventanilla ACI ubicada en el
																						área de nómina tel: (4) 3897000 ext.6210 o al siguiente buzón: <a style="color: blue" href="mailto:aci@emtelco.com.co">aci@emtelco.com.co</a>
																						<br>
																						- Para certificado laboral y retiro de cesantías (si aplica) se entregará a los 8 días del retiro.<br>
																						- Soporte de pago de la seguridad social de los últimos 3 meses el cual será entregado una
																						vez pagada la liquidación
																						<br><br>
																						5. Notificación del examen médico:
																						<br>
																						Notificamos que a partir de la fecha de su retiro usted cuenta con cinco (5) días hábiles
																						para solicitar y realizarse el examen médico de egreso para dar cumplimiento a lo estipulado
																						por el artículo 57 del CST. De no realizarse dicho examen comprendemos que usted se
																						encuentra en excelente estado de salud. Para la solicitud de realización del examen médico
																						debe incluir al correo electrónico <a style="color:blue" href="mailto:saludocupacional@emtelco.com.co">saludocupacional@emtelco.com.co</a>  los siguientes datos:
																						<br>
																						- Cédula de ciudadanía
																						<br>
																						- Carta de retiro y/o renuncia. (opcional a mano en letra legible)
																						<br>
																						- Informar Ciudad de residencia y teléfono de contacto.
																						<br>
																						<br>
																						<h6>Nota: Para personal vinculado por la temporal debe solicitar los documentos anteriormente mencionados al ejecutivo de cuenta
																							o en las oficinas de la temporal respectiva.
																						</h6>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<button style="float:right" type="submit" class="btn-primary" name="Enviar" id="Enviar">Enviar</button>
																<br>
															</form><!-- Fin del formulario -->
														</section><!-- Fin de los steps -->
													</div>
													<br>
													<div  id="pie">&copy Emtelco</h1></div>
													<br>
													<button id="salir" class="btn-primary" type="button" @click.prevent="volverConsulta">Cerrar sesión
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<script type="text/javascript" src="Asistente/js/jquery-3.1.1.min.js"></script>
								<!--  firmas-->
								<script type="text/javascript">
								var $lines = $('.prompt p');
								$lines.hide();
								var lineContents = new Array();
								var terminal = function() {
									var skip = 0;
									typeLine = function(idx) {
										idx == null && (idx = 0);
										var element = $lines.eq(idx);
										var content = lineContents[idx];
										if(typeof content == "undefined") {
											$('.skip').hide();
											return;
										}
										var charIdx = 0;
										var typeChar = function() {
											var rand = Math.round(Math.random() * 150) + 25;
											setTimeout(function() {
												var char = content[charIdx++];
												element.append(char);
												if(typeof char !== "undefined")
												typeChar();
												else {
													element.append('<br/><span class="output">' + element.text().slice(9, -1) + '</span>');
													element.removeClass('active');
													typeLine(++idx);
												}
											}, skip ? 0 : rand);
										}
										content = '' + content + '';
										element.append(' ').addClass('active');
										typeChar();
									}
									$lines.each(function(i) {
										lineContents[i] = $(this).text();
										$(this).text('').show();
									});
									typeLine();
								}
								terminal();
								</script>
								<script type="text/javascript" src="Asistente/js/vue.js"></script>
								<script type="text/javascript" src="Asistente/js/vue-resource.min.js"></script>
								<script type="text/javascript" src="Asistente/js/alertify.js"></script>
								<script type="text/javascript">
								jQuery.noConflict()
								</script>
								<script>//Firmas
								(
									function($) {
										var topics = {};
										$.publish = function(topic, args) {
											if (topics[topic]) {
												var currentTopic = topics[topic],
												args = args || {};

												for (var i = 0, j = currentTopic.length; i < j; i++) {
													currentTopic[i].call($, args);
												}
											}
										};
										$.subscribe = function(topic, callback) {
											if (!topics[topic]) {
												topics[topic] = [];
											}
											topics[topic].push(callback);
											return {
												"topic": topic,
												"callback": callback
											};
										};
										$.unsubscribe = function(handle) {
											var topic = handle.topic;
											if (topics[topic]) {
												var currentTopic = topics[topic];

												for (var i = 0, j = currentTopic.length; i < j; i++) {
													if (currentTopic[i] === handle.callback) {
														currentTopic.splice(i, 1);
													}
												}
											}
										};
									})(jQuery);
									</script>
									<script src="libs/jSignature.min.noconflict.js" charset="utf-8"></script>
									<script type="text/javascript" src="Asistente/js/bootstrap.min.js"></script>
									<script type="text/javascript" src="Asistente/js/modelosVue.js"></script>
									<script type="text/javascript" src="Asistente/js/ConfiguracioneJquery.js"></script>
								</body>
								</html>
