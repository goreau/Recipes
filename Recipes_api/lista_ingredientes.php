<?php

	require "vendor/autoload.php";
	use Classes\Ingredients;
	$ingredientes = new Ingredients();

	$ret_arr = $ingredientes->lista();

	if (count($ret_arr)>0){
		// set response code - 200 OK
		http_response_code(200);

		echo json_encode($ret_arr);
	} else {
		// set response code - 404 Not found
		http_response_code(404);

		echo json_encode(
				array("message" => "Nenhum ingrediente encontrado.")
		);
	}