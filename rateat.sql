-- =====================================================
--  RateAt — Script de criação do banco de dados
--  MySQL / MariaDB
-- =====================================================

CREATE DATABASE IF NOT EXISTS rateat
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE rateat;

-- ── Tabela: usuario ──────────────────────────────────
CREATE TABLE IF NOT EXISTS usuario (
    id    INTEGER      AUTO_INCREMENT PRIMARY KEY,
    nome  VARCHAR(35)  NOT NULL UNIQUE,
    email VARCHAR(50)  NOT NULL,
    senha VARCHAR(20)  NOT NULL
);

-- ── Tabela: restaurante ───────────────────────────────
CREATE TABLE IF NOT EXISTS restaurante (
    id        INTEGER      AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(35)  NOT NULL UNIQUE,
    cep       VARCHAR(9)   NOT NULL,
    bairro    VARCHAR(30)  NOT NULL,
    rua       VARCHAR(60)  NOT NULL,
    categoria VARCHAR(20)  NOT NULL,
    preco     VARCHAR(5)   NOT NULL DEFAULT '$',
    descricao VARCHAR(150)
);

-- ── Tabela: avaliacao ────────────────────────────────
CREATE TABLE IF NOT EXISTS avaliacao (
    id               INTEGER     AUTO_INCREMENT PRIMARY KEY,
    nota             INTEGER     NOT NULL CHECK (nota BETWEEN 1 AND 5),
    comentario       VARCHAR(150) NOT NULL,
    data             DATETIME    DEFAULT CURRENT_TIMESTAMP,
    nome_usuario     VARCHAR(35) NOT NULL,
    nome_restaurante VARCHAR(35) NOT NULL,
    FOREIGN KEY (nome_usuario)     REFERENCES usuario(nome),
    FOREIGN KEY (nome_restaurante) REFERENCES restaurante(nome)
);

-- =====================================================
--  Dados de exemplo
-- =====================================================

-- Usuários
INSERT INTO usuario (nome, email, senha) VALUES
    ('Maria',  'maria@email.com',  'senha123'),
    ('Joao',   'joao@email.com',   'senha123'),
    ('Pedro',  'pedro@email.com',  'senha123');

-- Restaurantes (mini mundo FoodReview / RateAt)
INSERT INTO restaurante (nome, cep, bairro, rua, categoria, preco, descricao) VALUES
    ('Cantina da Ana',  '01001-000', 'Centro',     'Rua das Orquídeas, 15',  'Italiana',     '$$',  'Massas artesanais e molhos da tradição italiana.'),
    ('Burger House',    '01002-000', 'Jardins',    'Av. Paulista, 200',       'Hambúrguer',   '$',   'Hambúrgueres artesanais com ingredientes frescos.'),
    ('Sabor & Brasa',   '01003-000', 'Vila Nova',  'Rua do Churrasco, 88',   'Churrascaria', '$$$', 'Rodízio de carnes nobres na brasa.'),
    ('Tokyo Sushi',     '01004-000', 'Pinheiros',  'Rua Japão, 5',           'Japonesa',     '$$$', 'Sushis e sashimis preparados na hora.'),
    ('Tempero da Vó',   '01005-000', 'Liberdade',  'Rua das Flores, 42',     'Brasileira',   '$',   'Comida caseira com o sabor da vovó.');

-- Avaliações de exemplo (nota média → 4,67 ≈ 4,7 para Tempero da Vó)
INSERT INTO avaliacao (nota, comentario, nome_usuario, nome_restaurante) VALUES
    (5, 'Melhor comida caseira da cidade! Voltarei com certeza.',    'Maria', 'Tempero da Vó'),
    (4, 'Ótimo atendimento e comida gostosa. Preço muito justo.',   'Joao',  'Tempero da Vó'),
    (5, 'A feijoada do sábado é simplesmente incrível!',             'Pedro', 'Tempero da Vó'),
    (5, 'Massas deliciosas, ambiente aconchegante.',                  'Maria', 'Cantina da Ana'),
    (4, 'Boa comida, serviço um pouco lento no fim de semana.',      'Joao',  'Cantina da Ana');
