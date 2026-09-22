<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novo Restaurante — RateAt</title>
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
  <h1>Cadastrar Restaurante</h1>

  <div class="caixa-form" style="max-width:560px;">
    <form action="salvarrestaurante.php" method="post">

      <div class="form-grupo">
        <label for="nome">Nome do restaurante</label>
        <input type="text" id="nome" name="nome" placeholder="Ex.: Tempero da Vó" required>
      </div>

      <div class="form-grupo">
        <label for="categoria">Categoria</label>
        <select id="categoria" name="categoria" required>
          <option value="">Selecione</option>
          <option value="Brasileira">Brasileira</option>
          <option value="Italiana">Italiana</option>
          <option value="Japonesa">Japonesa</option>
          <option value="Hambúrguer">Hambúrguer</option>
          <option value="Churrascaria">Churrascaria</option>
          <option value="Mexicana">Mexicana</option>
          <option value="Pizzaria">Pizzaria</option>
          <option value="Outra">Outra</option>
        </select>
      </div>

      <div class="form-grupo">
        <label for="preco">Faixa de preço</label>
        <select id="preco" name="preco" required>
          <option value="$">$ — Econômico</option>
          <option value="$$">$$ — Moderado</option>
          <option value="$$$">$$$ — Premium</option>
        </select>
      </div>

      <div class="form-grupo">
        <label for="cep">CEP</label>
        <input type="text" id="cep" name="cep" placeholder="00000-000" maxlength="9" required>
      </div>

      <div class="form-grupo">
        <label for="bairro">Bairro</label>
        <input type="text" id="bairro" name="bairro" placeholder="Nome do bairro" required>
      </div>

      <div class="form-grupo">
        <label for="rua">Rua e número</label>
        <input type="text" id="rua" name="rua" placeholder="Ex.: Rua das Flores, 42" required>
      </div>

      <div class="form-grupo">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" placeholder="Fale um pouco sobre o restaurante…"></textarea>
      </div>

      <div style="display:flex; gap:12px;">
        <button type="submit" class="btn btn-primario">Cadastrar</button>
        <a href="listarrestaurante.php" class="btn btn-contorno">Cancelar</a>
      </div>
    </form>
  </div>
</main>

<footer> 
  2026 RateAt 
</footer>
</body>
</html>
