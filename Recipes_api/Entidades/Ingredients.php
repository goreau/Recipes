<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ingredients
 *
 * @author usuario
 */
namespace Classes;

class Ingredients {
	private $title, $best_before, $use_by;
	private $dados;
	
	
	function __construct() {
		define ('ARQUIVO2', './Repositorio/Ingredients.json');

		$file = file_get_contents(ARQUIVO2);
		
		$this->dados = json_decode($file,true);
	}
	
	public function validaIngrediente($ingrediente){
		$array = $this->dados['ingredients'];
		$idx = array_search($ingrediente, array_column($array, 'title'));
		if($idx){
			if ($array[$idx]['use-by'] < date('Y-m-d')){
				return -1;
			}	
			if ($array[$idx]['best-before'] < date('Y-m-d')){
				return 0;
			}	
		}
		return 1;
	}
	
	//função não utilizada - serve para teste na api
	public function combo(){
		$now = date('Y-m-d');
		$array = $this->dados['ingredients'];
		echo "<option value=\"0\">-- Selecione --</option>";
		foreach ($array as $item){
			echo "<option value=\"".$item['title']."\">".$item['title']."</option>";
		}
	}
	
	public function lista(){
		$array = $this->dados['ingredients'];
		return $array;
	}
}
