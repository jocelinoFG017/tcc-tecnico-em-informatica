# Sobre a atualização 1.6 (v1.6)

### 🗄️ BASE DE DADOS
    Adição da imagem do phpmyadmin ao docker
    Otimização dos alters e inserts no arquivo tccjocelino.sql
    Adição de criação do banco e tabelas ao subir o container pela 1ª vez
    Remoção da tabela tipo(estava redundante com a tabela categoria)
    Adaptação da tabela produto(com a remoção de tipo)
    Adição da tabel marca (linkada a produto)
    Adicionado inserts para tabela marcas
    Em produtos a descricao pode ser nula (NULL), pois nem todo produto precisa de descrição.
    Em produtos a foto pode ser nula (NULL), caso o produto ainda não tenha imagem.
    Em produtos a quantidade inicia em 0 por padrão
    Alterado para ON UPDATE CASCADE e ON DELETE RESTRICT, que costuma ser mais adequado em sistemas de cadastro.

### 📂 PÁGINAS/PASTAS ATUALIZADAS

    N/A

### 📊 DASHBOARD
    Refatoração nos estilos e no código para o Bootstrap 5 nas páginas de endereço, produtos, usuários e artigos
    Refatoração nos estilos e no código de sidebar e headerdash para Bootstrap 5
    Correção e Refatoração do modal de excluir usuário
    Correção e Refatoração do modal de editar usuário
    Correção do select de nível de acesso no modal de editar usuário(não trazia o valor, ficava em branco)
    Refatoração do painel da dashboard
    Remoção do architect UI
    Otimização do código JS de sidebar
    Correção de links da dashboard
    Remoção de arquivos e imagens não utilizados
    Reorganização da estrutura de arquivos, seguindo um modelo mais otimizado e fácil de uso
    Implementação de modal de editar artigo
    Implementação do editar artigo
    Implementação do modal ao excluir um artigo
    Removido os requireds no cadastro de artigo
    Implementação do modal ao excluir um produto
    Implementação do modal ao editar um produto
    Valor default definido para categoria e tipo no cadastro de um produto
    Correção do compose.yml por causa do padrão de pastas
    Adição dos modais de excluir e editar endereços
    Paginação adicionada a cidades
    Modal de editar e excluir adicionado a cidades
    Correção de links de relatório pdf quebrados
    Adiciona placeholder no cadastro de usuários
    Adiciona placeholder no cadastro de cidades
    Adiciona placeholder no cadastro de produtos
    Adiciona placeholder no cadastro de Artigos
    Adiciona placeholder no cadastro de Endereços
    Adiciona validação em quantidade no cadastro de produtos para aceitar apenas numeros
    Base do cadastro de tags adicionado
    Foto padrão parar envio de produto adicionado 
    Troca de input para um de select de marca no modal de editar produto
    Troca de input para um de select de marca ao cadastrar um produto
    Adição do CRUD de Marcas
    



### 🔑 SISTEMA DE CADASTRO E LOGIN

    N/A

### ⚙️ OUTROS | OTHERS

    Adiciona padrão ao nome de pastas
    Corrigido os links quebrados pela adição do padrão de nomes de pastas
    Centralização dos códigos js
    Exclusão de código js do arcthetc UI
    Renomeção da pasta imagens para images
    Limpeza de imagens via upload não utilizadas, para liberar espaço
    Criação de pasta para biblioteca de terceiros
    movido o ckeditor para a pasta libs que armazena biblioteca de terceiros

### 🐞 Bugs/Inconsistências Relatados

    CkEditor adicionado ao projeto (ainda não funcional).
    Necessário criar uma tela para o usuário normal, atualmente qualquer um cadastrado pode acessar o SISTEMA
    Logo, faz-se necessário criar um controle de níveis de usuários (níveis de acesso).
    Área do Blog precisa de uma atenção especial.
    Por padrão todo usuário cadastrado é do nivel 2(usuario comum)
    Ver mais no carrosel não redireciona para lugar nenhum.
    - Crie um conta não está funcional
    

### ✅ Bugs/Inconsistências Corrigidos na versão atual



### 🚀 Melhorias previstas na próxima versão

- Adicionar carteirinha digital de vacinação para pets
- Formulário de Login animado  
- Sistema de filtros funcionais
