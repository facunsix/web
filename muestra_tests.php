<!DOCTYPE html>
<html lang="es">
<head>
<title>OBSERVATORIO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<LINK REL=StyleSheet href="estilos.css" TYPE="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="menu_bar.js"></script>
<script defer src="quiz.js"></script>
<script defer src="tests.js"></script>
<link rel="shortcut icon" href="favicon.png">
</head>
<?php include("funciones.php");?>
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
    <h1>Cuestionarios de Análisis y Bienestar Emocional </h1>
    <!-- Espacio de separación -->
<div class="espacio-separacion"></div>

    <!-- Lista de tests -->
    <div id="testList" class="test-list"></div>

</div>
<!-- Espacio de separación -->
<div class="espacio-separacion1"></div>

<div class="pie-pagina">
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

</body>
</html>
