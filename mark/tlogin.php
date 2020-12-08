<?php
session_start();

	$connect = mysqli_connect("localhost", "root", "", "mark");
 	$login =isset($_POST['login']) && !empty($_POST['login'])? $_POST['login']: false;
    $password =isset($_POST['password']) && !empty($_POST['password'])? $_POST['password']: false;
    $lracvac = $login != false || $password != false ? true: false;

	if(isset($_POST['submit']) && ($lracvac)){
	 	$result = mysqli_query($connect, "SELECT * FROM teachers WHERE tlogin ='".$login."' AND tpassword ='".$_POST['password']."' ");

	 	if($res =mysqli_fetch_assoc($result)){
			$_SESSION['user'] = $login;

			$_SESSION['id'] = $res['tid'];
			
					header("location:twelcome.php");
										
		}else{
			echo "<div class='notok'> The login or password are not correct.Please try again, or <a href='teachreg.php'> register</a> if you are not registered.</div>";
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">

		.table{
			border-collapse: collapse;
			background-color: #ddd;
			padding-left: 700px;
			width: 400px;
			height: 300px;
			margin:auto;
			font-size: 20px;
			border: 3px solid #81de26ed;

		}
		.submit{
			background-color: #3a2c9a;
			width: 250px;
			color: white;
			padding: 10px;
			border: none;
		}
		.submit:hover{
			background-color: grey;
		}
		#login, #password {
			padding: 7px;
			margin: 10px;
		}
		label {
			padding: 20px;
		}
		.font {
			color: #81de26ed;
			font-size: 25px;
		}
		.notok{
			color:red; 
			font-weight: bold; 
			font-size: 20px;
			padding-top: 25px;
			width:900px;
			margin:auto;

		}
		a {
			padding: 5px, 15px;
			color:#3a2c9a;
		}
		a:hover{
			text-decoration: none;
			color: white;
			background-color: grey;
		}
		.back{
			background-color: #81de26ed;
			color: white;
			padding: 7px;
			box-shadow: 2px 2px 3px #888888;
			font-size: 18px;
			width:180px;

		}
		.back:hover{
			color:white;
			box-shadow: none;
			text-decoration: none;
		}
		
	</style>
</head>
<body>
	<a href='index.php'><div class='back'>Go to main page</div></a>
	<div class='container' style="margin-top: 50px;">
		<form action='' method='post'>
			<table class='table'>

				<tr>
					<td><label for='login'>Login:</label></td>
					<td><input type='text' id='login' name='login' placeholder="Insert you login" required></td>
				</tr>
				<tr>
					<td><label for='password'>Password:</label></td>
					<td><input type='password' name='password' id='password' placeholder="Insert you password" required></td>
				</tr>
				<tr>
					<td colspan="2"><input type='submit' name='submit' value='Submit' class='submit'><i class="fas fa-key" style="font-size:25px; padding: 15px; color:#81de26ed;"></i></td>
			    </tr>
		
			</table>
			
		</form>
    </div>


</body>
</html>