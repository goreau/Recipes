<?php

/**
 * Description of IngredientsTest
 *
 * @author usuario
 */

use PHPUnit\Framework\TestCase as PHPUnit;
require_once '../../Entidades/Ingredients.php';

class IngredientsTest extends PHPUnit {
	
	//Funçao de teste da validação de ingredientes
	//Butter está vencida, então precisa retornar negativo
	public function testValidaVencido(){
		$ingrediente  = new \Classes\Ingredients();
		$this->assertEquals(-1, $ingrediente->validaIngrediente('Butter'));	
	}
	
	//Eggs ainda não venceu, mas ja passou a data best-before, então deve retornar zero
	public function testValidaProximo(){	
		$ingrediente  = new \Classes\Ingredients();
		$this->assertEquals(0, $ingrediente->validaIngrediente('Eggs'));	
	}
	
	//Bread esta dentro das validades, deve retornar positivo
	public function testValidaOk(){		
		$ingrediente  = new \Classes\Ingredients();
		$this->assertEquals(1, $ingrediente->validaIngrediente('Bread'));	
	}
}