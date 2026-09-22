<?php
include("../config/conexao.php");

$nome      = trim($_POST["nome"] ?? "");
$cep       = trim($_POST["cep"] ?? "");
$bairro    = trim($_POST["bairro"] ?? "");
$rua       = trim($_POST["rua"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$preco     = trim($_POST["preco"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");

if ($nome === "" || $cep === "" || $bairro === "" || $rua === "" || $categoria === "" || $preco === "") {
    exit("Preencha todos os campos obrigatórios. <a href=\"novorestaurante.php\">Voltar</a>");
}

$sql = "INSERT INTO restaurante (nome, cep, bairro, rua, categoria, preco, descricao)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    exit("Erro ao preparar o cadastro: " . htmlspecialchars(mysqli_error($conn)));
}

mysqli_stmt_bind_param($stmt, "sssssss", $nome, $cep, $bairro, $rua, $categoria, $preco, $descricao);

if (mysqli_stmt_execute($stmt)) {
    header("Location: listarrestaurante.php");
    exit();
}

echo "Erro ao cadastrar restaurante: " . htmlspecialchars(mysqli_stmt_error($stmt));
?>
