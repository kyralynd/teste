<?php
// RateAt — Excluir usuário
include("../config/conexao.php");

$id = (int) $_GET["id"];

$sql  = "DELETE FROM usuario WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);

if ($stmt->execute()) {
    header("Location: listarusuario.php");
    exit;
} else {
    echo "Erro ao excluir usuário.";
}
?>
