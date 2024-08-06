<!DOCTYPE html>
<html lang="es">
<head>
<title>OBSERVATORIO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="favicon.png">
<LINK REL=StyleSheet HREF="estilos.css" TYPE="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="slider.js"></script>
<script src="menu_bar.js"></script>
<script src="popup.js"></script>

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
      <div class="slideshow-container">
          <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img class="img_sli" src="imagenes/slid1.jpeg">
          </div>
          <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img class="img_sli" src="imagenes/slid2.jpeg">
          </div>
          <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img class="img_sli" src="imagenes/slid3.jpeg">
          </div>
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <br>
      <br>

      <br>
      <span class="titulo_noti">NOTICIAS</span>
  
      <hr class="linea">
      <br>
      <br>
      <div class="noticias">
      <?php 
      include("funciones.php");
      index_noticias()
      ?>
      </div>
      <a class="mas_noti" href="nuevapag.php?pagina=1&seccion=0">Más noticias</a>
      <br>
      <br>
      <br>
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

<div id="popup">
  <div id="popup-content">
  <span class="close">&times;</span>
    <br><br>   
    <p class="texto_ext" id="texto_popup">El Observatorio de Violencia Familiar y de Género se enorgullece de anunciar que continuará brindando capacitaciones en las escuelas de toda la Provincia durante el ciclo lectivo 2023. 
    ¡No puedes perderte la oportunidad de participar en estas valiosas sesiones educativas!</p>
      
    </p>
    <br><br>
    <iframe class="google_form" id="google-form-iframe" src="https://docs.google.com/forms/d/e/1FAIpQLSe9KW_XzLFJdqUJIQq_3b2DSpI783wNvQcYWJLbOjX5Nyuw_A/viewform?embedded=true" width="100%" height="60%" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
  </div>
</div>

</body>
</html>
