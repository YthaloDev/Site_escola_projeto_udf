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
    <h3>7º Ano</h3>
    <ul>
        <li><strong>Leitura e Interpretação de Textos</strong>: Enfatiza a diferença entre gêneros literários, como histórias em quadrinhos e reportagens. Os alunos aprendem a identificar as características de cada gênero, como o uso de diálogos e imagens nas HQs, ou a objetividade e a verificação de fatos nas reportagens.</li>
        <li><strong>Gramática e Ortografia</strong>: Consolida o uso correto de advérbios, que descrevem ações (como "rapidamente"), e o emprego adequado de preposições para construir frases claras e coerentes.</li>
        <li><strong>Verbos e Tempos</strong>: Trabalha a conjugação correta de verbos em diferentes tempos, como presente, passado e futuro, ajudando os alunos a expressar eventos de maneira precisa.</li>
        <li><strong>Produção Textual</strong>: Foca na estrutura de cartas, crônicas e narrativas, destacando a importância dos diálogos para desenvolver personagens e enriquecer a história.</li>
    </ul>
</div>
<div class="quiz-container">
            <h2>Quiz de Português</h2>

            <?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [
                [
                    "question" => "O que diferencia as histórias em quadrinhos de outros gêneros literários?",
                    "options" => [
                        "a) Apenas desenhos.",
                        "b) Diálogos e ilustrações combinados.",
                        "c) Apenas texto.",
                        "d) História longa."
                    ],
                    "correct_answer" => "b) Diálogos e ilustrações combinados."
                ],
                [
                    "question" => "Quais são as principais características de uma reportagem?",
                    "options" => [
                        "a) Subjetividade e pouca informação.",
                        "b) Objetividade e apuração de fatos.",
                        "c) Texto poético.",
                        "d) Diálogos."
                    ],
                    "correct_answer" => "b) Objetividade e apuração de fatos."
                ],
                [
                    "question" => "Na frase 'Ele corre rapidamente para casa', qual é o advérbio?",
                    "options" => [
                        "a) corre",
                        "b) rapidamente",
                        "c) para",
                        "d) casa"
                    ],
                    "correct_answer" => "b) rapidamente"
                ],
                [
                    "question" => "Qual frase usa corretamente uma preposição?",
                    "options" => [
                        "a) Ele foi para a escola.",
                        "b) Ele vai escola.",
                        "c) Ele na escola.",
                        "d) Ele a escola."
                    ],
                    "correct_answer" => "a) Ele foi para a escola."
                ],
                [
                    "question" => "Transforme a frase 'Ela cantou' para o presente:",
                    "options" => [
                        "a) Ela canta.",
                        "b) Ela cantou.",
                        "c) Ela cantará.",
                        "d) Ela cantava."
                    ],
                    "correct_answer" => "a) Ela canta."
                ],
                [
                    "question" => "Qual é um exemplo de uma frase no futuro?",
                    "options" => [
                        "a) Eu estudei.",
                        "b) Eu estudarei.",
                        "c) Eu estudo.",
                        "d) Eu estudava."
                    ],
                    "correct_answer" => "b) Eu estudarei."
                ],
                [
                    "question" => "Quais são as partes principais de uma carta?",
                    "options" => [
                        "a) Nome, data, saudação, corpo, despedida.",
                        "b) Apenas data e assinatura.",
                        "c) Título e imagem.",
                        "d) Apenas o corpo."
                    ],
                    "correct_answer" => "a) Nome, data, saudação, corpo, despedida."
                ],
                [
                    "question" => "Qual a importância de diálogos em uma narrativa?",
                    "options" => [
                        "a) Tornam a leitura mais difícil.",
                        "b) Ajudam a desenvolver os personagens e a trama.",
                        "c) Não têm importância.",
                        "d) Aumentam o número de páginas."
                    ],
                    "correct_answer" => "b) Ajudam a desenvolver os personagens e a trama."
                ],
                [
                    "question" => "Qual é a função de uma introdução em uma reportagem?",
                    "options" => [
                        "a) Apresentar o tema e chamar a atenção do leitor.",
                        "b) Descrever os personagens.",
                        "c) Apresentar a conclusão.",
                        "d) Fornecer dados estatísticos."
                    ],
                    "correct_answer" => "a) Apresentar o tema e chamar a atenção do leitor."
                ],
                [
                    "question" => "Qual é a diferença entre uma crônica e uma notícia?",
                    "options" => [
                        "a) A crônica é mais subjetiva, enquanto a notícia é objetiva.",
                        "b) A crônica é mais longa.",
                        "c) A notícia tem mais imagens.",
                        "d) Não há diferença."
                    ],
                    "correct_answer" => "a) A crônica é mais subjetiva, enquanto a notícia é objetiva."
                ],
                [
                    "question" => "Identifique o advérbio na frase: 'Ela estudou muito para a prova.'",
                    "options" => [
                        "a) estudou",
                        "b) muito",
                        "c) para",
                        "d) prova"
                    ],
                    "correct_answer" => "b) muito"
                ],
                [
                    "question" => "Na frase 'Ele foi à escola de bicicleta', qual a preposição correta?",
                    "options" => [
                        "a) a",
                        "b) de",
                        "c) para",
                        "d) em"
                    ],
                    "correct_answer" => "a) a"
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