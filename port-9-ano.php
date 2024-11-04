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
<h3>9º Ano</h3>
    <ul>
        <li><strong>Leitura e Interpretação de Textos</strong>: Diferencia entre reportagens e artigos de opinião, enfatizando que a reportagem é objetiva e visa informar, enquanto o artigo de opinião é subjetivo e visa argumentar e convencer o leitor.</li>
        <li><strong>Gramática e Ortografia</strong>: Enfatiza a identificação de termos acessórios, que são informações complementares em uma frase, e a função referencial da linguagem, que é usada para informar de maneira clara e objetiva.</li>
        <li><strong>Produção Textual</strong>: Foca na criação de textos dissertativo-argumentativos, que exigem uma estrutura bem definida (introdução, desenvolvimento, conclusão) e o uso de estratégias, como dados e exemplos, para fortalecer os argumentos.</li>
    </ul>
</div>
<div class="quiz-container">
            <h2>Quiz de Português</h2>

            <?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [
                [
                    "question" => "Qual é a moral da fábula 'A cigarra e a formiga'?",
                    "options" => ["Trabalhar é sempre ruim", "A importância da diversão", "A importância do trabalho e da preparação para o futuro", "É melhor ser desleixado"],
                    "correct_answer" => "A importância do trabalho e da preparação para o futuro"
                ],
                [
                    "question" => "O que são parlendas?",
                    "options" => [
                        "a) Poemas curtos que rimam.",
                        "b) Histórias de mistério.",
                        "c) Rimas infantis que ajudam a desenvolver a linguagem.",
                        "d) Crônicas engraçadas."
                    ],
                    "correct_answer" => "c) Rimas infantis que ajudam a desenvolver a linguagem."
                ],
                [
                    "question" => "Transforme a frase 'O sol brilha' em uma frase negativa:",
                    "options" => [
                        "a) O sol não brilha.",
                        "b) O sol brilhará.",
                        "c) O sol brilha mais.",
                        "d) O sol brilhava."
                    ],
                    "correct_answer" => "a) O sol não brilha."
                ],
                [
                    "question" => "Complete a frase com a pontuação correta: 'Você gosta de ler __'",
                    "options" => [
                        "a) !",
                        "b) ?",
                        "c) .",
                        "d) ,"
                    ],
                    "correct_answer" => "b) ?"
                ],
                [
                    "question" => "Na frase 'O cachorro grande corre rápido pelo parque', qual é o substantivo?",
                    "options" => [
                        "a) grande",
                        "b) corre",
                        "c) cachorro",
                        "d) rápido"
                    ],
                    "correct_answer" => "c) cachorro"
                ],
                [
                    "question" => "Qual é um exemplo de verbo no passado?",
                    "options" => [
                        "a) Correr",
                        "b) Come",
                        "c) Cantou",
                        "d) Canta"
                    ],
                    "correct_answer" => "c) Cantou"
                ],
                [
                    "question" => "O que é essencial incluir em um resumo?",
                    "options" => [
                        "a) Opiniões pessoais",
                        "b) Todos os detalhes",
                        "c) Os pontos principais do texto",
                        "d) Palavras difíceis"
                    ],
                    "correct_answer" => "c) Os pontos principais do texto"
                ],
                [
                    "question" => "O que caracteriza um reconto?",
                    "options" => [
                        "a) Mudança do tema original",
                        "b) Repetição exata do texto",
                        "c) Uso de elementos visuais",
                        "d) Mudança do final"
                    ],
                    "correct_answer" => "d) Mudança do final"
                ],
                [
                    "question" => "Qual é a principal lição da fábula 'A Raposa e as Uvas'?",
                    "options" => [
                        "a) Não devemos nos preocupar com as opiniões dos outros.",
                        "b) É melhor não querer o que não podemos ter.",
                        "c) A importância da perseverança.",
                        "d) A sabedoria das raposas."
                    ],
                    "correct_answer" => "b) É melhor não querer o que não podemos ter."
                ],
                [
                    "question" => "O que caracteriza uma parlenda?",
                    "options" => [
                        "a) Seu tom sério.",
                        "b) O uso de rimas e repetição.",
                        "c) A longa narrativa.",
                        "d) A falta de ritmo."
                    ],
                    "correct_answer" => "b) O uso de rimas e repetição."
                ],
                [
                    "question" => "Transforme a frase 'A lua brilha' em uma frase negativa:",
                    "options" => [
                        "a) A lua não brilha.",
                        "b) A lua brilhava.",
                        "c) A lua brilhará.",
                        "d) A lua brilha mais."
                    ],
                    "correct_answer" => "a) A lua não brilha."
                ],
                [
                    "question" => "Complete a frase com a pontuação correta: 'Você vai à festa __'",
                    "options" => [
                        "a) !",
                        "b) ?",
                        "c) .",
                        "d) ,"
                    ],
                    "correct_answer" => "b) ?"
                ], 
    
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