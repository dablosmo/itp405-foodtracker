@extends('layout')

@section('title')
    Calculated Results
@stop

@section('content')
	<h1>Your Calculations.</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Calories (kCal)</th>
				<th>Fat (g)</th>
				<th>Cholesterol (mg)</th>
				<th>Sodium (mg)</th>
				<th>Carbohydrate (g)</th>
				<th>Fiber (g)</th>
				<th>Sugar (g)</th>
				<th>Protein (g)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$total_calories}}</td>
				<td>{{$total_fat}}</td>
				<td>{{$total_cholesterol}}</td>
				<td>{{$total_sodium}}</td>
				<td>{{$total_carbohydrate}}</td>
				<td>{{$total_fiber}}</td>
				<td>{{$total_sugar}}</td>
				<td>{{$total_protein}}</td>
			</tr>
		</tbody> 
	</table>
@stop