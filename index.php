<?php 
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro do Cliente</h1>
        <?php 
        if (isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $data = $_POST['data'];
            
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM cliente WHERE data = ?');
            $stmt->execute([$data]);
            $count = $stmt->fetchColumn();
            
            if ($count > 0){
                $error = 'Esse cliente já existe.';}
            else{
                $stmt = $pdo->prepare('INSERT INTO cliente (nome, email, telefone, data)
                VALUES ( :nome, :email, :telefone, :data)');
                $stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone,
                'data' => $data]);

                if ($stmt->rowCount()){
                    echo '<span>Nice!</span>';
                }else{
                    echo '<span>Erro fi</span>';
                }

            }

            if (isset($error)) {
                echo '<span>' . $error . '</span>';
            }
        }
?>

<form method="post">

<label for="nome">Nome:</label><br>
<input type="text" name="nome" required><br>

<label for="email">E-mail:</label><br>
<input type="email" name="email" required><br>

<label for="telefone">Telefone:</label><br>
<input type="text" name="telefone" maxlenght="11" required><br>

<label for="data">Data:</label><br>
<input type="date" name="data" required><br><br>

    <div>

    <button type="submit" name="submit" value="enviar">Enviar</button>
    <button><a href="listar2.php">Listar</a></button>
    <button><a href="produto.php">Produtinho</a></button>
    </div>

    </form>
</body>
</html>