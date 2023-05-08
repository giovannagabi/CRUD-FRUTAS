<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: listar2.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Localition: listar2.php');
    exit;
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM cliente WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: listar2.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Deletar perfil</title>
</head>
<body>
    <h1>Deletar produto</h1>
    <p>Tem certeza que deseja deletar o perfil de 
        <?php echo $appointment['nome']; ?>? </p>
    <form method="post">
        <button type="submit">Sim</button>
        <a href="listar2.php">Não</a>
</form>
</body>
</html>