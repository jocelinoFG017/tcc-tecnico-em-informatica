# Sobre a atualização 1.5 (v1.5)

### 🗄️ BASE DE DADOS
- Atualização do .sql do banco de dados  
- Adição da tabela `tipo` linkada a tabela produto  
- Inserção do estadoId na tabela cidade (a coluna tinha, mas tava tudo null)  
- Adição da tabela `categoria` linkada a tabela produto  
- Adição da tabela `nívelAcesso` linkada a tabela usuario  

### 📂 PÁGINAS/PASTAS ATUALIZADAS
- Header.php refeito  
- Slider de index.php refeito  
- Footer refeito  
- Contato renomeado para sobre.php  
- Criada uma nova página para contato.php  
- blog.php atualizado  
- shop.php atualizado  
- Adição da pasta buscar que serve para realizar consultras de busca  
- Página sobre.php atualizada  

### 📊 DASHBOARD
- Correção de bug no cadastro de endereço  
- Correção dos erros de versão do fpdf  
- Adição de página de cadastro de cidade (Cadastro ainda não realizado)  
- Total de usuários cadastrados no sistema exibido na dashboard
- Adicionado modal de confirmação para exclusão de usuários
- Adicionado o nivel de acesso do usuário no header da dashboard
- Adicionado edição de usuários na dashboard
- Adicionado exclusão de endereços na dashboard

### 🔑 SISTEMA DE CADASTRO E LOGIN
- Cadastro de usuário pela página criarConta.php adicionado  

### ⚙️ OUTROS | OTHERS
- Adição de ambiente dockerizado ao projeto  
- Adição de padrões de commit ao projeto  
- Atualização do ano no Rodapé, otimização do código e ortografia  
- Correção de caminhos dos assets em diversos arquivos  
- Correções nos arquivos de conexão com o banco de dados  
- Correções nos arquivos docker-compose.yml e Dockerfile  
- Estruturação de templates para header e footer  
- Estruturação de pastas para assets (css, js, imagens)  
- Adição de nova logo  
- Adição do Bootstrap 5 ao projeto substituindo o Bootstrap 3  
- Adição de filtros no index.php (ainda não funcionais)  
- Refatoração do código de index, footer e header.  
- Refatoração de diversas páginas...  
- Adicionado instruções de como rodar o projeto ao README  
- Implementação de seleção dinâmica de cidade ao selecionar estado no cadastro de endereço  
- Atualização da versão do fpdf para a versão 1.86  
- Adicionado mapa no arquivo sobre.php  
- Adicionado tabela de endereços no arquivo sobre.php  
- Formulário de contato adicionado (não funcional ainda)  
- Página de cadastro de cidade criada e funcional  
- Página de cadastro de endereço corrigida e funcional  
- Adicionada página carrinho.php (não funcional ainda)  
- Adicionada página de Política de Privacidade  
- Adicionada página de Termos de Uso  
- Adicionada página de FAQ  
- Adicionada formulário de contato  
- Otimizados diversos códigos PHP  
- Adicionada página detalhes do produto  
- Adicionada página de listagem de produtos (shop.php)  
- Adicionada página de Criar Conta  
- Remoção de aba observações no logVersao.md(Seu conteúdo foi adicionado em bugs/inconsistências relatados)
- Adição de modal ao excluir registros
- Página blog.php atualizada (ainda não funcional)

### 🐞 Bugs/Inconsistências Relatados
- CkEditor adicionado ao projeto (ainda não funcional).  
- Necessário criar uma tela para o usuário normal, atualmente qualquer um cadastrado pode acessar o SISTEMA  
- Logo, faz-se necessário criar um controle de níveis de usuários (níveis de acesso).  
- Área do Blog precisa de uma atenção especial.  
- Por padrão todo usuário cadastrado é do nivel 2(usuario comum)
- Ver mais no carrosel não redireciona para lugar nenhum.

### ✅ Bugs/Inconsistências Corrigidos na versão atual
- tabela `endereco` agora NÃO mostra os dados corretamente.  
- Inicio -> Produtos não mostra nada.  
- Detalhes do produto EM DESTAQUE redireciona para uma página inexistente.  
- Detalhes do produto em MAIS VENDIDOS redireciona para uma página sem conteúdo.  
- Não é possível cadastrar/gravar um novo endereço.  
- Qualquer Editar exclui registros.  
- Pdf's em geral estão com erros.  
- Crie uma conta na tela de login não redireciona a lugar nenhum 
- Produto precisa de um novo atributo chamado `categoria`.  

### 🚀 Melhorias previstas na próxima versão
- Sistema de níveis de acesso ao usuários, com acesso a telas diferentes dependendo do seu grau de autorização dentro do sistema.  
- Finalização do Remake do modelo.mwb.  
- Adicionar carteirinha digital de vacinação  
- Estados terem sigla, e nos relatórios pegar a sigla  
- Formulário de Login animado  
- Logar com o google
- Formulário de contato funcional
- Sistema de busca funcional
- Sistema de filtros funcionais
- Sistema de blog funcional
- Sistema de carrinho funcional
