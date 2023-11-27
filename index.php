<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteca</title>
</head>
<body>
<div id="menu">
        <lu>
            <li><a href="index.php">index</a></li>
            <li><a href="adm.php">adm</a></li>
            <li><a href="treinador.php">Treinador</a></li>
        </lu>
    </div>

<div class="container"> 

<h1>Sala de Reunião</h1> 

<?php 

if (isset($_POST['submit'])) { 

    $nome = $_POST['nome']; 

    $idade = $_POST['idade']; 

    $sexo = $_POST['sexo']; 

    $email = $_POST['email'];

    $telefone = $_POST['telefone']; 

    $endereco = $_POST['endereco']; 

    
$stmt = $pdo->prepare('SELECT COUNT(*) FROM usuario WHERE email = ?'); 

$stmt->execute ([$email]); 

$count = $stmt->fetchColumn(); 




if ($count > 0){ 

    $error = 'ja existe um cadastro com esse email.'; 

} else { 




    $stmt = $pdo->prepare('INSERT INTO usuario (nome, idade, sexo, email, telefone, endereco) VALUES(:nome, :idade, :sexo, :email, :telefone, :endereco)'); 

    $stmt->execute(['nome'=>$nome, 'idade'=>$idade, 'sexo'=>$sexo, 'email'=>$email, 'telefone'=>$telefone, 'endereco'=>$endereco]); 

    if ($stmt->rowCount()) { 

        echo '<span>Cadastro realizado com sucesso!</span>'; 

    } else { 

        echo '<span>Erro ao finalizar o cadastro. Tente novamente mais tarde.</span>'; 

    } 

} 

if (isset($error)) { 

    echo '<span>'.$error.'</span>'; 

} 

} 

?> 




<form method="post"> 




<label for="nome">Nome:</label> 

<input type="text" name="nome" required><br> 




<label for="idade">Idade:</label> 

<input type="text" name="idade" required><br> 




<label for="sexo">Sexo:</label> 

<input type="text" name="sexo" required><br> 




<label for="email">E-mail:</label> 

<input type="email" name="email" required><br> 




<label for="telefone">Telefone:</label> 

<input type="text" name="telefone" maxlength="11" required><br> 




<label for="endereco">Endereço:</label> 

<input type="text" name="endereco" required><br> 
 




<div> 

    <button type="submit" name="submit" value="agendar">Agendar</button> 

    <button><a href="views/adm/listar.php">Listar</a></button> 

</div> 

</div>

<div class = "rodape"> 

</div> 
        </section>
       

        

<footer>
    <div class="parte1"></div>
            <div class="parte2"></div>
            <div class="parte3"></div>
        </footer>

    </div>
</body>
</html>