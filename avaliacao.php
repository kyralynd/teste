<?php
// RateAt — Atualizar avaliação
include("../config/conexao.php");

$id         = (int) $_POST["id"];
$nota       = (int) $_POST["nota"];
$comentario = $_POST["comentario"];

$sql = "UPDATE avaliacao SET nota = ?, comentario = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isi", $nota, $comentario, $id);
mysqli_stmt_execute($stmt);

header("Location: listaravaliacao.php");
exit;
?>
