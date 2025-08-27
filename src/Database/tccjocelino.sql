DROP SCHEMA IF EXISTS tccjocelino;
CREATE DATABASE tccjocelino;
USE tccjocelino;

-- Database: `tccjocelino`

--
-- Estrutura da tabela `niveis_acessos`
-- Somente 2 usuários (o usuario padrao e o admin)
/*
CREATE TABLE niveisAcesso (
  idNiveisAcesso int(11) NOT NULL auto_increment,
  nome varchar(45) NOT NULL,
  data date NOT NULL,
  modified int(11) DEFAULT NULL,
  PRIMARY KEY(idNiveisAcesso)
) ENGINE=InnoDB DEFAULT CHARSET = UTF8 COLLATE = utf8_general_ci;
*/


--
-- Estrutura da tabela `tipo`
--
CREATE TABLE tipo (
  idProduto int(11) NOT NULL auto_increment,
  nome varchar(45) NOT NULL,
  descricao varchar(45) NOT NULL,
  PRIMARY KEY(idProduto)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_general_ci;

--
-- Estrutura da tabela `produto`
--

CREATE TABLE produto (
  idProduto int(11) NOT NULL auto_increment,
  nome varchar(45) NOT NULL,
  descricao varchar(45) NOT NULL,
  marca varchar(45) NOT NULL,
  quantidade varchar(45) NOT NULL,
  preco float(45) NOT NULL,
  foto varchar(100) NOT NULL,
  PRIMARY KEY(idProduto)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COLLATE=utf8_general_ci;

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE usuario (
    idUsuario int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    login varchar(45) NOT NULL,
    senha varchar(45) NOT NULL,-- id niveis d acesso
    PRIMARY KEY(idUsuario)
    -- idNiveisAcesso int,
   -- CONSTRAINT fk_NiveisAcesso FOREIGN KEY(idNiveisAcesso) REFERENCES usuario(idUsuario)
)CHARSET=utf8;
--   CONSTRAINT fk_NiveisAcesso FOREIGN KEY (idNiveisAcesso) REFFERENCES usuario(idUsuario)
-- Normalização do endereco

-- Estrutura da tabela `Pais`

CREATE TABLE pais(
    idPais int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    PRIMARY KEY (idPais)
)CHARSET=utf8;

-- Estrutura da tabela `estado`

CREATE TABLE estado(
    idEstado int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    UF char(2) NOT NULL,
    idPais int,
    PRIMARY KEY (idEstado),
    CONSTRAINT fk_Pais FOREIGN KEY (idPais) REFERENCES pais(idPais)
)CHARSET=utf8;

-- Estrutura da tabela `cidade`

CREATE TABLE cidade(
    idCidade int(11) NOT NULL auto_increment,
    nome varchar(45) NOT NULL,
    idEstado int,
    PRIMARY KEY (idCidade)
    -- CONSTRAINT fk_Estado FOREIGN KEY(idEstado) REFERENCES estado(idEstado)
)CHARSET=utf8;
-- Estrutura da tabela `endereco`

CREATE TABLE endereco (
    idEndereco int(11) NOT NULL auto_increment,
    bairro varchar(45) NOT NULL,
    rua varchar(45) NOT NULL,
    numero varchar(45) NOT NULL,
    cidadeId int NULL,
    estadoID int NULL,
    telefone varchar(20) NOT NULL,
    -- idPais int NULL,
    PRIMARY KEY (idEndereco),
    CONSTRAINT fk_EnderecoCidade FOREIGN KEY (cidadeId) REFERENCES cidade(idCidade),
   CONSTRAINT fk_EnderecoEstado FOREIGN KEY (estadoId) REFERENCES estado(idEstado)
    -- CONSTRAINT fk_EnderecoPais FOREIGN KEY (idPais) REFERENCES pais(idPais)
)CHARSET=utf8;


CREATE TABLE artigo(
      idArtigo int NOT NULL auto_increment,
      titulo varchar(45) NOT NULL,
      texto varchar(1200) NOT NULL,
      autor varchar(45) NOT NULL,
      data_publicacao DATE,
      tag varchar(45) NOT NULL,
      sobreAutor VARCHAR(100) NOT NULL,
      PRIMARY KEY(idArtigo)
);

-- POPULANO TABELAS

-- POPULANDO tabela `niveis_acessos`
/*
INSERT INTO niveisAcesso (idNiveisAcesso, nome, data, modified)
VALUES(1, 'administrador', '1928-10-10', NULL),
      (2, 'usuario', '1928-10-10', NULL);
*/

--  POPULANDO tabela`usuarios`

INSERT INTO usuario (idUsuario,nome,login, senha)
VALUES (1,'administrador', 'admin@admin.com.br', md5('1234')),
       (2,'usuario', 'user@user.com.br', md5('123')),
       (3,'joe', 'joelokao@gmail.com.br', md5('123')),
       (4,'jenkins', 'jenkins@gmail.com.br', md5('123')),
       (5,'mega', 'mega@mega.com.br', md5('123'));

--  POPULANDO tabela `Pais`
INSERT INTO pais(idPais, nome)
VALUES(1,'Brasil'),
      (2,'Argentina'),
      (3,'Bolivia');

--  POPULANDO tabela `Estado`
INSERT INTO estado (idEstado, nome, sigla, paisId) VALUES
(1,'Acre','AC',1),
(2,'Alagoas','AL',1),
(3,'Amapá','AP',1),
(4,'Amazonas','AM',1),
(5,'Bahia','BA',1),
(6,'Ceará','CE',1),
(7,'Distrito Federal','DF',1),
(8,'Espírito Santo','ES',1),
(9,'Goiás','GO',1),
(10,'Maranhão','MA',1),
(11,'Mato Grosso','MT',1),
(12,'Mato Grosso do Sul','MS',1),
(13,'Minas Gerais','MG',1),
(14,'Pará','PA',1),
(15,'Paraíba','PB',1),
(16,'Paraná','PR',1),
(17,'Pernambuco','PE',1),
(18,'Piauí','PI',1),
(19,'Rio de Janeiro','RJ',1),
(20,'Rio Grande do Norte','RN',1),
(21,'Rio Grande do Sul','RS',1),
(22,'Rondônia','RO',1),
(23,'Roraima','RR',1),
(24,'Santa Catarina','SC',1),
(25,'São Paulo','SP',1),
(26,'Sergipe','SE',1),
(27,'Tocantins','TO',1);


--  POPULANDO tabela `Cidade`
INSERT INTO cidade(idCidade, nome, idEstado) VALUES
(1,'Uruguaiana', 1),
(2,'Porto Alegre', 1),
(3,'Itaqui', 1),
(4,'Blumenau', 2),
(5,'Florianópolis', 2),
(6,'Curitiba', 3),
(7,'Londrina', 3),
(8,'Vitória', 8),
(9,'Vila Velha', 8),
(10,'Belo Horizonte', 13),
(11,'Uberlândia', 13),
(12,'São Paulo', 25),
(13,'Campinas', 25),
(14,'Rio de Janeiro', 19),
(15,'Niterói', 19),
(16,'Porto Velho', 22),
(17,'Ji-Paraná', 22),
(18,'Boa Vista', 23),
(19,'Manaus', 4),
(20,'Belém', 14),
(21,'Santarém', 14),
(22,'Recife', 17),
(23,'Olinda', 17),
(24,'Fortaleza', 6),
(25,'Caucaia', 6),
(26,'Natal', 20),
(27,'Mossoró', 20),
(28,'João Pessoa', 15),
(29,'Campina Grande', 15),
(30,'Aracaju', 26),
(31,'Nossa Senhora do Socorro', 26),
(32,'Teresina', 18),
(33,'Parnaíba', 18),
(34,'Goiânia', 9),
(35,'Aparecida de Goiânia', 9),
(36,'Palmas', 27);



--  POPULANDO tabela `endereco`
-- INSERT INTO endereco(idEndereco,bairro,rua,numero,idCidade,idEstado,idPais,telefone)
INSERT INTO endereco(idEndereco,bairro,rua,numero,cidadeId,estadoId,telefone)
VALUES(1,'Onedo Carvalho','mariquita',2312,1,1,55991514169),
      (2,'Vila Isabel','Maria Candida',4212,2,1,55991514439);
      -- (3,'Jardim da paz','aparicio mariense',9928,3,1,1,55921514469),
      -- (4,'centro','barao do rio branco',8273,4,1,1,55991514269),
      -- (5,'andradas','eusébio martins',0192,5,1,1,55991514462);

--  POPULANDO tabela `produto`
INSERT INTO produto(idProduto,nome,descricao,marca,quantidade,preco,foto)
VALUES(1,'Ração Pedigree','Ração para cachorros','Pedigree','5kg',24.99,'939dd63bebed93eef687566b8a28aa1e.jpg'),
      (2,'Ração Pedigree Biscrok Adulto','Ração para cachorros','Pedigree','5kg',34.99,'0d74792eaaccadb05a022026646d294e.jpg'),
      (3,'Ração Pedigree Carne e Vegetais','Ração para cachorros','Pedigree','5kg',19.99,'725363c7cd502e54716899dd609f5f3a.jpg'),
      (4,'Ração Pedigree Adulto','Ração para cachorros','Pedigree','9kg',59.15,'939dd63bebed93eef687566b8a28aa1e.jpg'),
      (5,'Ração Zorro Adulto','Ração para cachorros','Zorro','5kg',25.15,'a40d63c0428b75cd5b563e23a8b82afe.jpg'),
      (6,'Ração Zorro Filhote','Ração para cachorros','Zorro','7kg',27.15,'a40d63c0428b75cd5b563e23a8b82afe.jpg'),
      (7,'Ração Pedigree Biscrok Filhote','Ração para cachorros','Pedigree','5kg',24.99,'0d74792eaaccadb05a022026646d294e.jpg'),
      (8,'Ração MegaZOO','Ração para cachorros','MegaZOO','3kg',45.22,'e737f1f818f5482684dbee524567008d.jpg');



--  POPULANDO tabela `curiosidades`
INSERT INTO artigo(idArtigo, titulo, texto, autor, data_publicacao, tag, sobreAutor)
VALUES (1,'O destino dos cães', 'Os cães nascem para encontrar seu elo perdido', 'Jocelino F.G','2020-12-12','Gatos' ,'Nascido no RS');