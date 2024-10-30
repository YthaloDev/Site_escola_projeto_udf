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
        <div class="explanation">
            <h3>Equações e Inequações do 2º Grau: Resolução de Equações e Problemas Envolvendo Equações Quadráticas</h3>
            <p>As equações do 2º grau, ou quadráticas, têm a forma geral:</p>
            <p><strong>ax² + bx + c = 0</strong>, onde <em>a</em>, <em>b</em> e <em>c</em> são coeficientes reais, e <em>a ≠ 0</em>.</p>
            
            <h4>1. Resolução de Equações do 2º Grau</h4>
            <p>Existem várias formas de resolver equações quadráticas:</p>
            
            <ul>
                <strong>Fórmula de Bhaskara</strong>: A fórmula para encontrar as raízes de uma equação quadrática é:
                    <br>
                    <strong>x = (-b ± √(b² - 4ac)) / 2a</strong>
                
                <strong>Fatoração</strong>: Se a equação pode ser fatorada, ela pode ser escrita como:
                    <br>
                    <strong>a(x - r₁)(x - r₂) = 0</strong>, onde <em>r₁</em> e <em>r₂</em> são as raízes.
            </ul>
        </div>
        <div class="quiz-container">
            <h2>Quiz de Matemática</h2>

            <?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [
                [
                    "question" => "Resolva a equação x² - 5x + 6 = 0.",
                    "options" => [
                        "x = 2 e x = 3",
                        "x = 1 e x = 6",
                        "x = -2 e x = -3",
                        "x = 0 e x = 6"
                    ],
                    "correct_answer" => "x = 2 e x = 3"
                ],
                [
                    "question" => "Qual é a solução da inequação x² - 4 < 0?",
                    "options" => [
                        "x < -2 ou x > 2",
                        "-2 < x < 2",
                        "x < 2",
                        "x > -2"
                    ],
                    "correct_answer" => "-2 < x < 2"
                ],
                [
                    "question" => "Qual é a forma canônica da função f(x) = x² - 6x + 8?",
                    "options" => [
                        "f(x) = (x - 4)(x - 2)",
                        "f(x) = (x - 3)² - 1",
                        "f(x) = (x - 3)² + 1",
                        "f(x) = (x + 3)(x - 1)"
                    ],
                    "correct_answer" => "f(x) = (x - 3)² - 1"
                ],
                [
                    "question" => "Determine o vértice da parábola dada pela função y = 2x² - 8x + 5.",
                    "options" => [
                        "(2, -3)",
                        "(2, -7)",
                        "(4, 5)",
                        "(4, -3)"
                    ],
                    "correct_answer" => "(2, -3)"
                ],
                [
                    "question" => "Calcule 4<sup>1/2</sup> + 9<sup>1/2</sup>.",
                    "options" => ["7", "5", "6", "8"],
                    "correct_answer" => "5"
                ],
                [
                    "question" => "Calcule a seguinte expressão: √<sup>25</sup>/<sub>16</sub> + √<sup>9</sup>/<sub>4</sub>",
                    "options" => ["7/4", "11/4", "13/4", "3"],
                    "correct_answer" => "11/4"
                ],
                [
                    "question" => "Qual é o volume de uma pirâmide com base quadrada de lado 6 cm e altura 9 cm?",
                    "options" => ["54 cm³", "72 cm³", "36 cm³", "108 cm³"],
                    "correct_answer" => "108 cm³"
                ],
                [
                    "question" => "Calcule a área da superfície de um cilindro com altura 10 cm e raio 4 cm.",
                    "options" => ["200π cm²", "120π cm²", "100π cm²", "112π cm²"],
                    "correct_answer" => "200π cm²"
                ],
                [
                    "question" => "Um cone tem um raio de 3 cm e uma altura de 9 cm. Qual é o volume do cone? (Use π ≈ 3,14)",
                    "options" => ["28,26 cm³", "84,78 cm³", "27,00 cm³", "30,00 cm³"],
                    "correct_answer" => "84,78 cm³"
                ],
                [
                    "question" => "Calcule a área da superfície de uma esfera com raio de 4 cm. (Use π ≈ 3,14)",
                    "options" => ["180,00 cm²", "190,24 cm²", "200,96 cm²", "210,00 cm²"],
                    "correct_answer" => "200,96 cm²",
                    "note" => "A fórmula para a área de uma esfera é A = 4πr²"
                ],
                [
                    "question" => "Em um triângulo retângulo, se um dos ângulos agudos mede 30°, qual é o valor do seno, cosseno e tangente desse ângulo?",
                    "options" => [
                        "½, √3/2, √3/3",
                        "√3/2, ½, 1",
                        "1, 1, 1",
                        "√2/2, 1, ½"
                    ],
                    "correct_answer" => "½, √3/2, √3/3"
                ],
                [
                    "question" => "Se a hipotenusa de um triângulo retângulo mede 10 cm e um dos catetos mede 6 cm, qual é a medida do outro cateto?",
                    "options" => ["4 cm", "8 cm", "2 cm", "10 cm"],
                    "correct_answer" => "8 cm"
                ],
                [
                    "question" => "Em um experimento de lançamento de dois dados, qual é a probabilidade de sair ambos números pares?",
                    "options" => ["¼", "⅙", "1/9", "1/36"],
                    "correct_answer" => "¼"
                ],
                [
                    "question" => "Um gráfico de barras apresenta o número de livros lidos por mês em uma biblioteca durante seis meses. Os dados estão organizados da seguinte forma:
                    <br>Janeiro: 15 livros<br>Fevereiro: 20 livros<br>Março: 30 livros<br>Abril: 25 livros<br>Maio: 18 livros<br>Junho: 22 livros.<br>
                    Qual mês teve o maior aumento no número de livros lidos em comparação ao mês anterior?",
                    "options" => ["Fevereiro", "Março", "Abril", "Junho"],
                    "correct_answer" => "Março"
                ]
            ];
            if (isset($_POST['restart_quiz'])) {
                session_unset(); // Limpa as variáveis da sessão
                $_SESSION['next_section_started'] = []; // Garante que next_section_started seja um array
                header("Location: " . $_SERVER['PHP_SELF']); // Recarrega a página para começar o quiz novamente
                exit;
            }
            
            // Inicializa o índice da sessão para o quiz
            if (!isset($_SESSION['question_index'])) {
                $_SESSION['question_index'] = 0;
            }
            
            // Garante que next_section_started seja um array ao inicializar
            if (!isset($_SESSION['next_section_started']) || !is_array($_SESSION['next_section_started'])) {
                $_SESSION['next_section_started'] = [];
            }
            
            $question_index = $_SESSION['question_index'];
            $section_breaks = [2, 4, 6, 10, 12]; // Define pontos de transição entre as partes
            $quiz_completed = $question_index >= count($questions); // Checa se o quiz terminou
            
            // Define a mensagem de transição com base na seção atual
            $show_transition_message = false;
            if (in_array($question_index, $section_breaks) && empty($_SESSION['next_section_started'][$question_index])) {
                $show_transition_message = true;
            }
            
            // Processa resposta ao enviar o formulário
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !$quiz_completed && !$show_transition_message && isset($_POST['answer'])) {
                $user_answer = $_POST['answer'];
                $current_question = $questions[$question_index];
            
                // Verifica se a resposta está correta
                if ($user_answer == $current_question["correct_answer"]) {
                    $_SESSION['question_index']++; // Avança para a próxima questão
                    header("Location: " . $_SERVER['PHP_SELF']); // Recarrega a página para próxima pergunta
                    exit;
                } else {
                    echo "<p style='color: red;'>Resposta incorreta. Tente novamente!</p>";
                }
            }
            
            // Checa se "Iniciar próximo conteúdo" foi clicado
            if (isset($_POST['start_next_section'])) {
                $_SESSION['next_section_started'][$question_index] = true; // Marca a seção como iniciada
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
            ?>

            <?php if ($quiz_completed): ?>
                    <h2>Parabéns! Você completou todo o quiz.</h2>
                    <form method="POST">
                        <button type="submit" name="restart_quiz">Reiniciar Quiz</button>
                    </form>
                    <?php elseif ($show_transition_message): ?>
                        <!-- Mensagem de transição entre as partes -->
                        <h2>Você completou a Parte <?php echo array_search($question_index, $section_breaks) + 1; ?>! Vamos para a próxima parte.</h2>
                        <form method="POST">
                            <button type="submit" name="start_next_section">Iniciar próximo conteúdo</button>
                        </form>

                    <?php else: ?>

                <?php
                    $current_question = $questions[$question_index];
                    echo "<h2>" . $current_question["question"] . "</h2>";
                ?>
                
                <form method="POST">
                    <?php foreach ($current_question["options"] as $option): ?>
                        <label>
                            <input type="radio" name="answer" value="<?php echo $option; ?>" required>
                            <?php echo $option; ?>
                        </label><br>
                    <?php endforeach; ?>
                    <button type="submit">Enviar Resposta</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
