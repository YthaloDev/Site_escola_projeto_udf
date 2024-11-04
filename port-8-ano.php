<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="port_6_ano.css">
    <title>Document</title>
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
<div class="explanation-box">
    <h3>8º Ano</h3>
    <ul>
        <li><strong>Leitura e Interpretação de Textos</strong>: Analisa crônicas e contos modernos, com ênfase na estrutura e no tom usados pelo autor para desenvolver a narrativa. A crônica, por exemplo, é geralmente curta, leve e baseada no cotidiano, enquanto o conto pode ter temas mais amplos.</li>
        <li><strong>Poemas e Textos de Opinião</strong>: Estuda formas poéticas, como o soneto, que é um poema composto por 14 versos, e ensina como estruturar textos de opinião, organizando-os com introdução, desenvolvimento e conclusão.</li>
        <li><strong>Gramática e Ortografia</strong>: Revisão das vozes verbais (ativa, passiva, reflexiva) e correção de frases comuns, como o uso adequado do verbo "fazer" para indicar tempo, reforçando a clareza e a correção gramatical.</li>
        <li><strong>Produção Textual</strong>: Destaca a importância dos conectivos (como “portanto” e “porém”) para ligar ideias e garantir coesão e fluência nos textos dissertativos.</li>
    </ul>
</div>
<div class="quiz-container">
            <h2>Quiz de Português</h2>

            <?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [
                [
                    "question" => "Quais características diferenciam uma crônica de um conto moderno?",
                    "options" => [
                        "a) Tempo de leitura.",
                        "b) Estrutura e tom.",
                        "c) Tipo de personagem.",
                        "d) Número de palavras."
                    ],
                    "correct_answer" => "b) Estrutura e tom."
                ],
                [
                    "question" => "O que é uma distopia?",
                    "options" => [
                        "a) Uma história de amor.",
                        "b) Uma obra que retrata um futuro negativo.",
                        "c) Uma biografia.",
                        "d) Uma história de aventura."
                    ],
                    "correct_answer" => "b) Uma obra que retrata um futuro negativo."
                ],
                [
                    "question" => "O que é um soneto?",
                    "options" => [
                        "a) Um poema livre.",
                        "b) Um poema com 14 versos.",
                        "c) Um texto narrativo.",
                        "d) Um tipo de crônica."
                    ],
                    "correct_answer" => "b) Um poema com 14 versos."
                ],
                [
                    "question" => "Como um texto de opinião deve ser estruturado?",
                    "options" => [
                        "a) Apenas com informações.",
                        "b) Com introdução, desenvolvimento e conclusão.",
                        "c) Somente com exemplos.",
                        "d) Sem conclusão."
                    ],
                    "correct_answer" => "b) Com introdução, desenvolvimento e conclusão."
                ],
                [
                    "question" => "Na frase 'O aluno escreveu a redação', qual é a voz verbal?",
                    "options" => [
                        "a) Ativa",
                        "b) Passiva",
                        "c) Reflexiva",
                        "d) Impessoal"
                    ],
                    "correct_answer" => "a) Ativa"
                ],
                [
                    "question" => "Corrija a frase: 'Fazem três anos que ela mora aqui.'",
                    "options" => [
                        "a) Faz três anos.",
                        "b) Fazem três anos.",
                        "c) Faz três anos.",
                        "d) Fazem três ano."
                    ],
                    "correct_answer" => "a) Faz três anos."
                ],
                [
                    "question" => "Quais elementos devem estar presentes em uma crônica?",
                    "options" => [
                        "a) Fatos reais, humor e personagens.",
                        "b) Apenas opiniões pessoais.",
                        "c) Informações científicas.",
                        "d) Ação intensa e suspense."
                    ],
                    "correct_answer" => "a) Fatos reais, humor e personagens."
                ],
                [
                    "question" => "Qual é o objetivo de um texto dissertativo?",
                    "options" => [
                        "a) Informar e convencer.",
                        "b) Contar uma história.",
                        "c) Expressar emoções.",
                        "d) Relatar um fato."
                    ],
                    "correct_answer" => "a) Informar e convencer."
                ],
                [
                    "question" => "Qual é a importância do uso de conectivos em um texto de opinião?",
                    "options" => [
                        "a) Eles não têm importância.",
                        "b) Facilitam a organização e a fluência do texto.",
                        "c) Apenas aumentam o número de palavras.",
                        "d) Tornam o texto mais difícil de entender."
                    ],
                    "correct_answer" => "b) Facilitam a organização e a fluência do texto."
                ],
                [
                    "question" => "Na frase 'As flores foram entregues ao cliente', qual é a voz verbal?",
                    "options" => [
                        "a) Ativa",
                        "b) Passiva",
                        "c) Reflexiva",
                        "d) Impessoal"
                    ],
                    "correct_answer" => "b) Passiva"
                ]
            ];            
            if (isset($_POST['restart_quiz'])) {
                session_unset();
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
        
            if (!isset($_SESSION['question_index'])) {
                $_SESSION['question_index'] = 0;
            }
        
            $question_index = $_SESSION['question_index'];
            $quiz_completed = $question_index >= count($questions);
        
            // Se o quiz estiver completo, exibe o botão de reinício
            if ($quiz_completed): ?>
                <h2>Parabéns! Você completou todo o quiz.</h2>
                <form method="POST">
                    <button type="submit" name="restart_quiz">Reiniciar Quiz</button>
                </form>
            <?php else:
                $current_question = $questions[$question_index];
                $question_text = $current_question["question"];
                $options = $current_question["options"];
                $correct_answer = $current_question["correct_answer"];
        
                // Verifica se o formulário foi enviado
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer'])) {
                    $user_answer = $_POST['answer'];
                    if ($user_answer == $correct_answer) {
                        echo "<p class='result' style='color: green;'>Resposta correta!</p>";
                        $_SESSION['question_index']++;
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
                    <button type="submit">Enviar Resposta</button>
                </form>
                <?php endif; ?>
        </div>

    </body>
</html>
</body>
</html>