<?php 

class UsdaTest extends TestCase 
{
	public function tearDown()
	{
		Mockery::close();
	}

	public function testSearchPullsFromCache()
	{
		$client = Mockery::mock('App\Services\Client');

		$cache = Mockery::mock('Illuminate\Cache\Repository'); 
		$cache->shouldReceive('has')->with('chicken')->andReturn(true);

		$usda = new App\Services\UsdaAPI($cache, $client); 
		$results = $usda->testSearch('chicken'); 
		$name = "APPLEBEE'S, chicken tenders, from kids' menu";
		$this->assertEquals($results, "found"); 
	}
}