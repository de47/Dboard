<!DOCTYPE html>
<?php // IDEA: //Para subir masivamente la información de los colabores retirados se utilizó la libreria// ?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="subidas/emt.ico">
  <link rel="stylesheet" href="Asistente/css/main.css">
  <link rel="stylesheet" href="Asistente/css/Alertify.css">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1.0, width=device-height">
  <link rel="stylesheet" href="Asistente/css/bootstrap.min.css">
  <title>
    subir archivo
  </title>
</head>
<body>
  <div id="body">
    <div class="container">
      <div class="row">
        <img style="margin: 0" src="Asistente\Imagenes\logo-emtelco-_cxbpo.png">
      </div>
      <div id="cabecera"><h1>Cargar retiros</h1></div>
      <div class="col-md-sx-12">
        <h1  style="color: #A1C1D5;text-align: center" class="cd-headline letters type">
          <span>Hola</span>
          <span class="cd-words-wrapper waiting">
            <b class="is-visible">Sebastian!</b>
            <b>Malena!</b>
            <b>María!</b>
            <b>Didier!</b>
            <b>Juan Diego!</b>
            <b>Adriana!</b>
          </span>
        </h1>
      </div>
      <div class="wrapper">
        <div class="clip-text clip-text_one">Emtelco</div>
      </div>
      <form @submit.prevent="subir">
        <br>
        <div class="file-upload">
          <div class="file-select">
            <div class="file-select-button" id="fileName">Selecciona un archivo</div>
            <div class="file-select-name" id="noFile">Ningún archivo...</div>
            <input type="file" name="chooseFile" id="chooseFile" accept=".txt">
          </div>
          <br>
          <button  class="btn btn-primary" id="Enviar" type="submit" name="Enviar">Cargar archivo</button>
        </div>
      </form>
      <div id="pie">&copy Emtelco</div>
    </div>
  </div>
  <script type="text/javascript" src="Asistente/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="Asistente/js/vue.js"></script>
  <script type="text/javascript" src="Asistente/js/vue-resource.min.js"></script>
  <script type="text/javascript" src="Asistente/js/papaparse.min.js"></script>
  <script type="text/javascript" src="Asistente/js/alertify.js"></script>
  <script type="text/javascript" src="Asistente/js/modelosVue.js"></script>
  <style media="screen">
  h1{color: white;}
}
body{background-color: white;}
.file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #A1C1D5;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background: #A1C1D5;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
/
* {
  margin: 0;
  padding: 0;
}
*,
:before,
:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html,
.wrapper {
  text-align: center;
}
.title {
  font-size: 2em;
  position: relative;
  margin: 0 auto 1em;
  padding: 1em 1em .25em 1em;
  text-align: center;
  text-transform: uppercase;
}
.title:after {
  position: absolute;
  top: 100%;
  left: 50%;
  width: 240px;
  height: 4px;
  margin-left: -120px;
  content: '';
  background-color: #fff;
}
.clip-text {
  font-size: 6em;
  font-weight: bold;
  line-height: 1;
  position: relative;
  display: inline-block;
  margin: .25em;
  padding: .5em .75em;
  text-align: center;
  color: #fff;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.clip-text:before,
.clip-text:after {
  position: absolute;
  content: '';
}
.clip-text:before {
  z-index: -2;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-image: inherit;
}
.clip-text:after {
  position: absolute;
  z-index: -1;
  top: .125em;
  right: .125em;
  bottom: .125em;
  left: .125em;
  background-color: white;
}
.clip-text--no-textzone:before {
  background-position: -.65em 0;
}
.clip-text--no-textzone:after {
  content: none;
}
.clip-text--cover,
.clip-text--cover:before {
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  background-size: cover;
  background-position: 50% 50%;
}
.clip-text_one {
  background-image: url(Asistente/Imagenes/Imagen1.jpg);
}
</style>
</body>
<script type="text/javascript">//Para subir el archivo
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');//si el input está vacío muestra el mensaje
    $("#noFile").text("Ningún archivo...");

  }
  else {
    $(".file-upload").addClass('active');//si ya se encuentra el archjivo muestra el nombre
    $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
  }
});
</script>
<script type="text/javascript">
jQuery(document).ready(function($){
  var animationDelay = 2500,  //Tiempo de animación de los saludos
  barAnimationDelay = 70000,
  barWaiting = barAnimationDelay - 3000,
  lettersDelay = 50,
  typeLettersDelay = 150,
  selectionDuration = 500,
  typeAnimationDelay = selectionDuration + 800,
  revealDuration = 600,
  revealAnimationDelay = 1500;
  initHeadline();
  function initHeadline() {
    singleLetters($('.cd-headline.letters').find('b'));
    animateHeadline($('.cd-headline'));
  }
  function singleLetters($words) {
    $words.each(function(){
      var word = $(this),
      letters = word.text().split(''),
      selected = word.hasClass('is-visible');
      for (i in letters) {
        letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
      }
      var newLetters = letters.join('');
      word.html(newLetters).css('opacity', 1);
    });
  }

  function animateHeadline($headlines) {
    var duration = animationDelay;
    $headlines.each(function(){
      var headline = $(this);
      if (!headline.hasClass('type') ) {
        var words = headline.find('.cd-words-wrapper b'),
        width = 0;
        words.each(function(){
          var wordWidth = $(this).width();
          if (wordWidth > width) width = wordWidth;
        });
        headline.find('.cd-words-wrapper').css('width', width);
      };
      setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
    });
  }

  function hideWord($word) {
    var nextWord = takeNext($word);
    if($word.parents('.cd-headline').hasClass('type')) {
      var parentSpan = $word.parent('.cd-words-wrapper');
      parentSpan.addClass('selected').removeClass('waiting');
      setTimeout(function(){
        parentSpan.removeClass('selected');
        $word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
      }, selectionDuration);
      setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);

    } else if($word.parents('.cd-headline').hasClass('letters')) {
      var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
      hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
      showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

    }  else if($word.parents('.cd-headline').hasClass('clip')) {
      $word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
        switchWord($word, nextWord);
        showWord(nextWord);
      });
    } else {
      switchWord($word, nextWord);
      setTimeout(function(){ hideWord(nextWord) }, animationDelay);
    }
  }

  function showWord($word, $duration) {
    if($word.parents('.cd-headline').hasClass('type')) {
      showLetter($word.find('i').eq(0), $word, false, $duration);
      $word.addClass('is-visible').removeClass('is-hidden');
    }  else if($word.parents('.cd-headline').hasClass('clip')) {
      $word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){
        setTimeout(function(){ hideWord($word) }, revealAnimationDelay);
      });
    }
  }

  function hideLetter($letter, $word, $bool, $duration) {
    $letter.removeClass('in').addClass('out');
    if(!$letter.is(':last-child')) {
      setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);
    } else if($bool) {
      setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
    }
    if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
      var nextWord = takeNext($word);
      switchWord($word, nextWord);
    }
  }

  function showLetter($letter, $word, $bool, $duration) {
    $letter.addClass('in').removeClass('out');
    if(!$letter.is(':last-child')) {
      setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration);
    } else {
      if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
      if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
    }
  }

  function takeNext($word) {
    return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
  }

  function takePrev($word) {
    return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
  }

  function switchWord($oldWord, $newWord) {
    $oldWord.removeClass('is-visible').addClass('is-hidden');
    $newWord.removeClass('is-hidden').addClass('is-visible');
  }
});
</script>
</html>
