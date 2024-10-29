
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Página de Cadastro</title>
</head>
        
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

    <div class="form-container">
        <h2>Cadastro</h2>
        <form action="register.php" method="POST">
            <label for="name">Nome Completo</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    echo "<h3>Cadastro realizado com sucesso!</h3>";
    echo "Nome: " . htmlspecialchars($name) . "<br>";
    echo "E-mail: " . htmlspecialchars($email) . "<br>"; 
    echo "Senha: " . htmlspecialchars($password) . "<br>";
}
?>


</body>
</html>
