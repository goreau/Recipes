<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	require "vendor/autoload.php";
	use Classes\Ingredients;
	use Classes\Recipes;

	$teste = new Recipes();
	
	
	if (filter_input(INPUT_POST, 'ingrediente')){
		$search = filter_input(INPUT_POST, 'ingrediente');
	} else if (filter_input(INPUT_GET, 'ingrediente')){
		$search = filter_input(INPUT_GET, 'ingrediente');
	} else {
		http_response_code(404);
  
		echo json_encode(
			array("message" => "Parametro obrigatorio 'ingrediente' nao informado.")
		);
		
		return false;
	}
	
	if (filter_input(INPUT_POST, 'tipo')){
		$tipo = filter_input(INPUT_POST, 'tipo');
	} else if (filter_input(INPUT_GET, 'tipo')){
		$tipo = filter_input(INPUT_GET, 'tipo');
	} else {
		$tipo = 1;
	}
	
	$teste->listaReceitas($search);
	$res = array();
	
	if ($tipo==2){
		$parte = $teste->result;
		if (count($parte)>0){
			$res = array("receitas"=>$parte);
		}

		$parte = $teste->result_venc;
		if (count($parte)>0){
			array_push($res, array("receitas com ingredientes proximos ao vencimento"=>$parte));
		}
	} else {
		if (count($teste->result)>0){
			$parte = $teste->result;
		} else {
			$parte = array();
		}
		foreach($teste->result_venc as $item){
		//if (count($teste->result_venc)>0){
			array_push($parte, $item);
		}
		if (count($parte)>0){
			$res = array("receitas"=>$parte);
		}
	}
	
	
	if (count($res)>0){	
		http_response_code(200);

		echo json_encode($res);
	} else {
		http_response_code(404);
  
		echo json_encode(
			array("message" => "Nenhuma receita encontrada para o produto.")
		);
	}