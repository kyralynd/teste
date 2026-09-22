<?php
// RateAt — Atualizar restaurante
include("../config/conexao.php");

$id        = (int) ($_POST["id"] ?? 0);
$nome      = trim($_POST["nome"] ?? "");
$cep       = trim($_POST["cep"] ?? "");
$bairro    = trim($_POST["bairro"] ?? "");
$rua       = trim($_POST["rua"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$preco     = trim($_POST["preco"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");

$sql = "UPDATE restaurante SET
        nome = ?, cep = ?, bairro = ?, rua = ?,
        categoria = ?, preco = ?, descricao = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssssssi", $nome, $cep, $bairro, $rua, $categoria, $preco, $descricao, $id);

if (!mysqli_stmt_execute($stmt)) {
    exit("Erro ao atualizar restaurante: " . htmlspecialchars(mysqli_stmt_error($stmt)));
}

header("Location: listarrestaurante.php");
exit;
?>
