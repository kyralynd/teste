<?php

include("../config/conexao.php");

$sql  = "SELECT * FROM avaliacao ORDER BY data DESC";
$query = mysqli_query($conn, $sql);
$avaliacoes = [];
while ($avaliacao = mysqli_fetch_assoc($query)) {
  $avaliacoes[] = $avaliacao;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avaliações — RateAt</title>
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
    <a href="../avaliar.html" class="ativo">Avaliar</a>
    <a href="../cadastro.html">Cadastro</a>
    <a href="../login.html">Entrar</a>
  </nav>
</header>

<main>
  <h1>Todas as Avaliações</h1>

  <div class="tabela-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Restaurante</th>
          <th>Usuário</th>
          <th>Nota</th>
          <th>Comentário</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($avaliacoes) > 0): ?>
          <?php foreach ($avaliacoes as $av): ?>
          <tr>
            <td><?php echo $av["id"]; ?></td>
            <td><?php echo htmlspecialchars($av["nome_restaurante"]); ?></td>
            <td><?php echo htmlspecialchars($av["nome_usuario"]); ?></td>
            <td><?php echo str_repeat("★", $av["nota"]) . str_repeat("☆", 5 - $av["nota"]); ?></td>
            <td><?php echo htmlspecialchars($av["comentario"]); ?></td>
            <td><?php echo date("d/m/Y", strtotime($av["data"])); ?></td>
            <td class="acoes">
              <a href="editaravaliacao.php?id=<?php echo $av["id"]; ?>" class="btn-acao btn-editar">Editar</a>
              <a href="excluiravaliacao.php?id=<?php echo $av["id"]; ?>" class="btn-acao btn-excluir"
                 onclick="return confirm('Excluir esta avaliação?')">Excluir</a>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="7">Nenhuma avaliação cadastrada.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;">
    <a href="../avaliar.html" class="btn btn-primario">+ Nova avaliação</a>
  </div>
</main>

<footer> 2026 RateAt</footer>
</body>
</html>
