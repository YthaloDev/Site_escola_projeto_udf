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
                    "question" => "Qual a diferença entre uma reportagem e um artigo de opinião?",
                    "options" => [
                        "a) A forma de escrita.",
                        "b) A intenção e a estrutura.",
                        "c) A quantidade de páginas.",
                        "d) A presença de diálogos."
                    ],
                    "correct_answer" => "b) A intenção e a estrutura."
                ],
                [
                    "question" => "Quais são as partes fundamentais de um texto dissertativo-argumentativo?",
                    "options" => [
                        "a) Título, introdução, desenvolvimento e conclusão.",
                        "b) Apenas título e conclusão.",
                        "c) Introdução e personagens.",
                        "d) Somente desenvolvimento."
                    ],
                    "correct_answer" => "a) Título, introdução, desenvolvimento e conclusão."
                ],
                [
                    "question" => "O que é a função referencial da linguagem?",
                    "options" => [
                        "a) Expressar emoções.",
                        "b) Informar e descrever realidades.",
                        "c) Criar poesia.",
                        "d) Fazer perguntas."
                    ],
                    "correct_answer" => "b) Informar e descrever realidades."
                ],
                [
                    "question" => "Na frase 'A menina comprou flores para a professora', qual é o termo acessório?",
                    "options" => [
                        "a) menina",
                        "b) comprou",
                        "c) flores",
                        "d) para a professora"
                    ],
                    "correct_answer" => "d) para a professora"
                ],
                [
                    "question" => "Quais são as estratégias que você pode usar para fortalecer seus argumentos em um texto dissertativo?",
                    "options" => [
                        "a) Usar opiniões pessoais.",
                        "b) Apresentar dados e exemplos.",
                        "c) Fazer suposições.",
                        "d) Ignorar contra-argumentos."
                    ],
                    "correct_answer" => "b) Apresentar dados e exemplos."
                ],
                [
                    "question" => "O que deve ser considerado ao escrever uma resenha crítica?",
                    "options" => [
                        "a) Apenas a sua opinião.",
                        "b) Estrutura, enredo, personagens e estilo.",
                        "c) Somente o tema.",
                        "d) A quantidade de palavras."
                    ],
                    "correct_answer" => "b) Estrutura, enredo, personagens e estilo."
                ],
                [
                    "question" => "Quais são as características de um bom argumento?",
                    "options" => [
                        "a) Subjetividade e emoção.",
                        "b) Clareza, relevância e evidências.",
                        "c) Dificuldade na compreensão.",
                        "d) Uso de jargão técnico."
                    ],
                    "correct_answer" => "b) Clareza, relevância e evidências."
                ],
                [
                    "question" => "Qual é a função de uma conclusão em um texto dissertativo?",
                    "options" => [
                        "a) Repetir a introdução.",
                        "b) Apresentar novas informações.",
                        "c) Resumir e reforçar a tese principal.",
                        "d) Mudar o assunto."
                    ],
                    "correct_answer" => "c) Resumir e reforçar a tese principal."
                ],
                [
                    "question" => "Na frase 'A aluna entregou a tarefa para o professor', qual é o termo acessório?",
                    "options" => [
                        "a) A aluna",
                        "b) entregou",
                        "c) a tarefa",
                        "d) para o professor"
                    ],
                    "correct_answer" => "d) para o professor"
                ],
                [
                    "question" => "O que caracteriza a função referencial da linguagem?",
                    "options" => [
                        "a) A expressividade do autor.",
                        "b) A clareza na comunicação de informações.",
                        "c) O uso de metáforas.",
                        "d) A presença de personagens."
                    ],
                    "correct_answer" => "b) A clareza na comunicação de informações."
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