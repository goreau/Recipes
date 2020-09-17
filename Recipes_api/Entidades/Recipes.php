<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Recipes
 *
 * @author usuario
 */
namespace Classes;

class Recipes {
	private $title, $ingredients;
	private $dados;
	private $result, $result_venc;
	
	
	function __construct() {
		//carrega o arquivo json de referencia
		if (!defined('ARQUIVO')) define ('ARQUIVO', __DIR__ .'/Repositorio/recipes.json');

		$file = file_get_contents(ARQUIVO);
		
		$this->dados = json_decode($file, true);
	}
	
	
	
	function listaReceitas($ingrediente){
		$teste2 = new Ingredients();
		
		//array para receitas sem problema de vencimento
		$this->result = array();
		//array para receitas com produtos próximos ao vencimento
		$this->result_venc = array();
		
		//verifica a situação de cada ingrediente das receitas que usam o recipiente pesquisado
		foreach($this->dados['receipes'] as $item){
			$conteudo = $item['ingredients'];
			$vencido  = FALSE;
			if (in_array($ingrediente, $conteudo)){					
				foreach ($item['ingredients'] as $ingr){
					$res = $teste2->validaIngrediente($ingr);
					if ($res<0) {
						break;						
					} else if ($res==0){
						$vencido = TRUE;
					}	
				}
				if ($res<0)	{
					//se tem ingrediente vencido, não usa a receita
					continue;
				} else {
					//se tem recipiente próximo ao vencimento, usa array especifico 
					if ($vencido){
						array_push($this->result_venc , $item);
					} else {
						//se nao tem recipiente próximo ao vencimento, usa array normal
						array_push($this->result , $item);
					}
				}
			}
		}
	}
	
	public function __get($key) {
		return $this->$key;
	}
	
}
