<?php
include("../config/conexao.php");

$sql  = "SELECT r.*, ROUND(AVG(a.nota), 1) AS nota_media, COUNT(a.id) AS total_aval
         FROM restaurante r
         LEFT JOIN avaliacao a ON a.nome_restaurante = r.nome
         GROUP BY r.id
         ORDER BY nota_media DESC";
$query = mysqli_query($conn, $sql);
$lista = [];

if ($query) {
  while ($restaurante = mysqli_fetch_assoc($query)) {
    $lista[] = $restaurante;
  }
} else {
  die("Erro ao listar restaurantes: " . htmlspecialchars(mysqli_error($conn)));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrar Restaurantes — RateAt</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<header>
  <a href="../index.html" class="logo">
    <img src="../IMG/LOGO RATEEAT.png" alt="Logo RateAt">
    <span>RateAt</span>
  </a>
  <nav>
    <a href="../index.html">Início</a>
    <a href="../restaurantes.html">Restaurantes</a>
    <a href="../avaliar.html">Avaliar</a>
    <a href="../cadastro.html">Cadastro</a>
    <a href="../login.html">Entrar</a>
  </nav>
</header>

<main>
  <h1>Administrar Restaurantes</h1>

  <div style="margin-bottom:16px;">
    <a href="novorestaurante.php" class="btn btn-primario">+ Novo restaurante</a>
  </div>

  <div class="tabela-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Categoria</th>
          <th>Preço</th>
          <th>Bairro</th>
          <th>Nota média</th>
          <th>Avaliações</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($lista) > 0): ?>
          <?php foreach ($lista as $r): ?>
          <tr>
            <td><?php echo $r["id"]; ?></td>
            <td><?php echo htmlspecialchars($r["nome"]); ?></td>
            <td><?php echo htmlspecialchars($r["categoria"]); ?></td>
            <td><?php echo htmlspecialchars($r["preco"]); ?></td>
            <td><?php echo htmlspecialchars($r["bairro"]); ?></td>
            <td><?php echo $r["nota_media"] ?? "—"; ?></td>
            <td><?php echo $r["total_aval"]; ?></td>
            <td class="acoes">
              <a href="editarrestaurante.php?id=<?php echo $r["id"]; ?>" class="btn-acao btn-editar">Editar</a>
              <a href="excluirrestaurante.php?id=<?php echo $r["id"]; ?>" class="btn-acao btn-excluir"
                 onclick="return confirm('Excluir este restaurante?')">Excluir</a>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="8">Nenhum restaurante cadastrado.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>

<footer>
2026 RateAt 
</footer>
</body>
</html>
