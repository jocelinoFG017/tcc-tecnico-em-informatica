
Sobre a atualização 1.4 (v1.4)


** ## BASE DE DADOS ## **
- Correções no insert de artigos


** ## PÁGINAS/PASTAS ATUALIZADAS ## **
- Sidebar/sidebarProduto.php  esse arquivo foi excluído.
- Sidebar/sidebarUsuario.php agora, chama-se sidebar.php
- A pasta `ItensNãoUtilizados` e seus arquivos foi deletados(as).

- ## DASHBOARD ##
- Retirados alguns componentes da dash que permaneciam da versão do template.


- ## SISTEMA DE LOGIN ##
- Melhorias e correções feitas na tela de login.


- ## SISTEMA DE CADASTRO ##
- Tabela `produto`, agora fotos podem ser gravadas junto ao produto.


### OUTROS | OTHERS
- Adição de ambiente dockerizado ao projeto
- Adição de padrões de commit ao projeto
- Atualização do ano do Rodapé, otimização do código e ortografia
- Correção de caminhos dos assets no arquivo index.php
- Correções nos arquivos de conexão com o banco de dados
- Correções nos arquivos docker-compose.yml e Dockerfile


- ## Bugs/Inconsistências Relatados ##
- - CkEditor adicionado ao projeto(ainda não funcional).
- - Pdf's em geral estão com erros.
- - Qualquer Editar exclui registros.
- - tabela `endereco` agora NÃO mostra os dados corretamente.
- - Não é possível cadastrar/gravar um novo endereço.
- - Crie uma conta na tela de login não redireciona a lugar nenhum
- - Inicio-> Produtos não mostra nada.
- - Detalhes do produto EM DESTAQUE redireciona para uma página inexistente.
- - Detalhes do produto em MAIS VENDIDOS redireciona para uma página sem conteúdo.


- ## Bugs/Inconsistências Corrigidos ##
- sem bugs corrigidos.


- ## Observações ##
- Necessário criar uma tela para o usuário normal, atualmente qualquer um cadastrado pode acessar o SISTEMA
- Logo,faz-se Necessário criar um controle de niveis de usuarios(niveis de acesso).
- Area do Blog precisa de uma atenção especial.
- Produto precisa de um novo atributo chamado `categoria`.


- ## Mudanças previstas no próximo update ##
- - Sistema de niveis de acesso ao usuários, com acesso a telas diferentes dependendo do seu
grau de autorização dentro do sistema.
- - Finalização do Remake do modelo.mwb.