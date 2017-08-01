var app = new Vue({
  el: '#body',
  data: {
    Datos: [
      {Nombres: ''},//0
      {FRetiro: ''},//1
      {Documento:''},//2
      {CiudadLaboro: ''},//3
      {MotivoRetiro: ''},//4 Renuncia voluntaria o desición dela empresa
      {MotivoRenuncia: ''},//5 A
      {TipoDocumento:''},//6
      {Lugar: ''},//7
      {Correo: ''},//8
      {CiudadResidencia: ''},//9
      {Telefono:''},//10
      {Terminacion: false},//11
      {AplicaDescuento: ''},//12
      {FechaAceptacion: ''},//13
      {FechaActual: ''},//14
      {NombreJefe: ''},//15
      {CargoJefe: ''},//16
      {firmar: 'Firmar'},//18 controla si firma o no
      {firmarJefe: 'FirmarJefe'},//19
      {consultaUno:  true}//20
    ],
    //Este elemento se crea con el fin de guardar las calificaciones de la experiencia del usuario durante su trabajo en Emtelco
    Experiencia: [
      {Capacitacion_Calificacion: '', Capacitacion_Observaciones: ''},//posición 0
      {jefe_Calificacion:'', jefe_Observaciones:''},//posición 1
      {puesto_Calificacion:'', puesto_Observaciones:''},//posición 2
      {Conclusion_Calificacion:'', Conclusion_Observaciones:''},//posición 3
      {Aspectos: []},//posición 4
      {Recomendaciones: ''},//posición 5
      {nombre: ''}//posición 6
    ],
    a:[
      {Opciones: [],Observaciones: '', TipoRadio: ''}
    ],
    FormularioRetiro:[
      {Firma: ''},//0 En esta variable se almacena la firma del colaborador
      {FechaNotificacion: ''},//1
      {FirmaDelJefe : ''}//2 En esta variable se almacena la firma del Jefe
    ],
    AtorizacionDescuento: [
      {suma: ''},//posicion 0
      {Conceptos: [], bandera: false},//1
      {ValoresNoDevueltos://2
        [
          {Equipos: ''},//0
          {Herramientas: ''},//1
          {OtrosNombre: '', valor: ''} ]},//2
          {firmaJefe: ''}//3
        ],
        PazYSalvo: [
          {Computador: '', ObservacionComputador: ''},//0
          {movil: '', Observacionmovil: ''},//1
          {Sim: '', ObservacionSim: ''},//2
          {portatil: '', Observacionportatil: ''},//3
          {Tablet: '', ObservacionTablet: ''},//4
          {Diadema: '', ObservacionDiadema: ''},//5
          {Avaya: '', ObservacionAvaya: ''},//6
          {carne: '', Observacioncarne: ''},//7
          {acceso: '', Observacionacceso: ''},//8
          {Vestuario: '', ObservacionVestuario: ''},//9
          {Elementos: '', ObservacionElementos: ''},//10
          {Herramientas: '', ObservacionHerramientas: ''},//11
          {Documentos: '', ObservacionDocumentos: ''},//12
          {Anticipo: '', ObservacionAnticipo: ''},//13
          {Otros:[//14
            {Nombre: '', Entrega: '', Descripcion: ''}//0
          ]}
        ],
        datosCargados: null

      },// fin del data
      //métodos
      methods: {
        /**
        Este método es el que  ayuda a validar si un Documento
        existe o no, si existe nos muestra un formulario con cierta
        información cargada; que el lider de cuenta subío por medio de un excel a la base de datos y que el colaborador debe completar.
        Si el documento no existe muestra un mensaje de alerta.
        */
        consultar: function() {
          if (this.Datos[2].Documento == '') {
            alertify.error("INGRESA UN DOCUMENTO")
          } else {
            this.$http.get('Ingresar.php', {
              params: {
                cedula: this.Datos[2].Documento
              }
            }).then(response => {
              if (response.body.length == 0 ) {
                alertify.error("EL DOCUMENTO NO EXISTE")
              } else {
                alertify
                .okBtn("ACEPTAR")
                .cancelBtn("CANCELAR")
                .confirm("<p style='align=justify'><b>Para Emtelco S.A.S es importante contar con tu opinión y experiencia durante el tiempo laborado en nuestra compañía. <br> Te invitamos a realizar esta encuesta que contribuirá al mejoramiento y desarrollo organizacional.<br> La información aquí suministrada es de uso confidencial de la Dirección de Talento Humano.<b></p>", function (ev) {
                  ev.preventDefault();
                  alertify.logPosition("top right");
                  alertify.log("Recuerda ingresar todos los campos");
                  app.firmate = response.body[0].FirmaColaborador;
                  app.FormularioRetiro[2].FirmaDelJefe = response.body[0].FirmaJefe;
                  app.Datos[19].consultaUno = !app.Datos[19].consultaUno;
                  app.Datos[0].Nombres = response.body[0].Nombre;
                  app.Datos[6].TipoDocumento = response.body[0].TipoDocumento;
                  app.Datos[7].Lugar = response.body[0].CiudadExpedicion;
                  app.Datos[3].CiudadLaboro = response.body[0].CiudadLoboro;
                  app.Datos[1].FRetiro = response.body[0].FechaRetiro;
                  app.Datos[10].Telefono = response.body[0].Telefono;
                  app.Datos[8].Correo = response.body[0].CorreoE;
                  app.Datos[9].CiudadResidencia = response.body[0].CiudadResidencia;
                  app.Datos[4].MotivoRetiro = response.body[0].MotivoRetiro;
                  app.Datos[15].NombreJefe = response.body[0].NombreJefe;
                  app.Datos[16].CargoJefe = response.body[0].CargoJefe;
                  if (app.Datos[4].MotivoRetiro=='Decisión de la empresa') {
                    app.a[0].TipoRadio = response.body[0].MotivoEspecifico;
                  }else if (app.Datos[4].MotivoRetiro=='Renuncia voluntaria') {
                    app.Datos[5].MotivoRenuncia = response.body[0].MotivoEspecifico;
                    app.a[0].Observaciones = response.body[0].ObservacionRenuncia;
                    if (app.Datos[5].MotivoRenuncia=='Mejor oferta laboral') {
                      app.a[0].Opciones = (response.body[0].MotivoRenuncia).split(",");
                    }else {
                      app.a[0].TipoRadio = response.body[0].MotivoRenuncia;
                    }
                  }

                  // IDEA: Autorizacion
                  app.AtorizacionDescuento[0].suma = response.body[0].Suma;
                  if  (app.AtorizacionDescuento[0].suma>0)
                  {
                    app.Datos[12].AplicaDescuento='Si'
                  }else if (app.AtorizacionDescuento[0].suma<=0)  {
                    app.Datos[12].AplicaDescuento='No'
                  }
                  if (response.body[0].Conceptos) {
                    app.AtorizacionDescuento[1].Conceptos = (response.body[0].Conceptos).split(",")
                  }
                  app.AtorizacionDescuento[2].ValoresNoDevueltos[0].Equipos = response.body[0].ValorEquipo;
                  app.AtorizacionDescuento[2].ValoresNoDevueltos[1].Herramientas = response.body[0].ValorHerramientas;
                  app.AtorizacionDescuento[2].ValoresNoDevueltos[2].OtrosNombre = response.body[0].NombreOtro;
                  app.AtorizacionDescuento[2].ValoresNoDevueltos[2].valor = response.body[0].ValorOtro;
                  /**
                  Se pregunta si en la BD el colaborador se le descuenta por concepto de "La No devolución de equipos y herramientas de trabajo asignados", si es así se pone el true una variable la cual en el index.php  muestra otros campos y valores asociados a este
                  */
                  // IDEA:Paz y salvo
                  for (var i = 0; i < app.AtorizacionDescuento[1].Conceptos.length; i++) { //Mostrar conceptos No devueltos
                    if (app.AtorizacionDescuento[1].Conceptos[i]=='La No devolución de equipos y herramientas de trabajo asignados')
                    {
                      app.AtorizacionDescuento[1].bandera=true;
                      i=app.AtorizacionDescuento[1].Conceptos.length+1;//Rompimiento del control
                    }
                  }
                  app.PazYSalvo[0].Computador = response.body[0].Computador;
                  app.PazYSalvo[0].ObservacionComputador = response.body[0].ObservacionComputador;
                  app.PazYSalvo[1].movil = response.body[0].TelefonoMovil;
                  app.PazYSalvo[1].Observacionmovil = response.body[0].ObservacionMovil;
                  app.PazYSalvo[2].Sim = response.body[0].SimCard;
                  app.PazYSalvo[2].ObservacionSim = response.body[0].ObservacionSim;
                  app.PazYSalvo[3].portatil = response.body[0].Portatil;
                  app.PazYSalvo[3].Observacionportatil = response.body[0].ObservacionPortatil;
                  app.PazYSalvo[4].Tablet = response.body[0].Tablet;
                  app.PazYSalvo[4].ObservacionTablet = response.body[0].ObservacionTablet;
                  app.PazYSalvo[5].Diadema = response.body[0].Diadema;
                  app.PazYSalvo[5].ObservacionDiadema = response.body[0].ObservacionDiadema;
                  app.PazYSalvo[6].Avaya = response.body[0].Avaya;
                  app.PazYSalvo[6].ObservacionAvaya = response.body[0].ObservacionAvaya;
                  app.PazYSalvo[7].carne = response.body[0].Carne;
                  app.PazYSalvo[7].Observacioncarne = response.body[0].ObservacionCarne;
                  app.PazYSalvo[8].acceso = response.body[0].Tarjeta;
                  app.PazYSalvo[8].Observacionacceso = response.body[0].ObservacionTarjeta;
                  app.PazYSalvo[9].Vestuario = response.body[0].Vestuario;
                  app.PazYSalvo[9].ObservacionVestuario = response.body[0].ObservacionVestuario;
                  app.PazYSalvo[10].Elementos = response.body[0].Proteccion;
                  app.PazYSalvo[10].ObservacionElementos = response.body[0].ObservacionProteccion;
                  app.PazYSalvo[11].Herramientas = response.body[0].Herramientas;
                  app.PazYSalvo[11].ObservacionHerramientas = response.body[0].ObservacionHerramientas;
                  app.PazYSalvo[12].Documentos = response.body[0].Documento;
                  app.PazYSalvo[12].ObservacionDocumentos = response.body[0].ObservacionDocumento;
                  app.PazYSalvo[13].Anticipo = response.body[0].Anticipo;
                  app.PazYSalvo[13].ObservacionAnticipo = response.body[0].ObservacionAnticipo;
                  app.PazYSalvo[14].Otros[0].Nombre = response.body[0].NombreElementos;
                  app.PazYSalvo[14].Otros[0].Entrega = response.body[0].EntregaElementos;
                  app.PazYSalvo[14].Otros[0].Descripcion = response.body[0].ObservacionElementos;
                  // IDEA: Hasta aquí son los campos que trae de la bd en caso de que sebas halla subido el excel
                  // IDEA: Experiencia
                  app.Experiencia[0].Capacitacion_Calificacion = response.body[0].CapacitacionCargo;
                  app.Experiencia[0].Capacitacion_Observaciones = response.body[0].ObservacionCapacitacion;
                  app.Experiencia[1].jefe_Calificacion = response.body[0].JefeInmediato;
                  app.Experiencia[1].jefe_Observaciones = response.body[0].ObservacionJefe;
                  app.Experiencia[2].puesto_Calificacion = response.body[0].AcondicionamientoPuesto;
                  app.Experiencia[2].puesto_Observaciones = response.body[0].ObservacionPuesto;
                  app.Experiencia[3].Conclusion_Calificacion = response.body[0].ConclusionGeneral;
                  app.Experiencia[3].Conclusion_Observaciones = response.body[0].ObservacionConclusion;
                  app.Experiencia[5].Recomendaciones = response.body[0].Recomendaciones;
                  jQuery('#firmate').html(response.body[0].FirmaColaborador);
                  jQuery('#firmateJefe').html(response.body[0].FirmaJefe);
                  /**
                  Este condicional se crea con el fin de que no saque error el programa ya que si la variable llega null, vue no la puede leer
                  */
                  if (response.body[0].Cambiarias) {
                    app.Experiencia[4].Aspectos = (response.body[0].Cambiarias).split(",")
                  }
                }, function(ev) {
                  ev.preventDefault();
                });
              }
            }, response => {
              alert("El retiro no se ha ingresado")
            });
          }
        },
        /**
        Este método es el encargado de que una vez esté cargada la mitad de la información del colaborador se pueda actualizar la otra mitad
        */
        Actualizar: function() {
          var datos = new FormData();
          datos.append('cedula', this.Datos[2].Documento);
          datos.append('nombres', this.Datos[0].Nombres);
          datos.append('Tipo', this.Datos[6].TipoDocumento);
          datos.append('Lugar', this.Datos[7].Lugar);
          datos.append('Laboro', this.Datos[3].CiudadLaboro);
          datos.append('FechaRetiro', this.Datos[1].FRetiro);
          datos.append('Telefono', this.Datos[10].Telefono);
          datos.append('correoE', this.Datos[8].Correo);
          datos.append('CiudadResidencia', this.Datos[9].CiudadResidencia);
          datos.append('MotivoRetiro', this.Datos[4].MotivoRetiro);
          datos.append('Jefe', this.Datos[15].NombreJefe);
          datos.append('CargoJefe', this.Datos[16].CargoJefe);
          if (this.Datos[4].MotivoRetiro=="Decisión de la empresa") {
            datos.append('MotivoEspecifico', this.a[0].TipoRadio);
          }else if(this.Datos[4].MotivoRetiro == "Renuncia voluntaria"){
            datos.append('ObservacionesRenuncia', this.a[0].Observaciones);
            if (this.Datos[5].MotivoRenuncia == "Mejor oferta laboral") {
              datos.append('MotivoRenuncia', this.a[0].Opciones);
              datos.append('MotivoEspecifico', this.Datos[5].MotivoRenuncia);
            }else {
              datos.append('MotivoEspecifico', this.Datos[5].MotivoRenuncia);
              datos.append('MotivoRenuncia', this.a[0].TipoRadio);
            }
          }
          datos.append('CapacitacionCargo', this.Experiencia[0].Capacitacion_Calificacion);
          datos.append('ObservacionesCargo', this.Experiencia[0].Capacitacion_Observaciones);
          datos.append('JefeInmediato', this.Experiencia[1].jefe_Calificacion);
          datos.append('ObservacionesJefe', this.Experiencia[1].jefe_Observaciones);
          datos.append('AcondicionamientoPuesto', this.Experiencia[2].puesto_Calificacion);
          datos.append('ObservacionesPuesto', this.Experiencia[2].puesto_Observaciones);
          datos.append('Experiencia', this.Experiencia[3].Conclusion_Calificacion);
          datos.append('ObservacionesExperiencia', this.Experiencia[3].Conclusion_Observaciones);
          datos.append('Cambiar', this.Experiencia[4].Aspectos);
          datos.append('Recomendaciones', this.Experiencia[5].Recomendaciones);
          // IDEA: si el colaborador quiere subir o firmar
          if (this.Datos[17].firmar == 'Firmar') {
            datos.append('FirmaColaborador', jQuery("#firmate").val())
          }else {
            datos.append('FirmaColaborador', this.FormularioRetiro[0].firma);
          }
          this.$http.post('Actualizador.php', datos).then(response => {
            alertify.success("Retiro actualizado correctamente")
          }, response => {
            alertify.error("Error al actualizar ")
          })
        },
        volverConsulta: function() {//Le pregunta al usuario si desea salir
          alertify
          .okBtn("ACEPTAR")
          .cancelBtn("CANCELAR")
          .confirm("<b>¿Desea cerrar sesión?<b>", function (ev) {
            app.Datos[19].consultaUno = true;
          }, function(ev) {
            ev.preventDefault();
          });
        },
        CambiarBandera: function() {//Cambiar el estado de la bandera para que se muestren los diferentes valores de la No devolución de elementos
          this.AtorizacionDescuento[1].bandera=!this.AtorizacionDescuento[1].bandera;
        },
        /**
        Este método es el encargado de insertar los datos del colaborador en la BD por medio del excel de manera masiva
        */
        subir: function() {
          var file = $("#chooseFile");
          file.parse({
            config: {
              delimiter: "",
              newline: "",
              quoteChar: '"',
              header: false,
              dynamicTyping: false,
              preview: 0,
              encoding: "",
              worker: false,
              comments: false,
              step: undefined,
              complete: function(r) {
                console.log(r.data);
                /**
                Cuando halla terminado la configuracion del papaparse se llama a Insertar.php que tiene la estructura sql
                */
                $.ajax({
                  url: 'Insertar.php',
                  type: 'POST',
                  dataType: 'json',
                  data: {data: r.data}

                })
                .done(function(response) {
                  var a = 0;
                  var mensaje = '';
                  while (a < response.length) {
                    mensaje = mensaje + '<p>'+response[a]+'</p>'
                    a += 1;
                  }
                  alertify.log(mensaje)
                })
                .fail(function() {
                  console.log("error");
                });
              },
              error: undefined,
              download: false,
              skipEmptyLines: false,
              chunk: undefined,
              fastMode: undefined,
              beforeFirstChunk: undefined,
              withCredentials: undefined
            }
          });
        },
        /**
        En Index.php  en un input se tiene un @onchange el cual se encarga de venir aquí y tomar la imagen, pasarla a código y subirla a la BD
        */
        subirFirmaColaborador:function (e) {
          var files = e.target.files || e.dataTransfer.files;
          if (!files.length) return;
          this.createImageColaborador(files[0]);
        },
        createImageColaborador: function(file) {
          var image = new Image();
          var reader = new FileReader();
          var vm = this;
          reader.onload = function(e) {
            vm.FormularioRetiro[0].firma = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      },//Fin de los métodos
    });//fin del modelo, app
