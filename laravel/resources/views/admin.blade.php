<!DOCTYPE html> 
<html>
<head> 
	<title>FoodTracker</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
</head> 
<body> 

<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
  </div>
  <a class="navbar-brand" href="/">FoodTracker.</a>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
    </ul>
    <ul class="nav navbar-nav navbar-right">

    @if(Auth::check())
      <li><a href="/admin">Dashboard. </a></li>
  	  <li><a href="/add_food">Add Food.</a></li>
      <li><a href="/add_drink">Add Drink.</a></li>
  	  <li><a href="/search">Search Entries.</a></li>
  	  <li><a href="/logout">Logout.</a></li>
    @else
      <li><a href="/login">Log In</a></li>
      <li><a href="/signup">Sign Up</a></li>
    @endif

    </ul>
  </div>
</nav>

<div class="container"> 
	<h1>Admin Dashboard</h1>

    <a href="{{url('manage')}}">Manage Users</a>

    <a href="{{url('logout')}}">Logout</a>
</div> 

</body> 
</html>