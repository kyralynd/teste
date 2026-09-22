<?php
// RateAt — Editar restaurante
include("../config/conexao.php");

$id   = (int) $_GET["id"];
$sql  = "SELECT * FROM restaurante WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$dados = mysqli_fetch_assoc($resultado);

if (!$dados) {
  exit("Restaurante não encontrado. <a href=\"listarrestaurante.php\">Voltar</a>");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Restaurante — RateAt</title>
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
  <h1>Editar Restaurante</h1>

  <div class="caixa-form" style="max-width:560px;">
    <form action="restaurante.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div class="form-grupo">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nome']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="categoria">Categoria</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($dados['categoria']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="preco">Faixa de preço</label>
        <select id="preco" name="preco">
          <option value="$"   <?php echo ($dados['preco'] == '$'   ? 'selected' : ''); ?>>$ — Econômico</option>
          <option value="$$"  <?php echo ($dados['preco'] == '$$'  ? 'selected' : ''); ?>>$$ — Moderado</option>
          <option value="$$$" <?php echo ($dados['preco'] == '$$$' ? 'selected' : ''); ?>>$$$ — Premium</option>
        </select>
      </div>

      <div class="form-grupo">
        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($dados['cep']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="bairro">Bairro</label>
        <input type="text" id="bairro" name="bairro" value="<?php echo htmlspecialchars($dados['bairro']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="rua">Rua e número</label>
        <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($dados['rua']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($dados['descricao']); ?></textarea>
      </div>

      <div style="display:flex; gap:12px;">
        <button type="submit" class="btn btn-primario">Salvar alterações</button>
        <a href="listarrestaurante.php" class="btn btn-contorno">Cancelar</a>
      </div>
    </form>
  </div>
</main>

<footer> 2026 RateAt</footer>
</body>
</html>
