<!DOCTYPE html>
<html lang="es">
<head>
<title>OBSERVATORIO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<LINK REL=StyleSheet HREF="estilos.css" TYPE="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="slider.js"></script>
<script src="menu_bar.js"></script>
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
<div class="cuerpo">
  <div class="columna medio">
      <br>
      <?php
      include("funciones.php");
      $id_noti = $_GET["id"];
      extendida_noticia($id_noti)
      ?>
      <br>
      <br>
      <br>
      <a class="mas_noti" href="nuevapag.php?pagina=1&seccion=0">Más noticias</a>
  </div>
  <div class="columna side" >
  <?php /*proximas_act() */?>
      <div class="info_ref">
            <span class="titulo_prox" >¿Dónde puedo denunciar violencia familiar y de género?</span>
            <div class="row row_ref">➢ <span class="resaltar_ref">Secretaría General de Acceso a la Justicia</span><span class="under_ref"> Av. Santa Catalina Nº 1858 - Tel: 0800-444-0227 / 376-4447756 / 376-4446590 / 376-4446543</span></div>
            <div class="row row_ref">➢ Cualquier <span class="resaltar_ref">Comisaría</span> (no sólo la de la Mujer)</div>
            <div class="row row_ref">➢ <span class="resaltar_ref">Juzgados</span> de Paz y Familia</div>
            <div class="row row_ref">➢ <span class="resaltar_ref">Defensorías</span> y <span class="resaltar_ref">Fiscalías</span></div>
            <div class="row row_ref">➢ Llamando a la <span class="resaltar_ref">Línea 102</span> y <span class="resaltar_ref">Línea 137</span><span class="under_ref">Las 24hs. todos los dias</span></div>
      </div>
      <iframe width="100%" height="250px" src="https://www.youtube.com/embed/1xhfgWdzwac" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

  </div>
</div>
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
