<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/recipes.css">
        <title></title>
    </head>
    <body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">					 
					<div class="card">
						<div class="card-header">Consultar Receitas</div>
						<div class="card-body">
								<div class="form-group row">
									<label for="ingrediente" class="col-md-4 col-form-label text-md-right">Ingrediente:</label>
									<div class="col-md-8">
										<select name="ingrediente" id="ingrediente" class="form-control">
											
										</select>
									</div>
								</div>
							<div id="resultado">Selecione um ingrediente para ver as receitas associadas</div>
						</div>
						<div class="card-footer"><a href="./../Recipes_api/index.php" target="_blank" class="btn btn-info" role="button" >Documentação da API</a></div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$.ajax({
						method: "POST",
						url: "./../Recipes_api/lista_ingredientes.php",
						dataType: "html"
					})
					.done(function( json ) {
						let link = './Controllers/testeController.php?combo=1&ingredientes='+encodeURIComponent(json);
						$('#ingrediente').load(link);
					})
					.fail(function(msg) {
						json = JSON.parse(msg.responseText);
						$('#resultado').html(json.message);
					});
				
		
				$('#ingrediente').on('change',function(){
					let val = $("#ingrediente").val();// option:selected" ).text();
					$.ajax({
						method: "POST",
						url: "./../Recipes_api/lunch.php",
						data: { 'ingrediente': val },
						dataType: "html"
					})
					.done(function( json ) {
						let link = './Controllers/testeController.php?resultado='+ encodeURIComponent(json);
						$('#resultado').load(link);
					})
					.fail(function(msg) {
						json = JSON.parse(msg.responseText);
						$('#resultado').html(json.message);
					});
				});
			});
		</script>
    </body>
</html>