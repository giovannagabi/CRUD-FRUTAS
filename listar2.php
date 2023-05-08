<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="estilo.css">
    <title>Clientes</title>
</head>
<body>
<div class="container">
    <h1>Clientes</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM cliente ORDER BY data');
    $clientes = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($clientes)==0) {
        echo '<p>Nenhum cadastro agendado.</p>';
}else{
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Data</th><th>Horário</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($clientes as $cliente) {
        echo '<tr>';
        echo '<td>' . $cliente['nome'] . '</td>';
        echo '<td>' . $cliente['email'] . '</td>';
        echo '<td>' . $cliente['telefone'] . '</td>';
        echo '<td>' . date('d/m/y',strtotime($cliente['data'])) . '</td>';
        echo '<td><a style="color:black;" href="atualizar2.php?id=' .
        $cliente['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar2.php?id=' .
        $cliente['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>   </div> 
</body>
</html>