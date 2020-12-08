<?php
$connect = mysqli_connect("localhost", "root", "", "mark");

				
				
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher_registration</title>
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
		<form action='tconfirm.php' method="post" enctype="multipart/form-data">
			<div class="d-flex p-3">
				<div class="p-2">
					<div class='padd'><label for=tname>Name: </label></div>
					<div class='padd'><label for=tsurname>Surname: </label></div>
					<div class='padd'><label for=tsubject>Subject:</label></div>
					<div class='padd'><label for=tlogin>Login: </label></div>
					<div class='padd'><label for=tpassword>Password: </label></div>
					<div class='padd'><label for=tphoto>Attach a photo:</label></div>
				</div>
				<div class="p-2">
					<div><input type="text" name="tname" id='tname' style="margin-top: 20px;" required></div>
					<div><input type="text" name="tsurname" id='tsurname' required></div>
					<div><input type="text" name="tsubject" id='tsubject' required></div>
					<div><input type="text" name="tlogin" id='tlogin' required></div>
					<div><input type="password" name="tpassword" id='tpassword' required></div>
		
		

		
				<div><input type="file" name="image" id='tphoto' style="background-color: white;"></div>
			    
        
       
    			</div>
        
			
			</div>
		
			<div><input class ='submit' type="submit" name="submit" value="Submit"></div>
			
		</form>
		
	</div>

</body>
</html>