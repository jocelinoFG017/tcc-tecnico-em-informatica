# Sobre a atualização 1.6 (v1.6)

### 🗄️ BASE DE DADOS
- Modificações na tabela artigo (blog), adicionada a coluna tag, tag2 e tag3 para facilitar a categorização dos artigos.
- Adição do campo foto em artigo (blog).

### 📂 PÁGINAS/PASTAS ATUALIZADAS
- produtoDetalhes.php
- produtoLista.php
- cssflex.css (novo arquivo)
- conexao.php (pequena modificação para evitar erros de conexão)
- sobre.php (pequena modificação no layout)
- footer.php (pequena modificação no rodapé)
- header.php (pequena modificação no menu)
- Adição do gitignore
- Adição do composer.json e composer.lock
- Adição do arquivo .env.example
- blog.php (pequena modificação no layout)
- contato.php (pequena modificação no layout e funcionalidade)
- Adição da página partners.php (parceiros)
- Adição da pasta vendor (bibliotecas do composer)(Removida do versionamento via .gitignore)
- Adição da pasta phpmailer (biblioteca para envio de e-mails)
- artigo.php cadastroArtigo.php (página para cadastro de artigos no blog) e tabelaArtigo.php (listagem dos artigos do blog) na pasta Cadastrar
- Adição da pasta CkEditor (editor de texto para o blog)
- Adição dos arquivos de login com o Google
- 

### 📊 DASHBOARD
- Cadastro de artigos (blog) funcional.
- Listagem de artigos (blog) funcional.

### 🔑 SISTEMA DE CADASTRO E LOGIN
- Agora é possível logar com o Google (funcional).
- Sistema de níveis de acesso ao usuários, com acesso a telas diferentes dependendo do seu grau de autorização dentro do sistema.  
- 

### ⚙️ OUTROS | OTHERS
- Otimização da exibição dos produtos na página de listagem, agora os nomes longos não quebram mais o layout.
- Filtro por desconto removido, visto que não há mais essa funcionalidade no sistema.
- Buscar Produto funcional.
- Categorias ajustadas para melhor entendimento.
- Detalhes do produto funcional.
- Remoção da tabela endereço na página sobre.php
- Otimização do código em várias páginas.
- Adição do phpMailer para envio de e-mails.
- Formulário de contato funcional.
- Adição de variáveis de ambiente para maior segurança.
- Adição do autoload do composer.
- Pequenas melhorias no layout.
- Área do blog com layout melhorado e pegando os artigos do banco de dados.
- CkEditor atualizado para a versão 5.
- Cadastros de artigos (blog) funcional.
- Exclusão de artigos (blog) funcional.
- Definição de fuso horário para evitar erros de data/hora no docker e no banco de dados.
- Pequenas correções no docker-compose.yml
- Adição do arquivo .env.example para facilitar a criação do arquivo .env
- Adição do arquivo .gitignore para evitar o versionamento de arquivos desnecessários.
- Sincronização do carrosel da página inicial com os artigos do blog.
- Ver mais no carrosel redireciona para o artigo correto.
- Adicionado o login com o Google (funcional).
- Variaveis de ambiente atualizadas para maior segurança.
- Sistema de carrinho funcional.


### 🐞 Bugs/Inconsistências Relatados
- Crie um conta não está funcional


### ✅ Bugs/Inconsistências corrigidos e melhorias previstas adicionadas na versão atual
- Área do Blog precisa de uma atenção especial.  
- Formulário de contato funcional
- Sistema de busca funcional
- Sistema de blog funcional
- CkEditor adicionado ao projeto (ainda não funcional).
- Ver mais no carrosel não redireciona para lugar nenhum.
- Estados terem sigla, e nos relatórios pegar a sigla  
- Sistema de carrinho funcional
- Sistema de níveis de acesso ao usuários, com acesso a telas diferentes dependendo do seu grau de autorização dentro do sistema.  
- Necessário criar uma tela para o usuário normal, atualmente qualquer um cadastrado pode acessar o SISTEMA  
- Logo, faz-se necessário criar um controle de níveis de usuários (níveis de acesso).  
- Logar com o google
- Por padrão todo usuário cadastrado é do nivel 2(usuario comum), vai ser assim por segurança, para evitar que alguém se cadastre e já seja admin.
- Finalização do Remake do modelo.mwb.  

### 🚀 Melhorias previstas na próxima versão
- Adicionar carteirinha digital de vacinação para pets
- Formulário de Login animado  
- Sistema de filtros funcionais