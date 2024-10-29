<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="math_6_ano.css">
    <title>Quiz de Matemática</title>

</head>
<body>
<header id='home_quiz'>
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

<div class="content-wrapper">
    <div class="quiz-container-wrapper">
        <div class="content-wrapper">
            <!-- Seção de Texto Explicativo -->
        <div class="explanation">
        <h3>Números Naturais: operações (adição, subtração, multiplicação, divisão), múltiplos e divisores, potências e raízes quadradas.</h3>
            <p>(Os números naturais são os números inteiros não negativos que usamos para contar. Eles começam em 0 (ou 1, dependendo da definição) e vão até o infinito: 0,1,2,3,4,… Operações com Números Naturais</p>
            <p><strong>Adição: </strong>Combina dois ou mais números para obter um total. Exemplo: 3+5=8</p>
            <p><strong>Subtração: </strong>Remove um número de outro. Exemplo: 8−3=5</p>
            <p><strong>Multiplicação: </strong>É a soma de um número repetido várias vezes. Exemplo: 4×3=12 (4 somado 3 vezes).</p>
            <p><strong>Divisão: </strong>Distribui um número em partes iguais. Exemplo: 12÷3=4 (12 dividido em 3 partes iguais).</p>
            <br>
            Múltiplos e Divisores
            <p><strong>Múltiplos: </strong>Um número mmm é um múltiplo de um número nnn se pode ser obtido multiplicando nnn por um número natural. Por exemplo, os múltiplos de 3 são 0,3,6,9,12,…</p>
            <p><strong>Divisores: </strong>Um número d é um divisor de n se n pode ser dividido por d sem deixar resto. Por exemplo, os divisores de 12 são 1,2,3,4,6,12.</p>
            <br>
            <p><strong>Potências</strong></p>
            <p>Uma potência representa um número multiplicado por ele mesmo um certo número de vezes. Por exemplo, 2³ (lê-se "dois elevado a três") significa 2×2×2=8. A base é o número que está sendo multiplicado (neste caso, 2) e o expoente indica quantas vezes multiplicou a base por si mesma.</p>
            <p><strong>Raízes Quadradas</strong></p>
            <p>A raiz quadrada de um número n é o valor que, quando multiplicado por si mesmo, resulta em n. Por exemplo, a raiz quadrada de 16 é 4, porque 4×4=16. O símbolo para raiz quadrada é &#8730;</p>
        </div>
        <div class="quiz-container">
            <h2>Quiz de Matemática</h2>

            <?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [
                [
                    "question" => "Uma fábrica de moda praia produziu 10.432 maiôs no mês de julho. No mês de agosto, devido a um aumento nas vendas, a produção foi de 3.158 unidades a mais do que em julho. Qual foi a quantidade total de maiôs produzidos ao final desses dois meses?",
                    "options" => ["13.590", "17.022", "9.865", "24.044", "21.458"],
                    "correct_answer" => "24.044"
                ],
                [
                    "question" => "(OBMEP) [Alterada] Uma turma possui 40 alunos, e cada um deles tem um número de 1 a 40 na lista de chamada. Em um dia, a professora chamou João para o quadro e também outros cinco alunos cujos números eram múltiplos do número de João. Qual foi o maior número chamado?",
                    "options" => ["20", "28", "30", "35", "36"],
                    "correct_answer" => "36"
                ],
                [
                    "question" => "O xadrez é um jogo muito antigo e ainda assim, muito popular. Neste jogo, as peças são movidas sobre um tabuleiro quadriculado, onde cada quadrado é chamado de casa. O tabuleiro de xadrez possui 8 linhas (horizontalmente) e 8 colunas (verticalmente), totalizando 64 casas. Cada jogador começa com 16 peças, que incluem 1 rei, 1 dama, 2 torres, 2 bispos, 2 cavaleiros e 8 peões. Com base nessa informação, conte a quantidade total de casas e peças, e, depois, assinale a opção que determina essas quantidades na forma de potências com base igual a 2
                    ",
                    "options" => ["2<sup>6</sup> de peças e 2<sup>6</sup> de casas",
                    "2<sup>5</sup> de peças e 2<sup>4</sup> de casas",
                    "2<sup>5</sup> de peças e 2<sup>9</sup> de casas", 
                    "2<sup>5</sup> de peças e 2<sup>6</sup> de casas",
                    "2<sup>6</sup> de peças e 2<sup>5</sup> de casas"],
                    "correct_answer" => "2<sup>5</sup> de peças e 2<sup>6</sup> de casas"
                ],
                [
                    "question" => "(OBMEP) [Alterada] Dos números a seguir, marque aquele que possui uma raiz quadrada exata.",
                    "options" => ["500", "200", "121", "85", "72"],
                    "correct_answer" => "121"
                ]                
            ];

            // Inicializa a questão atual se não estiver definida
            if (!isset($_SESSION['question_index'])) {
                $_SESSION['question_index'] = 0;
            }

            // Verifica se a questão atual está além do número total de questões
            if ($_SESSION['question_index'] >= count($questions)) {
                echo "<p>Parabéns! Você completou o quiz.</p>";
                session_destroy(); // Limpa a sessão ao finalizar o quiz
                exit;
            }

            // Obtém a questão atual
            $current_question = $questions[$_SESSION['question_index']];
            $question_text = $current_question["question"];
            $options = $current_question["options"];
            $correct_answer = $current_question["correct_answer"];

            // Variável de controle para armazenar a resposta do usuário
            $user_answer = null;

            // Verifica se o formulário foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_answer = $_POST['answer'];
                
                // Verifica se a resposta está correta
                if ($user_answer == $correct_answer) {
                    echo "<p class='result' style='color: green;'>Resposta correta!</p>";
                    $_SESSION['question_index']++; // Avança para a próxima questão
                    
                    // Redireciona para recarregar a página com a nova questão
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                } else {
                    echo "<p class='result' style='color: red;'>Resposta incorreta. Tente novamente!</p>";
                }
            }
            ?>

            <div class="question"><?php echo $question_text; ?></div>
            <form method="POST" action="">
                <ul class="options">
                    <?php foreach ($options as $option): ?>
                        <li>
                            <label>
                                <input type="radio" name="answer" value="<?php echo $option; ?>" required>
                                <?php echo $option; ?>
                            </label>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button type="submit">
                    <?php echo ($user_answer == $correct_answer) ? "Próxima pergunta" : "Enviar Resposta"; ?>
                </button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
