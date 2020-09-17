<?php

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
		//abre o arquivo com os dados dos ingredientes
		if (!defined('ARQUIVO2')) define ('ARQUIVO2', __DIR__ .'/Repositorio/Ingredients.json');
		
		$file = file_get_contents(ARQUIVO2);//$arquivo);
		
		$this->dados = json_decode($file,true);
	}
	
	/*método para verificar as validades dos ingredientes
	 * Retorna -1 para vencido, 0 para na validade mas best-before expirado
	 * Retorna 1 para sem vencimentos
	*/
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
	
	//retorna a lista dos ingredientes. Pode ser usado para popular um select ou outras exibções
	public function lista(){
		$array = $this->dados['ingredients'];
		return $array;
	}
}
