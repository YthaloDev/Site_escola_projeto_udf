<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecurso.css">
    <title>Formulario</title>
</head>

<script>
    window.onload = function() {
        // Seleciona ambos os botões e áreas de links
        const buttons = document.querySelectorAll("#toggle-math, #toggle-science");
        const linksSections = document.querySelectorAll(".links-math, .links-science");

        // Adiciona o evento de clique em cada botão correspondente à sua seção de links
        buttons.forEach((button, index) => {
            button.addEventListener("click", function() {
                console.log("Botão foi clicado!"); // Verificar se o evento está funcionando
                linksSections[index].classList.toggle("hidden"); // Alterna a classe "hidden" para mostrar/esconder os links
            });
        });
    };
</script>


<body>
<header>
        <div class="logo">
            <h1>Home Page</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="cadastro.php">Cadastro</a></li>
            </ul>
        </nav>
    </header>

    <header><h1>CURSOS</h1></header>
    <div class="container">
        <div class="math">
            <button id="toggle-math" aria-expanded="true" type="button" aria-disabled="false" class="_rg43ryz">
            <img src="https://cdn.kastatic.org/genfiles/topic-icons/icons/math.png-444b34-128c.png" width="45" height="45" class="_fmdt9s" alt="">
            <h4>&#8203; Matemática Ensino Médio <h4>
            <span class="_ufibmvg"></span>
            </button>

            <div class="links-math">

                    <li><a class="_1jh3hava" href="math-6-ano.php">6° ano</a></li>
                    <li><a class="_1jh3hava" href="/math/pt-8-ano">8° ano</a></li>
                    <li><a class="_1jh3hava" href="/math/pt-7-ano">7° ano</a></li>
                    <li><a class="_1jh3hava" href="/math/pt-9-ano">9° ano</a></li>

            </div>
        </div>


        <div class="science">
            <button id="toggle-science" aria-expanded="true" type="button" aria-disabled="false" class="_rg43ryz">
                <img src="https://cdn.kastatic.org/genfiles/topic-icons/icons/math.png-444b34-128c.png" width="45" height="45" class="_fmdt9s" alt="">
                <h4>&#8203; Português Ensino Médio </h4>
                <span class="_ufibmvg"></span>
            </button>

            <div class="links-science">
                <li><a class="_1jh3hava" href="/science/pt-6-ano">6° ano</a></li>
                <li><a class="_1jh3hava" href="/science/pt-8-ano">8° ano</a></li>
                <li><a class="_1jh3hava" href="/science/pt-7-ano">7° ano</a></li>
                <li><a class="_1jh3hava" href="/science/pt-9-ano">9° ano</a></li>
            </div>
        </div>

    </div>

</body>
</html>