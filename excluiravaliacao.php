<?php

include("../config/conexao.php");

$id = (int) $_GET["id"];

$sql  = "DELETE FROM avaliacao WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: listaravaliacao.php");
    exit;
} else {
    echo "Erro ao excluir avaliação.";
}
?>
