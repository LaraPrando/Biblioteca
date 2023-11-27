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
            <li><a href="adm.php">Adm</a></li>
            <li><a href="treinador.php">Treinador</a></li>
        </lu>
    </div>

<div class="container"> 

<h1>Sala de Reunião</h1> 

<?php 

if (isset($_POST['submit'])) { 

    $titulo = $_POST['titulo']; 

    $autor = $_POST['autor']; 

    $genero = $_POST['genero']; 

    $quantidade = $_POST['quantidade'];

    
$stmt = $pdo->prepare('SELECT COUNT(*) FROM livros WHERE titulo = ?'); 

$stmt->execute ([$titulo]); 

$count = $stmt->fetchColumn(); 




if ($count > 0){ 

    $error = 'Esse livro ja esta cadastrado!.'; 

} else { 




    $stmt = $pdo->prepare('INSERT INTO livros (titulo, autor, genero, quantidade) VALUES(:titulo, :autor, :genero, :quantidade)'); 

    $stmt->execute(['titulo'=>$titulo, 'autor'=>$autor, 'genero'=>$genero, 'quantidade'=>$quantidade]); 

    if ($stmt->rowCount()) { 

        echo '<span>Livro cadastrado com sucesso!</span>'; 

    } else { 

        echo '<span>Erro ao cadastrar o livro. Tente novamente mais tarde.</span>'; 

    } 

} 

if (isset($error)) { 

    echo '<span>'.$error.'</span>'; 

} 

} 

?> 




<form method="post"> 




<label for="titulo">Titulo:</label> 

<input type="text" name="titulo" required><br> 




<label for="autor">Autor:</label> 

<input type="text" name="autor" required><br> 




<label for="genero">Genero:</label> 

<input type="text" name="genero" required><br> 




<label for="quantidade">Quantidade:</label> 

<input type="text" name="quantidade" required><br>  
 




<div> 

    <button type="submit" name="submit" value="agendar">Agendar</button> 

    <button><a href="views/adm/listar.php">Listar</a></button> 

</div> 

</div>

<div class = "rodape"> 

</div> 
       
        <?php
$titulo = "uploadde imagens";
if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"]))
{
    move_uploaded_file($_FILES["imagem"]["tmp_name"], "./img/".$_FILES["imagem"]["name"]);
    echo "update realizado com sucesso";
}
?>

<div class="row">

<div class="col-md-4">
    <form action="uploads.php" method="post" enctype="multipart/form-data">
        <label>Selecione a imagem</label>
        <input type="file" name="imagem" accept="image/*" class="form-control" />
        <button type="submit" class="btn btn-success">
            Enviar imagem
        </button>

    </form>
</div>
 </section>
</div>

<?php
   $imagem = "./img/".$_FILES["imagem"]["name"];
   move_uploaded_file($_FILES["imagem"]["tmp_name"] ,$imagem ); 
?>
       

        

<footer>
    <div class="parte1"></div>
            <div class="parte2"></div>
            <div class="parte3"></div>
        </footer>

    </div>
</body>
</html>