## TCC-Tecnico-em-Informatica.
Este repositório contém o meu TCC de Técnico em Informática do IFFAR - Campus São Borja.

A proposta do projeto é desenvolver um website para a venda de alimentos e itens para petshops, com o objetivo de facilitar a compra desses produtos para os clientes.

Podendo ser replicado para outros tipos de comércios.

A versão 1.0 apresentada no dia da defesa encontra-se zipada nesse arquivo ->  `tc04dxd.zip`

Uma descrição Mais detalhada sobre o projeto pode ser visualizada nesse link.
[Descricao](descricao.md)

## Tecnologias Utilizadas
- PHP
- JavaScript
- HTML/CSS
- MySQL
- Bootstrap 5
- Docker

## Como Rodar o Projeto
Há 2 maneiras de rodar o projeto: Via Docker ou Xampp:

### Via Xampp
1. Baixe ou clone o projeto e adicione a pasta htdocs do seu xampp
2. Rode o xampp e ligue o SQL e Apache
3. Abra seu navegador e entre no localhost/phpmyadmin
4. No phpmyadmin rode o script tccjocelino.sql, isso vai criar a database + tabelas
5. Vá em conexao/conexao.php e troque o servidor de db para localhost
6. Teste acessando http://localhost:8080 no navegador.

### Via Docker
1. Baixe o Docker e docker compose se ainda não tiver.
2. Clone o repositório
3. Abra o projeto no seu editor de código ou via terminal se preferir.
4. Com o terminal aberto na pasta do projeto rode o seguinte comando: 
 
```sh 
    docker-compose up -d --build
```
5. Teste acessando http://localhost:8080 no navegador.