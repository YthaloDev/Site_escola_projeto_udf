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
                ],
                [
                    "question" => "[Alterada] Em uma turma, há 32 alunos, dos quais ¼ são meninas. Com base nisso, qual das opções abaixo representa o número de meninos?",
                    "options" => ["8", "12", "16", "24", "20"],
                    "correct_answer" => "24"
                ],
                [
                    "question" => "Júlia comprou 3,5 metros de tecido para fazer um vestido. Cada metro de tecido custou R$ 8,90. Após a compra do tecido, ela também comprou um botão que custou R$ 2,50. Qual foi o total que Julia gastou na loja?",
                    "options" => ["R$ 29,40", "R$ 32,40", "R$ 34,40", "R$ 31,40", "R$ 33,65"],
                    "correct_answer" => "R$ 33,65"
                ],
                [
                    "question" => "Quantos minutos há em 3 horas e 15 minutos?",
                    "options" => ["195 minutos", "180 minutos", "200 minutos", "210 minutos"],
                    "correct_answer" => "195 minutos"
                ],
                [
                    "question" => "Se uma régua mede 30 cm, quantas réguas são necessárias para medir 2,4 metros?",
                    "options" => ["8", "9", "10", "11"],
                    "correct_answer" => "8"
                ],
                [
                    "question" => "Um cubo tem arestas de 4 cm. Qual é o volume desse cubo?",
                    "options" => ["16 cm³", "24 cm³", "48 cm³", "64 cm³"],
                    "correct_answer" => "64 cm³"
                ],
                [
                    "question" => "Um retângulo tem 6 cm de largura e 8 cm de comprimento. Qual é o perímetro desse retângulo?",
                    "options" => ["14 cm", "28 cm", "30 cm", "48 cm"],
                    "correct_answer" => "28 cm"
                ],
                [
                    "question" => "Um triângulo tem os seguintes lados: 6 cm, 8 cm e 10 cm. Esse triângulo é:",
                    "options" => ["Um triângulo equilátero", "Um triângulo isósceles", "Um triângulo escaleno", "Um triângulo retângulo"],
                    "correct_answer" => "Um triângulo retângulo"
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
            $section_breaks = [4, 6, 9]; // Define pontos de transição entre as partes
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
            <br>
            <h3>Frações e Decimais: Leitura, Escrita, Comparação, Operações e Transformações</h3>

            <h4>Leitura e Escrita</h4>
            <p>Frações representam uma parte de um todo e são escritas na forma <sup>a</sup>/<sub>b</sub>, onde <strong>a</strong> é o numerador e <strong>b</strong> é o denominador. Decimais, por outro lado, usam a vírgula ou ponto para indicar a parte fracionária, como 0,75 ou 0.75.</p>
            
            <h4>Comparação</h4>
            <p>Para comparar frações, é comum encontrar um denominador comum ou convertê-las em decimais. Por exemplo, ½ é maior que ⅓ porque 0,5 &gt; 0,33.</p>
            
            <h4>Operações</h4>
            <ul>
                <strong>Adição e Subtração</strong>: Para somar ou subtrair frações, é necessário um denominador comum. Exemplo: ¼ + ½ = ¼ + 2/4 = 3/4.
                <strong>Multiplicação</strong>: Multiplica-se os numeradores e os denominadores. Exemplo: 1/2 × 2/5 = 2/15.
                <strong>Divisão</strong>: Multiplica-se pela fração inversa. Exemplo: ½ ÷ ¼ = ½ × 4/1 = 2.
            </ul>
            
            <h4>Transformações</h4>
            <p>Frações podem ser convertidas em decimais (e vice-versa). Para converter uma fração em decimal, divide-se o numerador pelo denominador. Por exemplo, 3/4 = 0,75. Decimais periódicos podem ser representados como frações, como 0,333... = ⅓.</p>

            <h3>Medidas: de Tempo, Comprimento, Massa, Volume e Capacidade</h3>
    
            <h4>Tempo</h4>
            <p>O tempo é medido em unidades como segundos (s), minutos (min) e horas (h). Um dia possui 24 horas, e existem 60 minutos em uma hora e 60 segundos em um minuto.</p>
            
            <h4>Comprimento</h4>
            <p>Medidas de comprimento são usadas para determinar a extensão de um objeto ou a distância entre dois pontos. As unidades mais comuns incluem milímetros (mm), centímetros (cm), metros (m) e quilômetros (km).</p>
            
            <h4>Massa</h4>
            <p>A massa mede a quantidade de matéria em um objeto. As unidades de massa incluem gramas (g) e quilogramas (kg). A relação é: 1000 g = 1 kg.</p>
            
            <h4>Volume</h4>
            <p>O volume é a quantidade de espaço que um objeto ocupa. As unidades de volume incluem litros (L) e mililitros (mL), onde 1 L = 1000 mL. Para sólidos, o volume pode ser calculado em metros cúbicos (m³).</p>
            
            <h4>Capacidade</h4>
            <p>Capacidade refere-se à quantidade que um recipiente pode conter, frequentemente medida em litros (L) e mililitros (mL). A capacidade é essencial para o armazenamento de líquidos.</p>

            <h3>Geometria Básica: Quadrado, Retângulo, Triângulo</h3>

            <h4>1. Quadrado</h4>
            <p>O quadrado é um polígono com quatro lados iguais e ângulos retos (90 graus).</p>
            <p><strong>Perímetro:</strong> A soma de todos os lados, calculado como \( P = 4 \times L \), onde <strong>L</strong> é o comprimento do lado.</p>
            <p><strong>Área:</strong> A medida da superfície, calculada como \( A = L^2 \).</p>

            <h4>2. Retângulo</h4>
            <p>O retângulo é um polígono com quatro lados, onde os lados opostos são iguais e todos os ângulos são retos.</p>
            <p><strong>Perímetro:</strong> A soma de todos os lados, dada por \( P = 2 \times (L + w) \), onde <strong>L</strong> é o comprimento e <strong>w</strong> é a largura.</p>
            <p><strong>Área:</strong> A medida da superfície, calculada como \( A = L \times w \).</p>

            <h4>3. Triângulo</h4>
            <p>O triângulo é um polígono com três lados e pode ter diferentes formas, como equilátero (lados iguais), isósceles (dois lados iguais) e escaleno (todos os lados diferentes).</p>
            <p><strong>Perímetro:</strong> A soma dos três lados, \( P = a + b + c \), onde <strong>a</strong>, <strong>b</strong>, e <strong>c</strong> são os comprimentos dos lados.</p>
            <p><strong>Área:</strong> A medida da superfície, calculada como \( A = \frac{b \times h}{2} \), onde <strong>b</strong> é a base e <strong>h</strong> é a altura.</p>
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
