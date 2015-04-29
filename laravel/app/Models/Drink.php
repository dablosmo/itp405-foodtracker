<?php 

namespace App\Models; 
use DB; 
use Validator;
use \App\Services\UsdaAPI;

class Drink
{
	public static function validate($input)
	{
		$required = [
			'name' => 'required', 
			'ounces' => 'required|integer',			
			'calories' => 'required|integer',
		];

		return Validator::make($input, $required);
	}

	public function getDrinks()
	{
		return DB::table('drinks')->get();
	}

	public function search($term)
	{
		$query = DB::table('drinks')
			->select(DB::raw('drinks.id, name, ounces, calories, fat, cholesterol, sodium, carbohydrate, sugar, protein, fiber'));
		
		if($term && $term != "" && $term != "Search...")
		{
			$query->where('name', 'LIKE', '%'. $term .'%');
		}

		$query->orderBy('name'); 
		return $query->get();
	}

	public function insert($drink)
	{
		DB::table('drinks')->insert($drink);
	}
}