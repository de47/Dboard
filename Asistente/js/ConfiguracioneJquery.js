
// IDEA: js de tabs
(function($){
  $(document).ready(function () {

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

      var $target = $(e.target);

      if ($target.parent().hasClass('disabled')) {
        return false;
      }
    });

    $(".btn-primary").click(function (e) {

      var $active = $('.wizard .nav-wizard li.active');
      $active.next().removeClass('disabled');
      nextTab($active);

    });

    function nextTab(elem) {
      $(elem).next().find('a[data-toggle="tab"]').click();
    };

    function toggleChevron(e) {
      $(e.target)
      .prev('.panel-heading')
      .find("i.indicator")
      .toggleClass('glyphicon-chevron-down-custom glyphicon-chevron-up-custom');
    };

    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);


  });

})(jQuery);



 (function($){  $(document).ready(function() {

// IDEA: Firma del Colaborador
    var width = window.innerWidth * 0.95;
    // This is the part where jSignature is initialized.
    var $sigdiv = $("#signature").jSignature({'UndoButton':true})

    // All the code below is just code driving the demo.
    , $tools = $('#tools')
    , pubsubprefix = 'jSignature.demo.'

    var export_plugins = $sigdiv.jSignature('listPlugins','export')
    , chops = ['<span><b>Extraer firma como: </b></span><input type="text" id="formato" value="image"></span>']

    $('<input type="button" id="generarFirmaUno" value="Generar Firma">').bind('click', function(e){
      if (e.target.value !== ''){
        var data = $sigdiv.jSignature('getData', 'image')
        $.publish(pubsubprefix + 'formatchanged')
        if (typeof data === 'string'){
          $('#firmate', $tools).val(data)
        } else if($.isArray(data) && data.length === 2){
          $('#firmate', $tools).val(data.join(','))
          $.publish(pubsubprefix + data[0], data);
        } else {
          try {
            $('#firmate', $tools).val(JSON.stringify(data))
          } catch (ex) {
            $('#firmate', $tools).val('Not sure how to stringify this, likely binary, format.')
          }
        }
      }
    }).appendTo($tools)


    $('<input type="button" value="Borrar">').bind('click', function(e){
      $sigdiv.jSignature('reset')
      $("#firmate").val('')
    }).appendTo($tools)
    $('<div><textarea id="firmate" name="firmate" style="width:100%;height:7em;"></textarea></div>').appendTo($tools);

    if (Modernizr.touch){
      $('#scrollgrabber').height($('#content').height())
    }

  })

})(jQuery);

(function($){  $(document).ready(function() {
  // IDEA: Firma del Jefe
  var width = window.innerWidth * 0.95;
  // This is the part where jSignature is initialized.
  var $sigdiv = $("#signatureJefe").jSignature({'UndoButton':true})

  // All the code below is just code driving the demo.
  , $tools = $('#toolsJefe')
  , pubsubprefix = 'jSignature.demo.'

  var export_plugins = $sigdiv.jSignature('listPlugins','export')
  , chops = ['<span><b>Extraer firma como: </b></span><input type="text" id="formato" value="image"></span>']

  $('<input type="button" id="generarFirmaDos" value="Generar Firma">').bind('click', function(e){
    if (e.target.value !== ''){
      var data = $sigdiv.jSignature('getData', 'image')
      $.publish(pubsubprefix + 'formatchanged')
      if (typeof data === 'string'){
        $('#firmateJefe', $tools).val(data)
      } else if($.isArray(data) && data.length === 2){
        $('#firmateJefe', $tools).val(data.join(','))
        $.publish(pubsubprefix + data[0], data);
      } else {
        try {
          $('#firmateJefe', $tools).val(JSON.stringify(data))
        } catch (ex) {
          $('#firmateJefe', $tools).val('Not sure how to stringify this, likely binary, format.')
        }
      }
    }
  }).appendTo($tools)

  $('<input type="button" value="Borrar">').bind('click', function(e){
    $sigdiv.jSignature('reset')
    $("#firmateJefe").val('')
  }).appendTo($tools)
  $('<div><textarea id="firmateJefe" name="firmate1" style="width:100%;height:7em;"></textarea></div>').appendTo($tools);

  if (Modernizr.touch){
    $('#scrollgrabberJefe').height($('#contentJefe').height())
  }


  })

})(jQuery)
