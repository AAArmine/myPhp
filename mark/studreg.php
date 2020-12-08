<?php
$connect = mysqli_connect("localhost", "root", "", "mark");
							
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student_registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">
		
	
		.borderr {
			border: 3px solid #1e1b2380; 
			margin: auto;
			padding: 25px; 
			width: 655px; 
			margin-top: 20px;
		}
		.p-2 {
			color:  #5520c5;
			font-weight: bold;

		}
		input {
			width: 350px; 
			color:  #5520c5;
			background-color: #abfd5ab3;
			border: 1px solid #ffffffdb;
			margin-bottom: 43px;
		}
		.padd{
			padding: 20px;
		}
		.submit{
			background-color: #3a2c9a;
			width: 100px;
			color: white;
			padding: 3px;
			margin-left: 48px;
		}
		.submit:hover{
			background-color: grey;
		}
		.back{
			background-color: #81de26ed;
			color: white;
			padding: 7px;
			box-shadow: 2px 2px 3px #888888;
			font-size: 18px;
			width:180px;
			text-decoration: none;

		}
		.back:hover{
			color:white;
			box-shadow: none;
			text-decoration: none;
		}

		a:hover, a:active, a:focus {
        text-decoration: none;
         }


	</style>
</head>
<body>
	<a href='index.php'><div class='back' style='text-decoration: none;'>Go to main page</div></a>
	<div class="borderr">
		<form action='sconfirm.php' method="post">
			<div class="d-flex p-3">
				<div class="p-2">
					<div class='padd'><label for=sname>Name: </label></div>
					<div class='padd'><label for=ssurname>Surname: </label></div>
					<div class='padd'><label for=sclass>Class:</label></div>
					<div class='padd'><label for=slogin>Login: </label></div>
					<div class='padd'><label for=spassword>Password: </label></div>
				</div>
				<div class="p-2">
					<div><input type="text" name="sname" id='sname' style="margin-top: 20px;" required></div>
					<div><input type="text" name="ssurname" id='ssurname' required></div>
					<div><input type="text" name="sclass" id='sclass' required></div>
					<div><input type="text" name="slogin" id='slogin' required></div>
					<div><input type="password" name="spassword" id='spassword' required></div>
			           
    			</div>
       		
			</div>
		
			<div><input class ='submit' type="submit" name="submit" value="Submit"></div>
			
		</form>
		
	</div>

</body>
</html>