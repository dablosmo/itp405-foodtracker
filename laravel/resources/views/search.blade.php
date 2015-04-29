@extends('layout')

@section('title')
    Search Food
@stop

@section('content')

	<h1>Food Search.</h1>

	@foreach ($errors->all() as $error)
        <p> {{ $error }} </p>
    @endforeach

    <div> 
    	<form action="/search_results" method="get"> 
    		<div class="form-group">
	            <label for="food_name">Food Name</label>
	            <input type="text" id="food_name" name="food_name" class="form-control" value="{{Request::old('food_name')}}">
	        </div>
	        <input type="submit" value="Search.">
    	</form>
    </div>

@stop