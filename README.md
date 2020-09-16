# Recipes
Projeto feito como parte de processo seletivo para a empresa Digitro

O projeto consiste de dois sub-projetos, a saber:
1) Recipes_api: é a api que disponibiliza as informações. Os dados disponibilizados são obtidos dos arquivos json fornecidos. O arquivo index.php exibe as opções de consulta à api e os parâmetros existentes para cada consulta. Foi incluído um parâmetro não constante dos requisitos, para definição da forma como as receitas com ingredientes próximos ao vencimento são exibidas. Esse parâmetro é opcional e se omitido exibe essas receitas no final da lista (padrão definido nos requisitos). Para maiores detalhes do uso, pode ser consultada a documentaçào da api.
IMPORTANTE: o arquivo ingredients.json foi alterado: 
  . correção de grafia de ingredientes, para compatibilidade com a grafia das receitas (Hum e Brad);
  . alteração das datas (use-by e best-before) para permitir testes com a data atual do sistema. 
  . foi deixado o ingrediente Butter com data use-by vencida. Isso faz com que a receita "Ham and Cheese Toastie" nunca seja exibida, pois tem em sua composição o ingrediente vencido;
  . o ingrediente Eggs foi colocado com data best-before vencida, razão pela qual a receita "Fry-up" seja exibida no final da lista;
 O arquivo original foi mantido na pasta Repositorio. Caso queira utiliza-lo, é necessário renomea-lo.
 
 2) Recipes-teste: projeto para teste da api. Esse projeto carrega a lista de ingredientes disponibilizada pela api de forma assíncrona num componente select. Ao ser escolhido um ingrediente da lista, as receitas que o utilizam são exibidas na página. Foi criado ainda um link para a documentação da api, apenas para possibilitar a consulta.
 
 
  
