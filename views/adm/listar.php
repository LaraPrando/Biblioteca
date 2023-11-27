<?php include '../../config.php'; ?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css"> 
    <title>Reuniões</title> 
</head> 
<body class="listar"> 
<div class="principal">
        <header>
             <section class="logo">
       <div class="item-id"><img src="imgtf/logo reuniao.png" height="100px" weight="10px"></div>
    </section>
   
      
    <section class="titulo">
        <p>Sala de Reunião</p>
</section>
        </header>
        <section class="fundo">
        <div id="menu">
    </div>
    <section class= "img2">
    <div class="item-id"><img src="" height="300px" weight="10px"></div>
    </section>

            <div class="container_listar"> 
            <h1>Agenda de Reuniões</h1>
            <?php 
$stmt = $pdo->query('SELECT * FROM usuario ORDER by email, telefone'); 
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); 
if (count($usuarios) == 0) { 
    echo '<p>Nenhum usuario registrado.</p>'; 
} else { 
    echo '<table border="1">'; 
    echo '<thead><tr><th>Nome</th><th>idade</th><th>sexo</th><th>email</th><th>telefone</th><th>endereço</th><th colspan 
    ="2">Opções</th></tr></thead>'; 
    echo '<tbody>'; 


    foreach ($usuarios as $usuario) { 
        echo '<tr>'; 
        echo '<td>' . $usuario ['nome'] . '</td>'; 
        echo '<td>' . $usuario['idade'] . '</td>'; 
        echo '<td>' . $usuario['sexo'] . '</td>'; 
        echo '<td>' . $usuario['email'] . '</td>'; 
        echo '<td>' . $usuario['telefone'] . '</td>'; 
        echo '<td>' . $usuario['endereco'] . '</td>'; 
        echo '</tr>'; 
    } 

    echo '</tbody>'; 
    echo '</table>'; 
} 
?> 

 
 



<div class = "rodape"> 

</div> 
</section>

<footer>
            
        </footer>
        </div>


</form>
</body>
</html>