<?php

include("../config/conexao.php");

$id = (int) $_GET["id"];
$sql  = "SELECT * FROM usuario WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Usuário — RateAt</title>
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
  <h1>Editar Usuário</h1>

  <div class="caixa-form">
    <form action="usuario.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <div class="form-grupo">
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($dados['nome']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($dados['email']); ?>" required>
      </div>

      <div class="form-grupo">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" value="<?php echo htmlspecialchars($dados['senha']); ?>" required>
      </div>

      <div style="display:flex; gap:12px;">
        <button type="submit" class="btn btn-primario">Salvar alterações</button>
        <a href="listarusuario.php" class="btn btn-contorno">Cancelar</a>
      </div>
    </form>
  </div>
</main>

<footer> 2026 RateAt </footer>
</body>
</html>
