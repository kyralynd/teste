<?php
include("../config/conexao.php");

header("Content-Type: application/json; charset=utf-8");

$busca = trim($_GET["busca"] ?? "");
$termo = "%" . $busca . "%";

$sql = "SELECT r.id, r.nome, r.categoria, r.preco, r.cep, r.bairro, r.rua,
               r.descricao, ROUND(AVG(a.nota), 1) AS nota_media,
               COUNT(a.id) AS total_aval
        FROM restaurante r
        LEFT JOIN avaliacao a ON a.nome_restaurante = r.nome
        WHERE (? = '' OR r.nome LIKE ? OR r.categoria LIKE ?)
        GROUP BY r.id
        ORDER BY nota_media IS NULL, nota_media DESC, r.nome ASC";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $busca, $termo, $termo);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

$restaurantes = [];
while ($restaurante = mysqli_fetch_assoc($resultado)) {
    $restaurantes[] = $restaurante;
}

echo json_encode($restaurantes, JSON_UNESCAPED_UNICODE);
?>
