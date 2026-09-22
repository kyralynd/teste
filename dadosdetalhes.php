<?php
include("../config/conexao.php");

header("Content-Type: application/json; charset=utf-8");

$nome = trim($_GET["nome"] ?? "");
$sql = "SELECT r.id, r.nome, r.categoria, r.preco, r.cep, r.bairro, r.rua,
               r.descricao, ROUND(AVG(a.nota), 1) AS nota_media,
               COUNT(a.id) AS total_aval
        FROM restaurante r
        LEFT JOIN avaliacao a ON a.nome_restaurante = r.nome
        WHERE r.nome = ?
        GROUP BY r.id";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $nome);
mysqli_stmt_execute($stmt);
$restaurante = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$restaurante) {
    http_response_code(404);
    echo json_encode(["erro" => "Restaurante não encontrado"], JSON_UNESCAPED_UNICODE);
    exit();
}

$sql_avaliacoes = "SELECT nome_usuario, nota, comentario, data
                   FROM avaliacao
                   WHERE nome_restaurante = ?
                   ORDER BY data DESC";
$stmt_avaliacoes = mysqli_prepare($conn, $sql_avaliacoes);
mysqli_stmt_bind_param($stmt_avaliacoes, "s", $nome);
mysqli_stmt_execute($stmt_avaliacoes);
$resultado = mysqli_stmt_get_result($stmt_avaliacoes);

$avaliacoes = [];
while ($avaliacao = mysqli_fetch_assoc($resultado)) {
    $avaliacoes[] = $avaliacao;
}

$restaurante["avaliacoes"] = $avaliacoes;
echo json_encode($restaurante, JSON_UNESCAPED_UNICODE);
?>
