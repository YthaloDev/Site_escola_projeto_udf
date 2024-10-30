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
                <h3>Números Racionais: operações com frações e números decimais, comparação e ordenação.</h3>
                <p>
                    <strong>Definição:</strong> Números racionais são aqueles que podem ser expressos na forma de fração <em>a/b</em>, onde <em>a</em> e <em>b</em> são inteiros e <em>b ≠ 0</em>. Eles incluem números inteiros, frações e decimais (finitos ou periódicos).
                </p>
                <p>
                    <strong>Operações:</strong>
                    <ul>
                        Adição e Subtração: Em frações, é necessário um denominador comum. Em decimais, basta alinhar as casas decimais.
                        Multiplicação: Multiplica-se numeradores e denominadores em frações, ou realiza-se a multiplicação direta em decimais.
                        Divisão: Em frações, multiplica-se pelo inverso da segunda fração. Em decimais, move-se a vírgula para transformar o divisor em um número inteiro.
                    </ul>
                </p>
                <p>
                    <strong>Comparação e Ordenação:</strong>
                    <ul>
                        Frações: Convertem-se para o mesmo denominador ou para decimais.
                        Decimais: Comparam-se as casas decimais, alinhando as vírgulas.
                    </ul>
                </p>
            </div>
        <div class="quiz-container">
            <h2>Quiz de Matemática</h2>

            <?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [        
                [
                    "question" => "Calcule 3/4 - 1/2.",
                    "options" => ["¼", "½", "2/4", "1/8"],
                    "correct_answer" => "¼"
                ],
                [
                    "question" => "Compare os números 0,75 e 3/4 e explique a comparação.",
                    "options" => ["0,75 é maior que ¾", "0,75 é igual a ¾", "0,75 é menor que ¾", "Não é possível comparar"],
                    "correct_answer" => "0,75 é igual a ¾"
                ],
                [
                    "question" => "Em uma receita de bolo, são necessários 200 gramas de açúcar para 1,5 kg de farinha. Se você quiser fazer a receita com 3 kg de farinha, quantos gramas de açúcar serão necessários?",
                    "options" => ["300 g", "400 g", "500 g", "600 g"],
                    "correct_answer" => "400 g"
                ],
                [
                    "question" => "Em uma classe, 60% dos alunos são meninas. Se há 30 alunos, quantas meninas há?",
                    "options" => ["15", "18", "20", "12"],
                    "correct_answer" => "18"
                ],
                [
                    "question" => "Calcule 3^4 e √64.",
                    "options" => ["81 e 8", "81 e 6", "27 e 8", "81 e 7"],
                    "correct_answer" => "81 e 8"
                ],
                [
                    "question" => "Qual é o resultado de 25 ÷ 4^2?",
                    "options" => ["1", "2", "4", "8"],
                    "correct_answer" => "2"
                ],
                [
                    "question" => "Simplifique a expressão 3x + 5x - 2.",
                    "options" => ["8x - 2", "8x", "5x - 2", "3x - 2"],
                    "correct_answer" => "8x - 2"
                ],
                [
                    "question" => "Se y = 2, qual é o valor da expressão 3y² + 4y - 5?",
                    "options" => ["5", "3", "7", "9"],
                    "correct_answer" => "9"
                ],
                [
                    "question" => "Qual a soma dos ângulos internos de um triângulo?",
                    "options" => ["180°", "90°", "360°", "270°"],
                    "correct_answer" => "180°"
                ],
                [
                    "question" => "Se um círculo tem um raio de 4 cm, qual é sua circunferência? (Use π ≈ 3,14)",
                    "options" => ["12,56 cm", "25,12 cm", "15,72 cm", "18,84 cm"],
                    "correct_answer" => "25,12 cm"
                ],
                [
                    "question" => "Calcule a média aritmética dos números: 5, 10, 15 e 20.",
                    "options" => ["10", "12,5", "15", "17,5"],
                    "correct_answer" => "12,5"
                ],
                [
                    "question" => "Se uma moeda é lançada, qual é a probabilidade de sair cara?",
                    "options" => ["¼", "½", "⅓", "⅕"],
                    "correct_answer" => "½"
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
            $section_breaks = [2, 4, 6, 8, 10]; // Define pontos de transição entre as partes
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
