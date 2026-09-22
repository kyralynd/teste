<?php
// RateAt — Excluir restaurante
include("../config/conexao.php");

$id = (int) $_GET["id"];

$sql  = "DELETE FROM restaurante WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: listarrestaurante.php");
    exit;
} else {
    echo "Erro ao excluir restaurante: " . htmlspecialchars(mysqli_stmt_error($stmt));
}
?>
