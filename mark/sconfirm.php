<?php
$connect = mysqli_connect("localhost", "root", "", "mark");
    
  
	
			    $name = isset($_POST['sname']) && !empty($_POST['sname']) ? $_POST['sname']: false;
				$surname = isset($_POST['ssurname']) && !empty($_POST['ssurname']) ? $_POST['ssurname']: false;
				$class = isset($_POST['sclass']) && !empty($_POST['sclass']) ? $_POST['sclass']: false;
				$login = isset($_POST['slogin']) && !empty($_POST['slogin']) ? $_POST['slogin']: false;
				$password = isset($_POST['spassword']) && !empty($_POST['spassword']) ? $_POST['spassword']: false;
				
					
				$lracvac = $name != false ||  $surname != false || $class != false || $login != false || $password != false ? true : false;


    	if(isset($_POST['submit']) &&  $lracvac){
			 
    		   $sql1 ="INSERT INTO students (sname, ssurname, sclass, slogin, spassword) VALUES ('".$name."', '".$surname."', '".$class."', '".$login."', '".$password."')";

    		
               			mysqli_query($connect, $sql1);
					         echo "<p class='ok'> Your details are added, you can <a href='slogin.php' style='text-decoration underline '>login now  <i class='fas fa-arrow-right' id='font'></i></a>, <br>
					         or <a href='index.php' style='text-decoration underline'>go to the main page <i class='fas fa-arrow-right' id='font'></i></a></p><br>
					         ";

    	    
    }
    	
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
		h3{ 
			color: #5520c5
		}
		table th {
			background-color: #81de26ed;
		}

		table tr {
			background-color: #ddd;
		}
		table tr:hover {
			background-color: grey;
		}
		.table{
			border-collapse: collapse;
			margin-top: 50px;
			margin-bottom: 50px;

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
		.ok{
			color: #81de26ed;
			font-weight: bold;
			font-size: 20px;
			padding-top: 25px;

		}
		.notok{
			color: red;
			font-weight: bold;
			font-size: 20px;
			padding-top: 25px;

		}

	</style>
</head>
<body>
	
	<div class="borderr">
		


			<h3>Please check if the submitted detailes are right</h3>
			<h5 id='det'>Your submitted details are: <i class="fas fa-level-down-alt" id='font'></i></h5>
			<form method="post" action=""> 
					<table class="table">
						<tr>
							<th>Name</th><th>Surname</th><th>Class</th><th>Login</th><th>Password</th>
						</tr>
						<tr>
							<?php
							if(isset($_POST['submit'])){
								
								echo "
								<td>".$_POST['sname']."</td>
								<td>".$_POST['ssurname']."</td>
								<td>".$_POST['sclass']."</td>
								<td>".$_POST['slogin']."</td>
								<td>".$_POST['spassword']."</td>";	
							}

							?>
						</tr>
					</table>
					<input type="submit" name="delete" class='submit' value='Delete my submitted details'>
				<?php
				 if(isset($_POST['delete'])){
	                 $sql = mysqli_query($connect, "SELECT * FROM students ORDER BY sid DESC LIMIT 1");
	                 $verjin = mysqli_fetch_row($sql);
	                 echo "<pre>";
	                 print_r($verjin);
	                 echo "</pre>";

	    
	                 mysqli_query($connect, "DELETE FROM students WHERE sid='".$verjin[0]."'");
	                 echo "<div class='ok'> Your details are deleted. You can <a href= 'studreg.php'> Register </a> again</div>";
                ?>
    
				

				    <script type="text/javascript">
				    	$(".submit").hide();
				    	$('.table').hide();
				    	$('h3').hide();
				    	$('h5').hide();

				    </script>
                <?php

				}
				?>	
				</div>
			</form>
			
		
	
		
		
	</div>

</body>
</html>