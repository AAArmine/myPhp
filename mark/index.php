
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	 
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">
		.div{
			width: 650px;
			margin: auto;
			height: 200px;
			margin-top: 20px;
		}

		.button {
		
			color: white;
			padding: 7px;
			box-shadow: 2px 2px 3px #888888;
			text-align: center;
		}
		
		a {
			color: white;
			text-decoration: none;
		}

		a:hover{
			color: white;
			text-decoration: none;
		}

		.button:hover {			
			box-shadow: none;
			background-color: grey;
			cursor: pointer;
		}

		.borderr {
			border: 2px solid #1e1b2380; 
			padding-top: 0; 
			padding: 50px; 
			width:600px; 
			height: 250px; 
			margin-bottom: 100px;

		}
		#reg {
			background-color: #5520c5;
			margin-top:0px;

		}
	

		#log {
			background-color: #81de26ed; 
			margin-top:50px;

		}
		#reg:hover, #log:hover {
			background-color: grey; 

		}

	
	</style>
</head>
<body style="font-size: 22px;">
	<div class='div'>

		<div class='borderr'>
			<a href="teachreg.php"><div class="button" id="reg">Register as a teacher</div></a>

			<a href="tlogin.php"><div class="button" id="log">Login as teacher</div></a>
		</div>

		<div class='borderr'>

			<a href="studreg.php"><div class="button" id="reg">Register as a student</div></a>

			<a href="slogin.php"><div class="button" id="log">Login as a student</div></a>
		</div>

	</div>
</body>
</html>
	

