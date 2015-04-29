@extends('layout')

@section('title')
    Add Drink
@stop

@section('content')
    <h1>Add a Drink to the Database</h1>

    <?php if (Session::has('success')): ?>
        <p class="success"><?php echo Session::get('success'); ?></p>
    <?php endif; ?>

    @foreach ($errors->all() as $error)
        <p> {{ $error }} </p>
    @endforeach

    <?php
        if(isset($_GET["id"]))
        {
            $data = $_GET["id"];
        }
    ?>

    <form method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-group">
            <label for="name">Name</label>
            @if(isset($_GET["id"]))
            <input type="text" id="name" name="name" class="form-control" value="{{$data}}">
            @else
            <input type="text" id="name" name="name" class="form-control" value="{{Request::old('name')}}">
            @endif
        </div>
        <div class="form-group">
            <label for="ounces">Ounces</label>
            <input type="ounces" id="ounces" name="ounces" class="form-control" value="{{Request::old('ounces')}}">
        </div>
        <div class="form-group">
            <label for="calories">Calories</label>
            <input type="calories" id="calories" name="calories" class="form-control" value="{{Request::old('calories')}}">
        </div>
        <div class="form-group">
            <label for="fat">Fat in grams</label>
            <input type="fat" id="fat" name="fat" class="form-control" value="{{Request::old('fat')}}">
        </div>
        <div class="form-group">
            <label for="cholesterol">Cholesterol in milligrams</label>
            <input type="cholesterol" id="cholesterol" name="cholesterol" class="form-control" value="{{Request::old('cholesterol')}}">
        </div>
        <div class="form-group">
            <label for="sodium">Sodium in milligrams</label>
            <input type="sodium" id="sodium" name="sodium" class="form-control" value="{{Request::old('sodium')}}">
        </div>
        <div class="form-group">
            <label for="carbohydrate">Carbohydrate in grams</label>
            <input type="carbohydrate" id="carbohydrate" name="carbohydrate" class="form-control" value="{{Request::old('carbohydrate')}}">
        </div>
        <div class="form-group">
            <label for="fiber">Fiber in grams</label>
            <input type="fiber" id="fiber" name="fiber" class="form-control" value="{{Request::old('fiber')}}">
        </div>
        <div class="form-group">
            <label for="sugar">Sugar in grams</label>
            <input type="sugar" id="sugar" name="sugar" class="form-control" value="{{Request::old('sugar')}}">
        </div>
        <div class="form-group">
            <label for="protein">Protein in grams</label>
            <input type="protein" id="protein" name="protein" class="form-control" value="{{Request::old('protein')}}">
        </div>

        <input type="submit" value="Add Drink." class="btn btn-primary">
    </form>
@stop