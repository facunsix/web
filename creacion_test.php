<!DOCTYPE html>
<html lang="es">
<head>
<title>OBSERVATORIO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="estilos.css" type="text/css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="menu_bar.js"></script>
<script defer src="quiz.js"></script>
<script defer src="tests.js"></script>
<link rel="shortcut icon" href="favicon.png">
</head>

<body>

<div class="encabezado">
<a href="index.php"><img class="observatorio" alt="Observatorio" src="imagenes/observatorio.png"></a>

</div>
<div class="contmenu" id="contmenu">  <!--Cambio de menu a contmenu -->
		<a class="botondelmenu">Menú</a><!--Cambio de menu_btn a botondelmenu -->
</div>
<nav class="barranavegacion" id="barranavegacion"><!--Cambio de nav a barranavegacion -->
    <a href="index.php">Inicio</a>
    <a href="quehacemos.php">Qué hacemos</a>
    <a href="nuevapag.php?pagina=1&seccion=1">Actividades</a>
    <a href="nuevapag.php?pagina=1&seccion=2">Artículos</a>
    <a href="nuevapag.php?pagina=1&seccion=3">Informes</a>
	<a href="nuevapag.php?pagina=1&seccion=4">Medios</a>
    <a href="nuevapag.php?pagina=1&seccion=5">Recursos</a>
    <a href="muestra_tests.php">¿Soy Victima?</a>
</nav>
<!-- Espacio de separación -->
<div class="espacio-separacion"></div>
    <!-- Título del test -->
    <h1 id="titulo"><span id="testType"></span></h1>
    <div class="espacio-separacion"></div>

    <!-- Contenedor para el progreso -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar" data-percentage="0"></div>
    </div>

 <!-- Resto del formulario del test -->
<!-- Formulario del test -->
<form id="quizForm">
        <div class="form-group">
            <label for="gender">De acuerdo a la identidad de genero, Te consieras:</label>
            <select id="gender" name="gender" required>
                <option value="">---</option>
                <option value="varon">Varon</option>
                <option value="mujer">Mujer</option>
                <option value="varontrans">Varon trans</option>
                <option value="mujertrans">Mujer trans</option>
                <option value="nobinario">No binario</option>
                <option value="otraidentidad">Otra identidad</option>
                <option value="prefioronocontestar">Prefiero no contestar</option>
            </select>
        </div>
        <!-- Campo de edad -->
        <div class="form-group">
            <label for="age">Edad:</label>
            <input type="number" id="age" name="age" placeholder="Ingrese su edad" required min="0" max="120">
        </div>
    

    <!-- Otros campos del formulario -->
    <div id="questions"></div>
    <!-- reCAPTCHA -->
    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LdoeQMqAAAAAP7xdir0G-3bUHks3IFyoJ3YdzVu" required></div>
    </div>
    
    <!-- Botón de envío -->
    <div class="button-container">
        <button type="submit" class="b">¡Haz clic aquí!</button>
    </div>
</form>
<!-- Espacio de separación -->
<div class="espacio-separacion1"></div>


<div class="container">
        <div class="card result-card" id="result">
            <span id="closeResult" class="btn-close">&times;</span>
            <div class="card-body">
                <h5 class="card-title fs-4"><b>Resultado</b></h5>
                <p class="card-text fs-5" id="resultText"></p>
                <p class="card-text fs-5">
                    <b>¿Quieres encontrar el centro de capacitación más cercano a tu domicilio? 
                        <a  id="helpLink" href="" target="_blank" class="highlight-link">Haz click aquí</a>
                    </b>
                </p>
            </div>
        </div>
    </div>




    <div class="espacio-separacion2"></div>
    <div id="pie-pagina" class="pie-pagina">
<div class="contebarra_pie">
      <a href="index.php">Inicio</a>
      <a href="quehacemos.php">Qué hacemos</a>
      <a href="nuevapag.php?pagina=1&seccion=1">Actividades</a>
      <a href="nuevapag.php?pagina=1&seccion=2">Artículos</a>
      <a href="nuevapag.php?pagina=1&seccion=3">Informes</a>
	<a href="nuevapag.php?pagina=1&seccion=4">Medios</a>
      <a href="nuevapag.php?pagina=1&seccion=5">Recursos</a>
      <a href="muestra_tests.php">¿Soy Victima?</a>
</div>
<div class="abajo_pie">
<div class="conteredes_pie">
      <span class="buscanos">Búscanos en</span>
      <a href="https://www.facebook.com/observatoriovfg/?ref=nf&hc_ref=ART2zx6GTWbxHdPmjptvXpoHkTVKTKgSuFX7H_3eu5PTDkJ63r04gl3eZEJMA2KT4fc&__tn__=%3C-R"><img class="redes_pie" src="imagenes/iconos/facebook.png" alt="facebook"></a>
      <a href="https://www.instagram.com/observatoriovfg/"><img class="redes_pie" src="imagenes/iconos/instagram.png" alt="instagram"></a>
      <a href="https://twitter.com/observatorio_g"><img class="redes_pie" src="imagenes/iconos/twitter.png" alt="twitter"></a>
      <a href="https://www.youtube.com/channel/UC7i1lKPYhw7USk4UiBpPhgw"><img class="redes_pie" src="imagenes/iconos/youtube.png" alt="youtube"></a>
</div>
<span class="contacto">||  Tel: +54 0376 447014 / 447018  ||  Email: observatoriovfg@gmail.com  ||  Dirección: 25 de Mayo 1460 • Pisos 2 y 3  ||  Posadas, CP 3300  ||</span>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLgLabel">Analiza tus Experiencias Personales y Relacionales</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closePopup()"></button>
            </div>
            <div class="modal-body">
                <p id="parrafo-popup">                    
                Para ayudarte a reflexionar sobre diferentes aspectos de tus experiencias y relaciones, a continuación,<span class="parrafo-text">encontrarás una serie de preguntas que te invitan a la introspección.</span> <br><br>
                Estas preguntas están diseñadas para identificar y evaluar diversas dinámicas personales y relacionales. Aunque tienen una orientación psicológica,no poseen validez diagnóstica.<br><br>
                Si sientes que estas experiencias han afectado tu bienestar emocional o el de las personas que te rodean, <span class="parrafo-text">recuerda buscar la ayuda adecuada de un profesional de la salud, sin importar tu edad, sexo, género o rol de género.</span><br><br>
                Las siguientes preguntas son sencillas y están destinadas a explorar aspectos importantes de tus experiencias y tu bienestar emocional.<br><br>
                <span class="parrafo-text">  Responde con sinceridad y recuerda que estas preguntas no buscan etiquetarte</span>, sino ofrecerte una guía para reflexionar sobre tus dinámicas personales y relacionales.
                     
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para cerrar el popup
    function closePopup() {
        const modalElement = document.getElementById("exampleModalLg");
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
        // Mostrar campos de género y edad al cerrar el popup
        document.getElementById("gender").disabled = false;
        document.getElementById("age").disabled = false;
    }

    // Mostrar el popup después de 2 segundos y desactivar campos de género y edad
    setTimeout(function () {
        const modalElement = document.getElementById("exampleModalLg");
        const modal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',
            keyboard: false
        });
        modal.show();
        document.getElementById("gender").disabled = true;
        document.getElementById("age").disabled = true;
    }, 2000);

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




</body>
</html>