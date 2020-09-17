<?php

/**
 * Description of RecipesTest
 *
 * @author usuario
 */
use PHPUnit\Framework\TestCase as PHPUnit;
require_once '../../Entidades/Recipes.php';

class RecipesTest extends PHPUnit {
	//Funçao de teste da validação de ingredientes
	
	//nenhuma receia pode retornar para um produto vencido
	public function testListaVencido(){
		$receita  = new \Classes\Recipes();
		$receita->listaReceitas('Butter');
		$this->assertTrue(count($receita->result)==0);	
	}
	
	public function testListaProximo(){
		$receita  = new \Classes\Recipes();
		$receita->listaReceitas('Eggs');
		$this->assertTrue(count($receita->result)==0);	
		$this->assertTrue(count($receita->result_venc)==1);	
	}
	
	public function testListaOk(){
		$receita  = new \Classes\Recipes();
		$receita->listaReceitas('Bread');
		$this->assertTrue(count($receita->result)==0);	
		$this->assertTrue(count($receita->result_venc)==1);	
	}	
	
}
