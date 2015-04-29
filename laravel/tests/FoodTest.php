<?php

class FoodTest extends TestCase
{
	public function testValidateReturnsFalseIfFoodNameIsMissing()
	{
		$validation = \App\Models\Food::validate([]); 
		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueifFoodNameGramsAndCaloriesIsPresent()
	{ 
		$validation = \App\Models\Food::validate([
			'name' => 'Food Name', 
			'grams' => 100,
			'calories' => 500
		]); 
		$this->assertEquals($validation->passes(), true);
	}

	public function testValidateReturnsFalseifGramsIsMissing()
	{ 
		$validation = \App\Models\Food::validate([
			'name' => 'Food Name', 
			'calories' => 500
		]); 
		$this->assertEquals($validation->passes(), false);
	}
}