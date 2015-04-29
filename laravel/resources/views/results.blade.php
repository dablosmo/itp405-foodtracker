@extends('layout')

@section('title')
    Search Result
@stop

@section('content')

	<h1>Search Results.</h1>

	@if($usdaData) 
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Commercial offerings with specified ingredient.</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($usdaData as $dataEntry)
				<tr>
					<td>
						{{$dataEntry['name']}}

						<a href="add_food?id=<?php echo $dataEntry['name'];?>">+</a>
					</td>

				</tr>
				@endforeach
			</tbody> 
		</table>
	@else 
		<h1>Something went wrong. Click the link to go back to the search page.</h1> 
		<a href="search"> Back. </a>
	@endif

@stop