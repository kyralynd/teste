<?php
// RateAt — Atualizar usuário
include("../config/conexao.php");

$id    = (int) $_POST["id"];
$nome  = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":nome",  $nome);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":senha", $senha);
$stmt->bindParam(":id",    $id);
$stmt->execute();

header("Location: listarusuario.php");
exit;
?>
