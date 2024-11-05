<?php
            session_start(); // Inicia a sessão para armazenar a questão atual

            // Array de questões
            $questions = [
                [
                    "question" => "Classifique os números -5, 0, 1/2 e √2 em seus respectivos conjuntos numéricos.",
                    "options" => [
                        "Inteiros, Racionais, Irracionais",
                        "Reais, Racionais, Irracionais",
                        "Naturais, Inteiros, Racionais",
                        "Racionais, Irracionais, Inteiros"
                    ],
                    "correct_answer" => "Reais, Racionais, Irracionais"
                ],
                [
                    "question" => "Calcule a soma de √9 + √16.",
                    "options" => ["7", "8", "5", "6"],
                    "correct_answer" => "7"
                ],
                [
                    "question" => "Resolva a equação 2x + 3 = 11.",
                    "options" => ["x = 4", "x = 5", "x = 6", "x = 3"],
                    "correct_answer" => "x = 4"
                ],
                [
                    "question" => "Resolva a inequação 3x - 5 < 10 e represente a solução na reta numérica.",
                    "options" => ["x < 5", "x < 10", "x > 5", "x > 10"],
                    "correct_answer" => "x < 5"
                ],
                [
                    "question" => "Se f(x) = 2x + 3, qual é o valor de f(4)?",
                    "options" => ["11", "10", "9", "12"],
                    "correct_answer" => "11"
                ],
                [
                    "question" => "Descreva o gráfico da função y = -x + 4.",
                    "options" => [
                        "Uma linha reta crescente",
                        "Uma linha reta decrescente",
                        "Uma parábola",
                        "Um círculo"
                    ],
                    "correct_answer" => "Uma linha reta decrescente"
                ],
                [
                    "question" => "Calcule a área de um trapézio com bases de 8 cm e 5 cm e altura de 4 cm.",
                    "options" => ["26 cm²", "30 cm²", "20 cm²", "18 cm²"],
                    "correct_answer" => "26 cm²"
                ],
                [
                    "question" => "Encontre o comprimento da hipotenusa de um triângulo retângulo cujos catetos medem 6 cm e 8 cm.",
                    "options" => ["10 cm", "12 cm", "14 cm", "15 cm"],
                    "correct_answer" => "10 cm"
                ],
                [
                    "question" => "Converta 2500 ml em litros.",
                    "options" => ["1 L", "2 L", "3 L", "2,5 L"],
                    "correct_answer" => "2,5 L"
                ],
                [
                    "question" => "Se um cilindro tem um raio de 3 cm e altura de 10 cm, calcule seu volume. (Use π ≈ 3,14)",
                    "options" => ["100,80 cm³", "282,6 cm³", "75,36 cm³", "150,8 cm³"],
                    "correct_answer" => "282,6 cm³"
                ],
                [
                    "question" => "Qual é a moda da sequência: 2, 4, 4, 5, 7, 8, 8, 8?",
                    "options" => ["4", "5", "8", "7"],
                    "correct_answer" => "8"
                ],
                [
                    "question" => "As idades dos membros de um grupo são: 15, 17, 20, 18 e 25 anos. Qual é a média das idades desse grupo?",
                    "options" => ["18 anos", "19 anos", "20 anos", "21 anos"],
                    "correct_answer" => "19 anos"
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
            <h3>Números Reais: Conjuntos Numéricos, Operações e Propriedades</h3>
        <h4>Conjuntos Numéricos</h4>
        <ul>
            <strong>Naturais (N)</strong>: Números usados para contagem, como 0, 1, 2, 3, ...
            <strong>Inteiros (Z)</strong>: Incluem todos os números naturais e seus opostos negativos, como ..., -2, -1, 0, 1, ...
            <strong>Racionais (Q)</strong>: Números que podem ser escritos como uma fração, como 1/2, 3/4, ou números inteiros expressos como fração (por exemplo, 5 = 5/1).
            <strong>Irracionais</strong>: Números que não podem ser escritos como fração, como √2 e π. Eles possuem infinitas casas decimais não periódicas.
            <strong>Reais (R)</strong>: Incluem todos os conjuntos acima: naturais, inteiros, racionais e irracionais.
        </ul>
        
        <h4>Operações</h4>
        <p>Nos conjuntos numéricos, as operações fundamentais são:</p>
        <ul>
            Adição
            Subtração
            Multiplicação
            Divisão (com exceção de divisão por zero, que é indefinida)
        </ul>
        
        <h4>Propriedades</h4>
        <ul>
            <strong>Comutativa</strong>: A ordem dos números não altera o resultado.
                <ul>
                    Exemplo: a + b = b + a e a × b = b × a
                </ul>
            
            <strong>Associativa</strong>: A maneira de agrupar os números não altera o resultado.
                <ul>
                    Exemplo: (a + b) + c = a + (b + c) e (a × b) × c = a × (b × c)
                </ul>
            
            <strong>Elemento Neutro</strong>:
                <ul>
                    Para <strong>adição</strong>, o elemento neutro é 0, pois qualquer número somado a 0 permanece o mesmo: a + 0 = a.
                    Para <strong>multiplicação</strong>, o elemento neutro é 1, pois qualquer número multiplicado por 1 permanece o mesmo: a × 1 = a.
                </ul>
        </ul>
        <h3>Números Reais: Conjuntos Numéricos, Operações e Propriedades</h3>
    <p>Conjuntos Numéricos:</p>
    <ul>
        <li><strong>Naturais (N):</strong> Números usados para contagem, como 0,1,2,3,…</li>
        <li><strong>Inteiros (Z):</strong> Incluem todos os números naturais e seus opostos negativos, como …,−2,−1,0,1,...</li>
        <li><strong>Racionais (Q):</strong> Números que podem ser escritos como uma fração</li>
        <li><strong>Reais (R):</strong> Incluem todos os conjuntos acima.</li>
    </ul>
    <p>Operações: Adição, subtração, multiplicação e divisão (exceto por zero).</p>
    <p>Propriedades:</p>
    <ul>
        <li><strong>Comutativa:</strong> a ordem não altera o resultado</li>
        <li><strong>Associativa:</strong> a forma de agrupar não altera o resultado</li>
        <li><strong>Elemento Neutro:</strong> Para a adição é o 0 (qualquer número somado a 0 permanece o mesmo) e para a multiplicação é o 1.</li>
    </ul>



    <h3>Equações do 1º Grau: Resolução de Equações e Inequações Simples</h3>
    <p>Uma equação do 1º grau é uma equação que pode ser expressa na forma <em>ax + b = 0</em>, onde <em>a</em> e <em>b</em> são números reais e <em>a ≠ 0</em>. O objetivo é encontrar o valor de <em>x</em>.</p>
    <p>Uma inequação é uma expressão que compara dois valores usando sinais de desigualdade (&gt;, &lt;, ≥, ≤).</p>


    <h3>Funções: Conceito de Função</h3>
    <p>Uma função é uma relação entre dois conjuntos, onde cada elemento do primeiro conjunto (domínio) está associado a exatamente um elemento do segundo conjunto (contradomínio).</p>
    <p>É frequentemente representada como <em>f(x)</em>, onde <em>x</em> é a variável independente e <em>f(x)</em> é a variável dependente. Funções do 1º grau têm a forma geral <em>f(x) = ax + b</em>, onde <em>a</em> e <em>b</em> são constantes, e <em>a ≠ 0</em>.</p>


    <h3>Geometria Plana: Teorema de Pitágoras, Propriedades de Triângulos, Polígonos e Circunferências</h3>
    <p><strong>Teorema de Pitágoras:</strong> Aplica-se a triângulos retângulos, afirmando que o quadrado da hipotenusa é igual à soma dos quadrados dos catetos.</p>
    <p><strong>Propriedades de Triângulos:</strong></p>
    <ul>
        <li>Equilátero: Todos os lados e ângulos iguais.</li>
        <li>Isósceles: Dois lados iguais.</li>
        <li>Escaleno: Todos os lados diferentes.</li>
    </ul>


    <h3>Sistemas de Medidas: Conversões entre Unidades de Medida, Cálculo de Áreas e Volumes</h3>
    <p><strong>Comprimento:</strong> Conversão entre unidades como metros, centímetros e milímetros. Exemplo: 1 m = 100 cm = 1000 mm.</p>
    <p><strong>Massa:</strong> Conversão entre quilogramas, gramas e miligramas. Exemplo: 1 kg = 1000 g.</p>
    <p><strong>Volume:</strong> Conversão entre litros, mililitros e metros cúbicos. Exemplo: 1 L = 1000 mL.</p>


    <h3>Estatística: Medidas de Tendência Central (Média, Mediana e Moda)</h3>
    <p><strong>Média:</strong> Soma dos valores dividida pelo número de elementos.</p>
    <p><strong>Mediana:</strong> Valor que divide um conjunto de dados ordenados em duas partes iguais.</p>
    <p><strong>Moda:</strong> Valor que aparece com mais frequência em um conjunto de dados.</p>
        </div>
        <div class="quiz-container">
            <h2>Quiz de Matemática</h2>

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
