document.addEventListener("DOMContentLoaded", function() {
  
  // Ejecutar la función de ajuste de texto cuando se cargue la página, se cambie el tamaño de la ventana y se cargue el contenido HTML
  ajustarTextoPopup();

  window.addEventListener('resize', function() {
    ajustarTextoPopup();
  });
    var popup = document.getElementById("popup");
    var close = document.getElementsByClassName('close')[0];
  
   close.addEventListener("click", function() {
      popup.style.visibility = "hidden";
    });
  
    window.addEventListener("load", function() {
      setTimeout(function() {
        popup.style.visibility = "visible";
      }, 1000); // lo que tarda en mostrar el popup
    });
  });

// Función para verificar y cambiar el texto del elemento en función de la resolución de pantalla
function ajustarTextoPopup() {
  var textoPopup = document.getElementById('texto_popup');

  if (window.matchMedia("(max-width: 767px)").matches) {
    // Cambiar el texto para resoluciones de pantalla móvil
    textoPopup.textContent = "¡No te pierdas esta excelente oportunidad! Inscríbete ahora en nuestras capacitaciones gratuitas en tu escuela";
  } else {
    // Restaurar el texto original para resoluciones de pantalla grandes
    textoPopup.textContent = "El Observatorio de Violencia Familiar y de Género se enorgullece de anunciar que continuará brindando capacitaciones en las escuelas de toda la Provincia. ¡No puedes perderte la oportunidad de participar en estas valiosas sesiones educativas!";
  }
}







  // Obtener el elemento del formulario embebido
  // var iframe = document.getElementById('google-form-iframe');

  // // Función para ajustar la altura del formulario
  // function ajustarAlturaFormulario() {
  //   var popupHeight = document.getElementById('popup').offsetHeight; // Obtener la altura del popup
  //   var formContainer = iframe.contentDocument.documentElement; // Obtener el contenedor del formulario dentro del iframe
  //   formContainer.style.height = (popupHeight * 0.6) + 'px'; // Establecer la altura del contenedor del formulario

  //   console.log('La altura del formulario se ha ajustado correctamente.');
  // }

  // // Ejecutar la función de ajuste de altura cuando se cargue la página y se cambie el tamaño de la ventana
  // window.addEventListener('load', function() {
  //   ajustarAlturaFormulario();
  //   console.log('La página se ha cargado.');

  //   window.addEventListener('resize', function() {
  //     ajustarAlturaFormulario();
  //     console.log('El tamaño de la ventana ha cambiado.');
  //   });
  // });




  