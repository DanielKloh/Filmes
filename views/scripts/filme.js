


            let textarea = document.getElementById("texto");

            function popularInput() {

                let texto = textarea.value;

                let input = document.getElementById("input");

                input.setAttribute("value", texto);
            }

            function contarCaractere(comentario) {

                if (comentario.length > 270) {
                    return false;
                }
                else {
                    return true;
                }

            }

            function verificarAvaliacao() {

                let avaliacao = document.getElementById("avaliacao");


                let caracteres = contarCaractere(textarea.value);

                if (caracteres === false) {
                    alert("Você exedeou o limite de caracteres do seu comentario");
                }

                else if (avaliacao.value === "selecionar") {
                    alert("Preencha o campo avaliação");


                } else {
                    let btn = document.getElementById("btn");

                    btn.setAttribute("type", "submit");
                    popularInput();
                }

            }

