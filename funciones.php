<?php 
function noticias($numpag, $numseccion)
{
    include("conexion.php");
    if ($numseccion == 0){  /*si $numseccion es igual a 0 se mostraran todas las noticias sin discriminar su seccion */
      if($consulcant = mysqli_prepare($conexion,"SELECT COUNT(*) FROM noticias")) /* se consulta mediante sql cuantos registros existen */
      {  
        mysqli_stmt_execute($consulcant);
        $resulcant = mysqli_stmt_get_result($consulcant);
      }
      else
      {
        printf("Error: %s.\n", mysqli_stmt_error($consulcant));
        die(mysqli_error($consulcant)); 
      }
    }
    else{  
        /* sino se mostraran las noticias de acuerdo al numero de seccion */
      if($consulcant = mysqli_prepare($conexion,"SELECT COUNT(*) FROM noticias WHERE noticias.seccion = ?")) /* se consulta mediante sql cuantos registros existen */
      {  
        mysqli_stmt_bind_param($consulcant,'i',$numseccion);
        mysqli_stmt_execute($consulcant);
        $resulcant = mysqli_stmt_get_result($consulcant);
      }
      else
      {
        printf("Error: %s.\n", mysqli_stmt_error($consulcant));
        die(mysqli_error($consulcant)); 
      }
    }
    $actualpag = $numpag; /* guarda la pagina actual */
    while($arraycant = mysqli_fetch_array($resulcant)){
      $cantreg = $arraycant[0]; /*se guarda la cantidad de registros en la variable cantreg */
      $cantpag = contar_paginas($cantreg); /*medianta la funcion contar_paginas se resuelve en cuantas paginas se dividira las noticias en base a la cantidad de registros*/
    }
    $limites= limitar($actualpag,$cantpag,$cantreg);/* se guardan los valores devueltos por la funcion limitar y luego son definidos en las variables inicio y desplazar */
    $inicio = $limites[0];
    $desplazar = $limites[1];
    /* consulta que ordena por fecha todas las noticias y convierte al español el formato de las fecha*/
    if($numseccion == 0){
      if($consulta = mysqli_prepare($conexion,"SELECT noticias.ID_noticias, noticias.titulo, secciones.nombre, DATE_FORMAT(noticias.fecha, '%d/%m/%Y'), noticias.desarrollo, noticias.imagen FROM noticias, secciones WHERE noticias.seccion = secciones.ID_secciones ORDER BY fecha DESC LIMIT ?, ?"))
      {  
        mysqli_stmt_bind_param($consulta,'ii',$inicio,$desplazar);
        mysqli_stmt_execute($consulta);
        $resultado = mysqli_stmt_get_result($consulta);
      }
      else
      {
        printf("Error: %s.\n", mysqli_stmt_error($consulta));
        die(mysqli_error($consulta)); 
      }
    }
    else{
      if($consulta = mysqli_prepare($conexion,"SELECT noticias.ID_noticias, noticias.titulo, secciones.nombre, DATE_FORMAT(noticias.fecha, '%d/%m/%Y'), noticias.desarrollo, noticias.imagen FROM noticias, secciones WHERE noticias.seccion = secciones.ID_secciones AND noticias.seccion = ? ORDER BY fecha DESC LIMIT ?, ?"))
      {  
        mysqli_stmt_bind_param($consulta,'iii'  ,$numseccion,$inicio,$desplazar);
        mysqli_stmt_execute($consulta);
        $resultado = mysqli_stmt_get_result($consulta);
      }
      else
      {
        printf("Error: %s.\n", mysqli_stmt_error($consulta));
        die(mysqli_error($consulta)); 
      }
    }
    while($fila = mysqli_fetch_array($resultado))
    {
        echo "<div class='tarjeta'>";  
          echo "<a class='titulo_tar' href='extendida.php?id=$fila[0]'>$fila[1]</a>";
          echo "<img class='img_tar' src='$fila[5]' alt='noticia'>";
          echo "<span class='seccion_tar $fila[2]'>$fila[2]<span class='fecha_tar'>$fila[3]</span></span>";
          echo "<span class='texto_tar'>".truncar($fila[4],230)."<a class='link_tar' href='extendida.php?id=$fila[0]'>Leer más.</a></span>";
        echo "</div>";
    }
    echo "<hr class='linea'>";
    echo "<br>";
    echo "<br>";
   paginacion($actualpag,$cantpag,$numseccion);
} 
function truncar($text, $chars) {
  if (strlen($text) <= $chars) {
      return $text;
  }
  $text = $text." ";
  $text = substr($text,0,$chars);
  $text = substr($text,0,strrpos($text,' '));
  $text = $text."...";
  return $text;
}

function contar_paginas($reg){
$pag=0;
$pag = $pag + floor($reg / 12);
if ($reg % 12 > 0){
    $pag = $pag + 1;
    return $pag;
}
else{
    return $pag;
}
}

function limitar($actualpag,$cantpag,$cantreg){
$inicio=0;          /*registro donde empieza a imprimir */
$desplazar=0;       /*cuantos registros se imprimiran contando desde el inicial */
switch($actualpag){
    case($actualpag == 1):
            $inicio = 0;
            $desplazar = 12;
            return array($inicio,$desplazar);
    case(($actualpag == $cantpag) && (($cantreg % 12) !=0)): /*para paginas que no llegan a completar 12 registros */
            $inicio = ($cantreg - ($cantreg  % 12));
            $desplazar = $cantreg  % 12;
            return array($inicio,$desplazar);
    default:
            $inicio = 12 * ($actualpag - 1); /*se restra 3 porque la primera pagina tiene 9 registros */
            $desplazar = 12;
            return array($inicio,$desplazar);
}
}

function paginacion($actualpag, $cantpag, $numseccion){
  echo"<div class='paginacion'>";
  if ($actualpag == 1){             /* si la pagina actual es 1 se bloquea el boton "anterior" */ 
    echo"<span class='pag bloquear_pag' >«</span>";
  }
  else{                          /*en cambio si no es 1, el boton trabaja normalmente */
      $numpag = $actualpag - 1;
      echo "<a class='pag' href='nuevapag.php?pagina=$numpag&seccion=$numseccion'>«</a>";
  }
  if ($cantpag < 6){              /*si la cantidad de paginas es menor a 6 no imprimirá los cuadros intermedios[...] */
      for ($i=1; $i <= $cantpag; $i++){
          if($actualpag == $i){   /* el boton con el numero de pagina actual toma los valores de la clase "actual_pag" */
              echo "<a class='pag actual_pag' href='nuevapag.php?pagina=$i&seccion=$numseccion'>$i</a>";
          }
          else{
              echo "<a class='pag' href='nuevapag.php?pagina=$i&seccion=$numseccion'>$i</a>";
          } 
      }
  }
  else{ /*si la cantidad de paginas es mayor a 5 */
        switch ($actualpag) {
          case ($actualpag < 4): /* si la pagina actual es menor a 4 */
              for ($i=1; $i < 6; $i++){
                if($actualpag == $i){
                    echo "<a class='pag actual_pag' href='nuevapag.php?pagina=$i&seccion=$numseccion'>$i</a>";
                }
                else{
                    echo "<a class='pag' href='nuevapag.php?pagina=$i&seccion=$numseccion'>$i</a>";
                }
              }
              echo"<span class='pag intermedio_pag' >...</span>";
              echo "<a class='pag' href='nuevapag.php?pagina=$cantpag&seccion=$numseccion'>$cantpag</a>";
              break;
          case ($actualpag > ($cantpag - 3)):
              echo "<a class='pag' href='nuevapag.php?pagina=1&seccion=$numseccion'>1</a>";
              echo"<span class='pag intermedio_pag' >...</span>";
              for($i=($cantpag - 4); $i <= $cantpag; $i++ ){
                  if($actualpag == $i){   /* el boton con el numero de pagina actual toma los valores de la clase "actual_pag" */
                      echo "<a class='pag actual_pag' href='nuevapag.php?pagina=$i&seccion=$numseccion'>$i</a>";
                  }
                  else{
                      echo "<a class='pag' href='nuevapag.php?pagina=$i&seccion=$numseccion'>$i</a>";
                  } 
              }
              break;
          default:
              echo "<a class='pag' href='nuevapag.php?pagina=1&seccion=$numseccion'>1</a>";
              echo"<span class='pag intermedio_pag' >...</span>";
              echo "<a class='pag' href='nuevapag.php?pagina=".($actualpag - 1)."&seccion=$numseccion'>".($actualpag - 1)."</a>";
              echo "<a class='pag actual_pag' href='nuevapag.php?pagina=".$actualpag."&seccion=$numseccion'>".$actualpag."</a>";
              echo "<a class='pag' href='nuevapag.php?pagina=".($actualpag + 1)."&seccion=$numseccion'>".($actualpag + 1)."</a>";
              echo "<a class='pag' href='nuevapag.php?pagina=".($actualpag + 2)."&seccion=$numseccion'>".($actualpag + 2)."</a>";
              echo"<span class='pag intermedio_pag' >...</span>";
              echo "<a class='pag' href='nuevapag.php?pagina=$cantpag&seccion=$numseccion'>$cantpag</a>";
              break;
        }
  }
  if ($actualpag == $cantpag){
        echo"<span class='pag bloquear_pag' >»</span>";
  }
  else{
    $numpag = $actualpag + 1;
      echo "<a class='pag' href='nuevapag.php?pagina=".($actualpag + 1)."&seccion=$numseccion'>»</a>";
  }
  echo "</div>"; 
}

function index_noticias(){
    include("conexion.php");
      $inicio = 0;
      $desplazar = 9;
      /* consulta que ordena por fecha todas las noticias y convierte al español el formato de las fecha*/
      if($consulta = mysqli_prepare($conexion,"SELECT noticias.ID_noticias, noticias.titulo, secciones.nombre, DATE_FORMAT(noticias.fecha, '%d/%m/%Y'), noticias.desarrollo, noticias.imagen FROM noticias, secciones WHERE noticias.seccion = secciones.ID_secciones ORDER BY fecha DESC LIMIT ?, ?"))
      {  
        mysqli_stmt_bind_param($consulta,'ii',$inicio,$desplazar);
        mysqli_stmt_execute($consulta);
        $resultado = mysqli_stmt_get_result($consulta);
      }
      else
      {
        printf("Error: %s.\n", mysqli_stmt_error($consulta));
        die(mysqli_error($consulta)); 
      }
  
      while($fila = mysqli_fetch_array($resultado))
      {
          echo "<div class='tarjeta'>";  
          echo "<a class='titulo_tar' href='extendida.php?id=$fila[0]'>$fila[1]</a>";
          echo "<img class='img_tar' src='$fila[5]' alt='noticia'>";
          echo "<span class='seccion_tar $fila[2]'>$fila[2]<span class='fecha_tar'>$fila[3]</span></span>";
          echo "<span class='texto_tar'>".truncar($fila[4],230)."<a class='link_tar' href='extendida.php?id=$fila[0]'>Leer más.</a></span>";
        echo "</div>";
      }
}

function extendida_noticia($id_noti){
  include("conexion.php");
  if($consulta = mysqli_prepare($conexion,"SELECT noticias.titulo, secciones.nombre, DATE_FORMAT(noticias.fecha, '%d/%m/%Y'), noticias.desarrollo, noticias.imagen FROM noticias, secciones WHERE noticias.seccion = secciones.ID_secciones AND noticias.ID_noticias= ?"))
  {  
    mysqli_stmt_bind_param($consulta,'i',$id_noti);
    mysqli_stmt_execute($consulta);
    $resultado = mysqli_stmt_get_result($consulta);
  }
  else
  {
    printf("Error: %s.\n", mysqli_stmt_error($consulta));
    die(mysqli_error($consulta)); 
  }
  while($fila = mysqli_fetch_array($resultado)){
   echo "<span class='$fila[1] seccion_ext'>$fila[1]</span>";
   echo "<span class='titulo_ext'>$fila[0]</span>";
   echo "<hr class='linea'>"; 
   echo "<br>";
   echo "<div class='contenoti_ext'>";
   echo "<img class='img_ext' src='$fila[4]' alt='noticia'>";
   echo "<span class='fecha_ext'>$fila[2]</span>";
   echo "<p class='texto_ext'>$fila[3]</p>"; 
   echo "</div>";
   echo "<br>";
   echo "<hr class='linea'>"; 
  }
}
function proximas_act(){
  include("conexion.php");
  /* consulta que ordena por fecha todas las noticias y convierte al español el formato de las fecha*/
  if($consulta = mysqli_prepare($conexion,"SELECT DATE_FORMAT(agenda.fecha, '%d/%m/%Y'),DATE_FORMAT(agenda.hora, '%H:%i'), agenda.descripcion FROM agenda ORDER BY fecha ASC LIMIT 0, 5"))
  {  
    mysqli_stmt_execute($consulta);
    $resultado = mysqli_stmt_get_result($consulta);
  }
  else
  {
    printf("Error: %s.\n", mysqli_stmt_error($consulta));
    die(mysqli_error($consulta)); 
  }
  echo "<div class='proximas'>";
  echo "<span class='titulo_prox'>Próximas actividades</span>";
  while($fila = mysqli_fetch_array($resultado)){
    echo "<div class='row'>";
    echo "<span class='fecha'>$fila[0] - $fila[1]</span>";
    echo "<span>➢ $fila[2]</span>";
    echo "</div>";
  }
  echo "</div>";
}
function titulo_noti($numseccion){
  include("conexion.php");
  if($consulta = mysqli_prepare($conexion,"SELECT secciones.nombre FROM secciones WHERE secciones.ID_secciones =?")) /* se consulta mediante sql cuantos registros existen */
     {  
     mysqli_stmt_bind_param($consulta,'i',$numseccion);
     mysqli_stmt_execute($consulta);
     $resultado = mysqli_stmt_get_result($consulta);
     }
     else
     {
     printf("Error: %s.\n", mysqli_stmt_error($consulta));
     die(mysqli_error($consulta)); 
     }
     while($numfila = mysqli_fetch_array($resultado))
     {
           echo"<span class='titulo_noti'>$numfila[0]</span>";
     } 
}
?> 
