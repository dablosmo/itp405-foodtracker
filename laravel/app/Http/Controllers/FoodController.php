<?php 

namespace App\Http\Controllers; 

use \App\Models\Food;
use \App\Models\Drink;
use Illuminate\Http\Request;
use \App\Services\UsdaAPI;

class FoodController extends Controller
{
	public function onStart()
	{
		$foods = (new Food())->getFoods();
		$drinks = (new Drink())->getDrinks();

		return view('home_page', [
			'foods' => $foods,
			'drinks' => $drinks
		]);
	}

	public function add_page()
	{
		return view('add_food');
	}

	public function add_food(Request $request)
	{
		$FoodEntry = new Food();

		if($request->all())
		{
			$validator = $FoodEntry->validate($request->all()); 
			if($validator->passes())
			{
				$FoodEntry->insert([
					'name' => $request->input('name'), 
					'grams' => $request->input('grams'), 
					'calories' => $request->input('calories'),
					'fat' => $request->input('fat'),
					'cholesterol' => $request->input('cholesterol'),
					'sodium' => $request->input('sodium'),
					'carbohydrate' => $request->input('carbohydrate'),
					'fiber' => $request->input('fiber'),
					'sugar' => $request->input('sugar'),
					'protein' => $request->input('protein'),
				]);

				return redirect('add_food')
						->with('success', '"' . $request->input('name') . '" inserted successfully.');
			}

			return redirect('add_food')->withErrors($validator)->withInput();

		}
		
	}

	public function add_drink()
	{
		return view('add_drink');
	}

	public function insert_drink(Request $request)
	{
		$DrinkEntry = new Drink(); 

		if($request->all()) 
		{
			$validator = $DrinkEntry->validate($request->all()); 
			if($validator->passes()) 
			{ 
				$DrinkEntry->insert([
					'name' => $request->input('name'), 
					'ounces' => $request->input('ounces'), 
					'calories' => $request->input('calories'),
					'fat' => $request->input('fat'),
					'cholesterol' => $request->input('cholesterol'),
					'sodium' => $request->input('sodium'),
					'carbohydrate' => $request->input('carbohydrate'),
					'fiber' => $request->input('fiber'),
					'sugar' => $request->input('sugar'),
					'protein' => $request->input('protein'),
				]);

				return redirect('add_drink')
						->with('success', '"' . $request->input('name') . '" inserted successfully.');
			}

			return redirect('add_drink')->withErrors($validator)->withInput();
		}
	}

	public function search_page()
	{
		return view('search');
	}

//search DB
	public function search(Request $request)
	{
		$foods = (new Food())->search($request->input('food_name')); 
		var_dump($foods);
	}

//search API
	public function api_search(Request $request)
	{
		$usda_api = UsdaAPI::search($request->input('food_name'));

		return view('results', [
			'usdaData' => $usda_api
		]);
	}

	public function calculate(Request $request) 
	{
		$total_calories = 0; 
		$total_fat = 0; 
		$total_cholesterol = 0; 
		$total_sodium = 0; 
		$total_carbohydrate = 0; 
		$total_fiber = 0;
		$total_sugar = 0;
		$total_protein = 0;

		foreach($request->input('select_food') as $data)
		{
			$food_data = (new Food())->search($data); 
			if($food_data == null)
			{
				$food_data = (new Drink())->search($data);
			}
			$total_calories += $food_data[0]->calories;
			$total_fat += $food_data[0]->fat;
			$total_cholesterol += $food_data[0]->cholesterol;
			$total_sodium += $food_data[0]->sodium;
			$total_carbohydrate += $food_data[0]->carbohydrate;
			$total_fiber += $food_data[0]->fiber;
			$total_sugar += $food_data[0]->sugar;
			$total_protein += $food_data[0]->protein;
		}

		return view('calculated_results', [
			'total_calories' => $total_calories,
			'total_fat' => $total_fat,
			'total_cholesterol' => $total_cholesterol,
			'total_sodium' => $total_sodium,
			'total_carbohydrate' => $total_carbohydrate,
			'total_fiber' => $total_fiber,
			'total_sugar' => $total_sugar,
			'total_protein' => $total_protein
		]);
	}
}