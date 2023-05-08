<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="estilo.css">
    <title>Venda de Frutas</title>
</head>
<body class="listar">
    <h1>Venda de Frutas</h1>

    <?php
    $stmt = $pdo->query('SELECT * FROM produtos ORDER BY nome, quantidade');
    $produtos = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($produtos)==0) {
        echo '<p>Nenhum produto comprado.</p>';
}else{
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Tamanho</th><th>Peso</th><th>Quantidade</th><th>Preço</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($produtos as $produto) {
        echo '<tr>';
        echo '<td>' . $produto['nome'] . '</td>';
        echo '<td>' . $produto['tamanho'] . '</td>';
        echo '<td>' . $produto['peso'] . '</td>';
        echo '<td>' . $produto['quantidade'] . '</td>';
        echo '<td>' . $produto['preco'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' .
        $produto['id'] . '">Atualizar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' .
        $produto['id'] . '">Deletar</a></td>';
        

    }

    echo '</tbody>';
    echo '</table>';
    }
?>    
</body>
</html>




