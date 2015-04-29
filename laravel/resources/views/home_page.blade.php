<!DOCTYPE html> 
<html>
<head> 
	<title>FoodTracker</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
	<script type="text/javascript">

	//Dynamically add row to form
	    $(document).ready(function() {
	        $("#add").click(function() {
	          $('#formTable tbody>tr:last').clone(true).insertAfter('#formTable tbody>tr:last');
	          return false;
	        });
	    });

	//Dynamically remove row from form
	    function deleteRow(el) 
	    {
			while (el.parentNode && el.tagName.toLowerCase() != 'tr') {
				el = el.parentNode;
			}
			if (el.parentNode && el.parentNode.rows.length > 1) {
				el.parentNode.removeChild(el);
			}
		}
	</script>
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
    <ul class="nav navbar-nav navbar-center">

    </ul>
    <ul class="nav navbar-nav navbar-right">
      @if(Auth::check())
      	  <li><a href="/dashboard">Dashboard. </a></li>
	      <li><a href="/add_food">Add Food.</a></li>
	      <li><a href="/add_drink">Add Drink.</a></li>
	      <li><a href="/search">Search Entries.</a></li>
	      <li><a href="/logout">Logout.</a></li>
      @else
          <li> Log in to add your own custom foods! </li>
	      <li><a href="/login">Log In</a></li>
	      <li><a href="/signup">Sign Up</a></li>
      @endif
    </ul>
  </div>
</nav>

<center><img src="http://cdn.sixrevisions.com/0394-01_free_food_icons_thumbnail.jpg" ></center>

<div class="container"> 

	<center><h1>What are you eating?</h1></center>

	<form method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<table id="formTable" class="table">
			<tbody>
				<tr>
					<td>
						<select name="select_food[]" class="form-control">
							<?php foreach ($foods as $food){?>
								<option value="<?php echo $food->name ?>">
									<?php echo $food->name ?>
								</option>
							<?php } ?>

							<?php foreach ($drinks as $drink){?>
								<option value="<?php echo $drink->name ?>">
									<?php echo $drink->name ?>
								</option>
							<?php } ?>
						</select>
						<a id="add">Add another food entry.</a>
						<input type="button" value="Delete food entry." class="btn" onclick="deleteRow(this);">
					</td>
				</tr>
			</tbody>
		</table> 

		<center><input type="submit" value="Calculate Nutrition." class="btn btn-primary"></center>
	</form>

</div> 

</body> 
</html>