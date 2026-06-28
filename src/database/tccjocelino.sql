-- -----------------------------------------------------
-- Schema otimizado: tccjocelino
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tccjocelino` DEFAULT CHARACTER SET utf8mb4;
USE `tccjocelino`;

-- -----------------------------------------------------
-- NivelAcesso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nivelacesso` (
  `idNivelAcesso` INT NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idNivelAcesso`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `login` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `fk_idNivelAcesso` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX (`fk_idNivelAcesso`),
  CONSTRAINT `fk_usuarioNivelAcesso`
    FOREIGN KEY (`fk_idNivelAcesso`)
    REFERENCES `nivelacesso`(`idNivelAcesso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Categoria
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Marca
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idMarca`),
  UNIQUE KEY `uk_marca_nome` (`nome`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Produto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(255),
  `quantidade` INT NOT NULL DEFAULT 0,
  `preco` DECIMAL(10,2) NOT NULL,
  `foto` VARCHAR(255),
  `fk_idCategoria` INT NOT NULL,
  `fk_idMarca` INT NOT NULL,

  PRIMARY KEY (`idProduto`),

  INDEX `idx_produto_categoria` (`fk_idCategoria`),
  INDEX `idx_produto_marca` (`fk_idMarca`),

  CONSTRAINT `fk_produto_categoria`
    FOREIGN KEY (`fk_idCategoria`)
    REFERENCES `categoria` (`idCategoria`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

  CONSTRAINT `fk_produto_marca`
    FOREIGN KEY (`fk_idMarca`)
    REFERENCES `marca` (`idMarca`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT

) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Pais
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pais` (
  `idPais` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Estado
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `fk_idPais` INT NOT NULL,
  PRIMARY KEY (`idEstado`),
  INDEX (`fk_idPais`),
  CONSTRAINT `fk_estadoPais`
    FOREIGN KEY (`fk_idPais`)
    REFERENCES `pais`(`idPais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Cidade
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cidade` (
  `idCidade` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `fk_idEstado` INT NOT NULL,
  PRIMARY KEY (`idCidade`),
  INDEX (`fk_idEstado`),
  CONSTRAINT `fk_cidadeEstado`
    FOREIGN KEY (`fk_idEstado`)
    REFERENCES `estado`(`idEstado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Endereco
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `bairro` VARCHAR(100) NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(20) NOT NULL,
  `telefone` BIGINT NOT NULL,
  `fk_idCidade` INT NOT NULL,
  PRIMARY KEY (`idEndereco`),
  INDEX (`fk_idCidade`),
  CONSTRAINT `fk_enderecoCidade`
    FOREIGN KEY (`fk_idCidade`)
    REFERENCES `cidade`(`idCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Artigo
-- -----------------------------------------------------
CREATE TABLE artigo (
    idArtigo INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT NOT NULL,
    imagem VARCHAR(255) DEFAULT NULL,
    fk_idUsuario INT NOT NULL,
    data_publicacao DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (idArtigo),

    CONSTRAINT fk_artigo_usuario
        FOREIGN KEY (fk_idUsuario)
        REFERENCES usuario(idUsuario)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB;
-- -----------------------------------------------------
-- Tag
-- -----------------------------------------------------
CREATE TABLE tag (
  idTag INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  PRIMARY KEY (idTag)
);

-- -----------------------------------------------------
-- Argito_Tag
-- -----------------------------------------------------

CREATE TABLE artigo_tag (
    fk_idArtigo INT NOT NULL,
    fk_idTag INT NOT NULL,

    PRIMARY KEY (fk_idArtigo, fk_idTag),

    FOREIGN KEY (fk_idArtigo)
        REFERENCES artigo(idArtigo)
        ON DELETE CASCADE,

    FOREIGN KEY (fk_idTag)
        REFERENCES tag(idTag)
        ON DELETE CASCADE
);
-- -----------------------------------------------------
-- Pedido
-- -----------------------------------------------------
CREATE TABLE pedido (
  idPedido INT NOT NULL AUTO_INCREMENT,
  fk_idUsuario INT NOT NULL,
  status ENUM('carrinho','finalizado','pago','cancelado') DEFAULT 'carrinho',
  dataCriacao DATETIME DEFAULT CURRENT_TIMESTAMP,
  dataFinalizacao DATETIME NULL,
  PRIMARY KEY (idPedido),
  CONSTRAINT fk_pedido_usuario
    FOREIGN KEY (fk_idUsuario) REFERENCES usuario(idUsuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE pedido_item (
  idPedidoItem INT NOT NULL AUTO_INCREMENT,
  fk_idPedido INT NOT NULL,
  fk_idProduto INT NOT NULL,
  quantidade INT NOT NULL,
  precoUnitario DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (idPedidoItem),
  CONSTRAINT fk_pedidoitem_pedido
    FOREIGN KEY (fk_idPedido) REFERENCES pedido(idPedido)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_pedidoitem_produto
    FOREIGN KEY (fk_idProduto) REFERENCES produto(idProduto)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Animal
-- -----------------------------------------------------

CREATE TABLE animal (
    idAnimal INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50),
    raca VARCHAR(50),
    data_nascimento DATE,
    fk_idUsuario INT NOT NULL,

    PRIMARY KEY (idAnimal),

    FOREIGN KEY (fk_idUsuario)
        REFERENCES usuario(idUsuario)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Animal
-- -----------------------------------------------------

CREATE TABLE vacina (
    idVacina INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,

    PRIMARY KEY (idVacina)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- carteira_vacinacao
-- -----------------------------------------------------

CREATE TABLE carteira_vacinacao (
    idCarteira INT NOT NULL AUTO_INCREMENT,
    fk_idAnimal INT NOT NULL,
    data_criacao DATE DEFAULT CURRENT_DATE,

    PRIMARY KEY (idCarteira),

    FOREIGN KEY (fk_idAnimal)
        REFERENCES animal(idAnimal)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- aplicacao_vacina
-- -----------------------------------------------------

CREATE TABLE aplicacao_vacina (
    idAplicacao INT NOT NULL AUTO_INCREMENT,
    fk_idCarteira INT NOT NULL,
    fk_idVacina INT NOT NULL,

    data_aplicacao DATE NOT NULL,
    proxima_dose DATE NULL,
    dose VARCHAR(50),
    observacao TEXT,

    PRIMARY KEY (idAplicacao),

    FOREIGN KEY (fk_idCarteira)
        REFERENCES carteira_vacinacao(idCarteira)
        ON DELETE CASCADE,

    FOREIGN KEY (fk_idVacina)
        REFERENCES vacina(idVacina)
        ON DELETE RESTRICT
) ENGINE=InnoDB;


-- Alters


alter table usuario
add column dataCadastro DATETIME DEFAULT CURRENT_TIMESTAMP;

-- -----------------------------------------------------
-- POPULANDO tabela nivelacesso
-- -----------------------------------------------------

insert into nivelacesso(idNivelAcesso, cargo)
values 
  (1,'administrador'),
	(2,'usuario');

-- -----------------------------------------------------
-- POPULANDO tabela Usuario
-- -----------------------------------------------------
INSERT INTO usuario (nome, login, senha, fk_idNivelAcesso)
VALUES 
  ('administrador', 'admin@admin.com.br', md5('1234'), 1),
  ('usuario', 'user@user.com.br', md5('123'), 2),
  ('joe', 'joelokao@gmail.com.br', md5('123'), 2),
  ('jenkins', 'jenkins@gmail.com.br', md5('123'), 2),
  ('mega', 'mega@mega.com.br', md5('123'), 2);

-- -----------------------------------------------------
-- POPULANDO tabela Pais
-- -----------------------------------------------------
INSERT INTO pais (nome)
VALUES
  ('Brasil'),
  ('Argentina'),
  ('Bolivia');

-- -----------------------------------------------------
-- POPULANDO tabela Categoria
-- -----------------------------------------------------
INSERT INTO categoria (nome, descricao)
VALUES
  ('Cães', 'Produtos para cães'),
  ('Gatos', 'Produtos para gatos'),
  ('Pássaros', 'Produtos para pássaros'),
  ('Peixes', 'Produtos para peixes'),
  ('Roedores', 'Produtos para roedores'),
  ('Acessórios', 'Acessórios em geral'),
  ('Brinquedos', 'Brinquedos em geral'),
  ('Medicamentos', 'Medicamentos em geral'),
  ('Higiene', 'Produtos de higiene em geral');

-- -----------------------------------------------------
-- POPULANDO tabela Estado
-- -----------------------------------------------------
INSERT INTO estado (nome, uf, fk_idPais) VALUES
('Acre','AC',1),
('Alagoas','AL',1),
('Amapa','AP',1),
('Amazonas','AM',1),
('Bahia','BA',1),
('Ceara','CE',1),
('Distrito Federal','DF',1),
('Espirito Santo','ES',1),
('Goias','GO',1),
('Maranhao','MA',1),
('Mato Grosso','MT',1),
('Mato Grosso do Sul','MS',1),
('Minas Gerais','MG',1),
('Para','PA',1),
('Paraiba','PB',1),
('Parana','PR',1),
('Pernambuco','PE',1),
('Piaui','PI',1),
('Rio de Janeiro','RJ',1),
('Rio Grande do Norte','RN',1),
('Rio Grande do Sul','RS',1),
('Rondonia','RO',1),
('Roraima','RR',1),
('Santa Catarina','SC',1),
('Sao Paulo','SP',1),
('Sergipe','SE',1),
('Tocantins','TO',1);

-- -----------------------------------------------------
-- POPULANDO tabela Cidade
-- -----------------------------------------------------
INSERT INTO cidade (nome, fk_idEstado) VALUES
('Uruguaiana',21),
('Porto Alegre',21),
('Itaqui',21),
('Blumenau',2),
('Florianopolis',2),
('Curitiba',3),
('Londrina',3),
('Vitoria',8),
('Vila Velha',8),
('Belo Horizonte',13),
('Uberlandia',13),
('Sao Paulo',25),
('Campinas',25),
('Rio de Janeiro',19),
('Niteroi',19),
('Porto Velho',22),
('Ji-Parana',22),
('Boa Vista',23),
('Manaus',4),
('Belem',14),
('Santarem',14),
('Recife',17),
('Olinda',17),
('Fortaleza',6),
('Caucaia',6),
('Natal',20),
('Mossoro',20),
('Joao Pessoa',15),
('Campina Grande',15),
('Palmas',27);

-- -----------------------------------------------------
-- POPULANDO tabela Endereco
-- -----------------------------------------------------
INSERT INTO endereco (bairro, rua, numero, telefone, fk_idCidade)
VALUES
('Onedo Carvalho','Mariquita',2312,55991514169,1),
('Vila Isabel','Maria Candida',4212,55991514439,2);

-- -----------------------------------------------------
-- POPULANDO tabela Marca
-- -----------------------------------------------------
INSERT INTO marca (nome)
VALUES
('Pedigree'),
('Zorro'),
('MegaZOO');

-- -----------------------------------------------------
-- POPULANDO tabela Produto
-- -----------------------------------------------------
INSERT INTO produto (nome, descricao, quantidade, preco, foto, fk_idCategoria, fk_idMarca)
VALUES
('Racao Pedigree','Racao para cachorros',5,24.99,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,1),
('Racao Pedigree Biscrok Adulto','Racao para cachorros',5,34.99,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,1),
('Racao Pedigree Carne e Vegetais','Racao para cachorros',5,19.99,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,1),
('Racao Pedigree Adulto','Racao para cachorros',9,59.15,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,1),
('Racao Zorro Adulto','Racao para cachorros',5,25.15,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,2),
('Racao Zorro Filhote','Racao para cachorros',7,27.15,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,2),
('Racao Pedigree Biscrok Filhote','Racao para cachorros',5,24.99,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,1),
('Racao MegaZOO','Racao para cachorros',3,45.22,'fe789e71ac8bcff434c8474aee52f4f1.jpg',1,3);

-- -----------------------------------------------------
-- POPULANDO tabela Artigo
-- -----------------------------------------------------
INSERT INTO artigo (titulo, texto, imagem, fk_idUsuario, data_publicacao)
VALUES
('O destino dos cães', 'Os cães nascem para encontrar seu elo perdido', '02e0a774834ca3aab7b23606d06cc273.jpg', 1, '2020-12-12'),
('O destino dos Gatos', 'Os gatos nascem para encontrar seu elo perdido', '02e0a774834ca3aab7b23606d06cc273.jpg', 1, '2020-12-12');

INSERT INTO tag (nome)
VALUES ('Gatos'),
       ('Cães'),
       ('Pássaros'),
       ('Peixes'),
       ('Roedores');

INSERT INTO artigo_tag (fk_idArtigo, fk_idTag)
VALUES (1, 1),
       (2, 1);