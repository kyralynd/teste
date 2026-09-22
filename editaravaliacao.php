<?php

include("../config/conexao.php");

$id   = (int) $_GET["id"];
$sql  = "SELECT * FROM avaliacao WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$dados = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Avaliação — RateAt</title>
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
  <h1>Editar Avaliação</h1>

  <div class="caixa-form">
    <form action="avaliacao.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div class="form-grupo">
        <label>Restaurante</label>
        <input type="text" value="<?php echo htmlspecialchars($dados['nome_restaurante']); ?>" disabled>
      </div>

      <div class="form-grupo">
        <label for="nota">Nota</label>
        <select id="nota" name="nota" required>
          <?php for ($i = 5; $i >= 1; $i--): ?>
            <option value="<?php echo $i; ?>" <?php echo ($dados['nota'] == $i ? 'selected' : ''); ?>>
              <?php echo str_repeat("⭐", $i) . " ($i)"; ?>
            </option>
          <?php endfor; ?>
        </select>
      </div>

      <div class="form-grupo">
        <label for="comentario">Comentário</label>
        <textarea id="comentario" name="comentario" required><?php echo htmlspecialchars($dados['comentario']); ?></textarea>
      </div>

      <div style="display:flex; gap:12px;">
        <button type="submit" class="btn btn-primario">Salvar alterações</button>
        <a href="listaravaliacao.php" class="btn btn-contorno">Cancelar</a>
      </div>
    </form>
  </div>
</main>

<footer>2026 RateAt</footer>
</body>
</html>
