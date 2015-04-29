<?php 

namespace App\Services; 
use Illuminate\Support\Facades\Cache; 

class UsdaAPI
{
	protected $cache; 
	protected $client;

	public function __construct(\Illuminate\Cache\Repository $cache, $client) 
	{
		$this->cache = $cache; 
		$this->client = $client;
	}

	public function testSearch($food_name)
	{
		if ($this->cache->has($food_name))
		{
			return "found";
		}
		return "not found";
	}

	public static function search($food_name)
	{ 
		$food = urlencode($food_name); 

		if(Cache::has("usda-$food_name"))
		{
			$food_data = Cache::get("usda-$food_name");
			return $food_data;
		}
		else
		{
			$url = "http://api.nal.usda.gov/usda/ndb/search/?format=json&q=$food_name&sort=n&max=25&offset=0&api_key=8nKpLOO5sTzx31IAnbuxaAlqcgV8r9m7g4jj0aTg";
			$jsonString = file_get_contents($url); 
			$data = json_decode($jsonString, true); 
			$food_data = $data['list']['item'];

			Cache::put("usda-$food_name", $food_data, 60);

			return $food_data;

		}
	}
}