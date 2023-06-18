<?php

include 'conexao.php';

$pag = $_POST['page'];

$pag = ($pag * 5) - 5;

$sql = "SELECT * FROM fornecedores LIMIT $pag, 5";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// json_encode() returns the JSON representation of a value
echo json_encode($dados);

?>





