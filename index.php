<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Height Calculation</title>
	<meta name="description" content="Height Calculation">
	<!-- CSS local and CDN links-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
        <div class='col-md-6 col-md-offset-3'>
			<div class="page-header">
			  <h2>Height Calculation</h2>
			</div>		
		</div>       
    </div>
    <div class="row">
        <div class='col-md-6 col-md-offset-3'>
			<form  role="form" id="heightCalculate" method="post">				
				<div class="form-group col-sm-8">					
					<input name="height"  id="height" type="text" maxlength="10" placeholder="height" class="form-control" />				
				</div>
				<div class="form-group col-sm-8">
				<select name="sex" id="sex" class="form-control" >
					<option value="">Select Gender</option>
					<option value="female">Female</option>
					<option value="male">Male</option>
				</select>		
				</div>						
				<div class="form-group col-sm-8">
					<button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
				</div>													
			</form>								
        </div>  
		<div class='col-md-6 col-md-offset-3'>
			<div class="form-group alert alert-info" id="showresults"></div>
			<div class="form-group col-sm-8" id="success"></div>
		</div> 
    </div>
</div><!-- End of container -->
<!-- JS CDN  and local links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>