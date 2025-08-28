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
-- Tipo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Produto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `marca` VARCHAR(100) NOT NULL,
  `quantidade` INT NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `fk_idCategoria` INT NOT NULL,
  `fk_idTipo` INT NOT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX (`fk_idCategoria`),
  INDEX (`fk_idTipo`),
  CONSTRAINT `fk_produtoCategoria`
    FOREIGN KEY (`fk_idCategoria`)
    REFERENCES `categoria`(`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtoTipo`
    FOREIGN KEY (`fk_idTipo`)
    REFERENCES `tipo`(`idTipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
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
CREATE TABLE `artigo` (
  `idArtigo` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `texto` VARCHAR(1200) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  `data_publicacao` DATE,
  `tag` VARCHAR(45) NOT NULL,
  `sobreAutor` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idArtigo`)
);


-- -----------------------------------------------------
-- POPULANDO tabela nivelacesso
insert into nivelacesso(idNivelAcesso, cargo)
values 
  (1,'administrador'),
	(2,'usuario');

-- -----------------------------------------------------
-- POPULANDO tabela Usuario
INSERT INTO usuario (nome, login, senha, fk_idNivelAcesso)
VALUES 
  ('administrador', 'admin@admin.com.br', md5('1234'), 1),
  ('usuario', 'user@user.com.br', md5('123'), 2),
  ('joe', 'joelokao@gmail.com.br', md5('123'), 2),
  ('jenkins', 'jenkins@gmail.com.br', md5('123'), 2),
  ('mega', 'mega@mega.com.br', md5('123'), 2);

-- -----------------------------------------------------
-- POPULANDO tabela Pais
INSERT INTO pais (nome)
VALUES
  ('Brasil'),
  ('Argentina'),
  ('Bolivia');

-- -----------------------------------------------------
-- POPULANDO tabela Categoria
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
-- POPULANDO tabela Tipo
INSERT INTO tipo (nome, descricao)
VALUES
  ('Racao', 'Rações para cães, gatos, peixes e roedores'),
  ('Alimento Umido', 'Alimentos enlatados ou úmidos para pets'),
  ('Suplemento / Vitamina', 'Suplementos e vitaminas para pets'),
  ('Brinquedo', 'Brinquedos para cães, gatos e outros animais'),
  ('Coleira / Acessorio', 'Coleiras, guias e acessórios em geral'),
  ('Vacina', 'Vacinas para prevenção de doenças'),
  ('Medicamento', 'Medicamentos para tratamento de pets'),
  ('Higiene', 'Produtos de higiene e cuidados'),
  ('Cama / Casa', 'Camas, casinhas e locais de descanso'),
  ('Acessorio para aquario', 'Filtros, decorações e acessórios para peixes');

-- -----------------------------------------------------
-- POPULANDO tabela Estado
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
INSERT INTO endereco (bairro, rua, numero, telefone, fk_idCidade)
VALUES
('Onedo Carvalho','Mariquita',2312,55991514169,1),
('Vila Isabel','Maria Candida',4212,55991514439,2);

-- -----------------------------------------------------
-- POPULANDO tabela Produto
INSERT INTO produto (nome, descricao, marca, quantidade, preco, foto, fk_idCategoria, fk_idTipo)
VALUES
('Racao Pedigree','Racao para cachorros','Pedigree',5,24.99,'939dd63bebed93eef687566b8a28aa1e.jpg',1,1),
('Racao Pedigree Biscrok Adulto','Racao para cachorros','Pedigree',5,34.99,'0d74792eaaccadb05a022026646d294e.jpg',1,1),
('Racao Pedigree Carne e Vegetais','Racao para cachorros','Pedigree',5,19.99,'725363c7cd502e54716899dd609f5f3a.jpg',1,1),
('Racao Pedigree Adulto','Racao para cachorros','Pedigree',9,59.15,'939dd63bebed93eef687566b8a28aa1e.jpg',1,1),
('Racao Zorro Adulto','Racao para cachorros','Zorro',5,25.15,'a40d63c0428b75cd5b563e23a8b82afe.jpg',1,1),
('Racao Zorro Filhote','Racao para cachorros','Zorro',7,27.15,'a40d63c0428b75cd5b563e23a8b82afe.jpg',1,1),
('Racao Pedigree Biscrok Filhote','Racao para cachorros','Pedigree',5,24.99,'0d74792eaaccadb05a022026646d294e.jpg',1,1),
('Racao MegaZOO','Racao para cachorros','MegaZOO',3,45.22,'e737f1f818f5482684dbee524567008d.jpg',1,1);

-- -----------------------------------------------------
-- POPULANDO tabela Artigo
INSERT INTO artigo (titulo, texto, autor, data_publicacao, tag, sobreAutor)
VALUES
('O destino dos cães', 'Os cães nascem para encontrar seu elo perdido', 'Jocelino F.G','2020-12-12','Gatos','Nascido no RS');
