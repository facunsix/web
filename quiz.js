document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    const testType = params.get("type");
    let tituloTest;

    if (testType) {
        loadTest(testType);
    }

    function loadTest(testType) {
        let total, categoria, respuestaFinal;
        let tipoViolencia = "";
        let tipoGuia = testType; // Define tipoGuia al inicio del código
        fetch(`guias_disparadoras/${testType}.csv`)
            .then(response => response.text())
            .then(data => {
                const lineas = data.split("\n");
                if (lineas.length < 2) {
                    throw new Error("El archivo CSV no tiene el formato esperado.");
                }
                const camposIniciales = lineas[1].split(",");
                tituloTest = camposIniciales[2]?.trim();
                tipoViolencia = camposIniciales[2]?.trim();
                respuestaBajo = camposIniciales[3]?.trim() || "";
                respuestaMedio = camposIniciales[4]?.trim() || "";
                respuestaAlto = camposIniciales[5]?.trim() || "";
                respuestaMuyalta = camposIniciales[6]?.trim() || "";

                document.title = `${tituloTest}`;
                document.getElementById("testType").textContent = tituloTest;

                let html = "";
                for (let i = 1; i < lineas.length; i++) {
                    const campos = lineas[i].split(",");
                    if (campos.length < 7) continue;
                    const preguntaId = campos[0]?.trim();
                    const preguntaTexto = campos[1]?.trim();

                    html += "<div class='question-container'>";
                    html += `<div class='question'>${preguntaTexto}</div>`;
                    html += "<div class='respuestas'>";
                    html += `<div class='respuesta'><input type='radio' id='${preguntaId}_nunca' name='${preguntaId}' value='0'><label for='${preguntaId}_nunca'>Nunca</label></div>`;
                    html += `<div class='respuesta'><input type='radio' id='${preguntaId}_aveces' name='${preguntaId}' value='1'><label for='${preguntaId}_aveces'>A veces</label></div>`;
                    html += `<div class='respuesta'><input type='radio' id='${preguntaId}_amenudo' name='${preguntaId}' value='2'><label for='${preguntaId}_amenudo'>A menudo</label></div>`;
                    html += `<div class='respuesta'><input type='radio' id='${preguntaId}_siempre' name='${preguntaId}' value='3'><label for='${preguntaId}_siempre'>Siempre</label></div>`;
                    html += "</div>";
                    html += "</div>";

                }                    
                document.getElementById("questions").innerHTML = html;

                document.querySelectorAll("input[type='radio']").forEach(function (input) {
                    input.addEventListener("change", function () {
                        const preguntaContainer = this.closest('.question-container');
                        preguntaContainer.classList.remove("blink");
                        document.querySelector(".progress-container").style.display = "block";
                        actualizarBarraDeProgreso();
                    });
                });
            })
            .catch(error => {
                console.error('Error loading questions:', error);
                document.getElementById("questions").innerHTML = "<p>Error al cargar las preguntas. Por favor, intente nuevamente.</p>";
            });

        document.getElementById("quizForm").addEventListener("submit", function (event) {
            event.preventDefault();

            let respuestas = {};
            total = 0;
            let todasLasPreguntasRespondidas = true;
            const totalDePreguntas = document.querySelectorAll(".question-container").length;

            document.querySelectorAll("input[type='radio']:checked").forEach(function (input) {
                const pregunta = input.name;
                const respuesta = parseInt(input.value);
                respuestas[pregunta] = respuesta;
                total += respuesta;
            });

            document.querySelectorAll(".question-container").forEach(function (container) {
                const idPregunta = container.querySelector("input[type='radio']").name;
                if (!(idPregunta in respuestas)) {
                    todasLasPreguntasRespondidas = false;
                    container.classList.add("blink");
                    container.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    setTimeout(() => {
                        container.classList.remove("blink");
                    }, 15000);
                }
            });

            if (!todasLasPreguntasRespondidas) {
                return;
            }

            const recaptchaResponse = grecaptcha.getResponse();
            const recaptchaContainer = document.querySelector(".g-recaptcha");

            if (!recaptchaResponse) {
                recaptchaContainer.classList.add("error");
                setTimeout(() => {
                    recaptchaContainer.classList.remove("error");
                }, 600);
                return;
            }

            document.querySelector(".progress-container").style.display = "none";

            const puntajePromedio = total / totalDePreguntas;

            let nivel = "";

            if (tipoGuia === "Percepción_y_Valoración_Personal") {
                console.log("si entro");
                if (puntajePromedio <= 0.66) {
                    categoria = "Bajo";
                    respuestaFinal = respuestaBajo;
                    nivel = "high"; // Fondo rojo para autoestima baja
                } else if (puntajePromedio <= 1.99) {
                    categoria = "Medio";
                    respuestaFinal = respuestaMedio;
                    nivel = "medium"; // Fondo amarillo para autoestima media
                } else {
                    categoria = "Alto";
                    respuestaFinal = respuestaAlto;
                    nivel = "low"; // Fondo verde para autoestima alta
                }
            } else {
                if (puntajePromedio <= 0.66) {
                    categoria = "Bajo";
                    respuestaFinal = respuestaBajo;
                    nivel = "low"; // Fondo verde para violencia baja
                } else if (puntajePromedio <= 1.99) {
                    categoria = "Medio";
                    respuestaFinal = respuestaMedio;
                    nivel = "medium"; // Fondo amarillo para violencia media
                } else {
                    categoria = "Alto";
                    respuestaFinal = respuestaAlto;
                    nivel = "high"; // Fondo rojo para violencia alta
                }
            }

            const dataToSend = {
                genero: document.getElementById("gender").value,
                edad: document.getElementById("age").value,
                categoria: categoria,
                tipo_test: tituloTest, 
                "g-recaptcha-response": recaptchaResponse
            };
            fetch("procesar_respuestas.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(dataToSend)
            })
            .then(response => response.text())
            .then(data => {
      
                // Ocultar elementos y mostrar resultado
                document.getElementById("titulo").style.display = "none";
                document.getElementById("quizForm").style.display = "none";
                document.getElementById("resultText").innerHTML = `<br>${respuestaFinal}<br>${data}`;
                document.getElementById("result").classList.add("centered");
    // Definir el elemento del resultado
    const resultElement = document.getElementById("result");

    // Ajustar el margen superior del cuadro de resultados según la resolución de pantalla


    resultElement.style.display = "block";
    document.getElementById("closeResult").style.display = "block";
    document.getElementById("pie-pagina").style.display = "none";

    const helpLinkElement = document.getElementById("helpLink");
    if (helpLinkElement) {
        helpLinkElement.href = "https://www.google.com/maps/d/edit?mid=10SaOTB3nqe2AIppBdynZASEQuLq95bI&usp=sharing";
    }
    resultElement.classList.remove('low', 'medium', 'high', 'very-high');
    resultElement.classList.add(nivel);
})
            .catch(error => {
                document.getElementById("resultText").innerHTML = "Hubo un error al guardar el test. Por favor, inténtalo de nuevo.";
                document.getElementById("result").classList.add("centered");
                document.getElementById("result").style.display = "block";
                document.getElementById("closeResult").style.display = "block";
                console.error("Error:", error);
            });
        });

        document.getElementById("closeResult").addEventListener("click", function () {
            document.getElementById("result").style.display = "none";
            document.getElementById("titulo").style.display = "block";
            document.getElementById("quizForm").reset();
            document.getElementById("quizForm").style.display = "block";
            document.getElementById("progressBar").style.width = "0%";
            document.getElementById("progressBar").setAttribute("data-percentage", "0");
            document.querySelector(".progress-container").style.display = "none";
            document.getElementById("pie-pagina").style.display = "block";


            grecaptcha.reset();
            document.getElementById("resultText").innerHTML = "";
            actualizarBarraDeProgreso();
        });

        function actualizarBarraDeProgreso() {
            const totalDePreguntas = document.querySelectorAll(".question-container").length;
            const preguntasRespondidas = document.querySelectorAll("input[type='radio']:checked").length;
            const porcentajeCompletado = (preguntasRespondidas / totalDePreguntas) * 100;
            const progressBar = document.getElementById("progressBar");
            progressBar.style.width = porcentajeCompletado + "%";
            progressBar.setAttribute("data-percentage", porcentajeCompletado);

            if (preguntasRespondidas === totalDePreguntas) {
                document.querySelectorAll(".question-container.blink").forEach(function (container) {
                    container.classList.remove("blink");
                });
            }
        }

        const navBarHeight = document.getElementById("navbar").offsetHeight;
        const progressContainer = document.querySelector(".progress-container");
        progressContainer.style.top = navBarHeight + "px";
        progressContainer.style.display = "none";
    }
});
