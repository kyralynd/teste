<?php
// RateAt — Listar usuários
include("../config/conexao.php");

$sql   = "SELECT * FROM usuario";
$query = $conn->query($sql);
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuários — RateAt</title>
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
  <h1>Usuários Cadastrados</h1>

  <div class="tabela-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Senha</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($usuarios) > 0): ?>
          <?php foreach ($usuarios as $u): ?>
          <tr>
            <td><?php echo $u["id"]; ?></td>
            <td><?php echo htmlspecialchars($u["nome"]); ?></td>
            <td><?php echo htmlspecialchars($u["email"]); ?></td>
            <td><?php echo str_repeat("●", strlen($u["senha"])); ?></td>
            <td class="acoes">
              <a href="editarusuario.php?id=<?php echo $u["id"]; ?>" class="btn-acao btn-editar">Editar</a>
              <a href="excluirusuario.php?id=<?php echo $u["id"]; ?>" class="btn-acao btn-excluir"
                 onclick="return confirm('Excluir este usuário?')">Excluir</a>
            </td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="5">Nenhum usuário cadastrado.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;">
    <a href="../cadastro.html" class="btn btn-primario">+ Novo usuário</a>
  </div>
</main>

<footer> 2026 RateAt </footer>
</body>
</html>
