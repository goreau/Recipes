<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<p>Opções de Uso:</p>
		<hr>
		<ul>
			<li>lunch.php?ingrediente=xxx - retorna a lista de receitas contendo o ingrediente pesquisado</li>
			<li>retorno: JSON</li>
			<ul>
				<li>Parâmetros:
					<ul>
						<li>nome: ingrediente</li>
						<li>tipo: string</li>
						<li>método: GET ou POST</li>
						<li>requerido: Sim</li>
						<li>função: filtro de ingrediente para pesquisar receitas</li>
					</ul>
					<ul>
						<li>nome: tipo</li>
						<li>tipo: int (1 ou 2)</li>
						<li>método: GET ou POST</li>
						<li>requerido: Não - padrão 1</li>
						<li>função: retorna lista unica (1) ou separada por vencimento de produto(2)</li>
					</ul>
				</li>
			</ul>
			<hr>
			<li>lista_ingredientes.php - retorna a lista de ingredientes cadastrados</li>
			<li>retorno: JSON</li>
			<ul>
				<li>Parâmetros:
					<ul>
						<li>Essa função não recebe par6ametros</li>
					</ul>
				</li>
			</ul>
		</ul>		
    </body>
</html>