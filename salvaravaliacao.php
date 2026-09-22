<?php
include("../config/conexao.php");

session_start();

if (!isset($_SESSION["nome_usuario"])) {
	header("Location: ../login.html");
	exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	header("Location: ../avaliar.html");
	exit();
}

$nota = filter_input(INPUT_POST, "nota", FILTER_VALIDATE_INT);
$comentario = trim($_POST["comentario"] ?? "");
$nome_restaurante = trim($_POST["nome_restaurante"] ?? "");
$nome_usuario = $_SESSION["nome_usuario"];

if ($nota === false || $nota < 1 || $nota > 5 || $comentario === "" || $nome_restaurante === "") {
	exit("Dados da avaliação inválidos. <a href=\"../avaliar.html\">Voltar</a>");
}

$result_usua = "INSERT INTO avaliacao(nota, comentario, nome_usuario, nome_restaurante)
VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $result_usua);

if (!$stmt) {
	exit("Erro ao preparar o cadastro da avaliação: " . htmlspecialchars(mysqli_error($conn)));
}

mysqli_stmt_bind_param($stmt, "isss", $nota, $comentario, $nome_usuario, $nome_restaurante);

$resultado_usua = mysqli_stmt_execute($stmt);

if($resultado_usua){

header("Location: listaravaliacao.php");
exit();
    
} else {
echo "Erro ao cadastrar a avaliação: " . htmlspecialchars(mysqli_stmt_error($stmt));
}

?>
