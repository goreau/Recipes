<?php



if (filter_input(INPUT_GET, 'resultado')){
	$json = urldecode(filter_input(INPUT_GET, 'resultado'));
	
	//var_dump($json);die();
	
	$var = json_decode($json, true);
	
	$array = $var['receitas'];

	echo "<h4>Receitas:</h4>";
	
	foreach ($array as $item){
		echo "<b>Nome: </b>". $item['title'] . "<br>";
		$ingr = implode(', ', $item['ingredients']);
		echo "<b>Ingredientes:</b> $ingr <br>";		
		echo "<hr>";
	}
	
} 

if (filter_input(INPUT_GET, 'combo')){
	$json = urldecode(filter_input(INPUT_GET, 'ingredientes'));
		$now = date('Y-m-d');
		$array = json_decode($json, true);
		echo "<option value=\"0\">-- Selecione --</option>";
		foreach ($array as $item){
			echo "<option value=\"".$item['title']."\">".$item['title']."</option>";
		}
}