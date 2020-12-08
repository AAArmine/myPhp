<?php
$connect = mysqli_connect("localhost", "root", "", "mark");

	if(!file_exists('pictures')){
		 mkdir("pictures");
	}
			    $name = isset($_POST['tname']) && !empty($_POST['tname']) ? $_POST['tname']: false;
				$surname = isset($_POST['tsurname']) && !empty($_POST['tsurname']) ? $_POST['tsurname']: false;
				$subject = isset($_POST['tsubject']) && !empty($_POST['tsubject']) ? $_POST['tsubject']: false;
				$login = isset($_POST['tlogin']) && !empty($_POST['tlogin']) ? $_POST['tlogin']: false;
				$password= isset($_POST['tpassword']) && !empty($_POST['tpassword']) ? $_POST['tpassword']: false;
				
				$lracvac = $name != false ||  $surname != false || $subject != false || $login != false || $password != false ? true : false;

 print_r($_FILES['image']['size']);

    if(isset($_POST['submit']) &&  $lracvac){
			 if($_FILES['image']['size'] > 0){
		       $new_name = rand(100, 900)."_".time()."_".basename($_FILES["image"]["name"]);

						move_uploaded_file($_FILES["image"]["tmp_name"], "pictures/".$new_name);
    		
    		   $sql1 ="INSERT INTO teachers (tname, tsurname, tsubject, tlogin, tpassword, tphoto) VALUES ('".$_POST['tname']."', '".$_POST['tsurname']."', '".$_POST['tsubject']."', '".$_POST['tlogin']."', '".$_POST['tpassword']."', '".$new_name."')";
    		
               			mysqli_query($connect, $sql1);
					         echo "<p class='ok'> Your details are added, you can <a href='tlogin.php' style='text-decoration underline '>login now  <i class='fas fa-arrow-right' id='font'></i></a>, <br>
					         or <a href='index.php' style='text-decoration underline'>go to the main page <i class='fas fa-arrow-right' id='font'></i></a></p><br>
					         ";

    	
    	    }else{
    		$image = 'default.png';

    		$sql ="INSERT INTO teachers (tname, tsurname, tsubject, tlogin, tpassword, tphoto) VALUES ('".$_POST['tname']."', '".$_POST['tsurname']."', '".$_POST['tsubject']."', '".$_POST['tlogin']."', '".$_POST['tpassword']."', '".$image."')";
    		
               			mysqli_query($connect, $sql);
					         echo "<p class='ok'> Your details are added, you can <a href='tlogin.php'><span class='submit'>login now  <i class='fas fa-arrow-right' id='font'></i></span></a>, <br>
					         or <a href='index.php' style='text-decoration underline'>go to the main page <i class='fas fa-arrow-right' id='font'></i></a></p><br>
					         ";


    	}
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
							<th>Name</th><th>Surname</th><th>Subject</th><th>Login</th><th>Password</th><th>Photo</th>
						</tr>
						<tr>
							<?php
							if(isset($_POST['submit'])){
								
								echo "
								<td>".$_POST['tname']."</td>
								<td>".$_POST['tsurname']."</td>
								<td>".$_POST['tsubject']."</td>
								<td>".$_POST['tlogin']."</td>
								<td>".$_POST['tpassword']."</td>
								<td>";
								
								if($_FILES['image']['name']){
									echo $_FILES['image']['name'];
								}else{
									echo "No photo";
								}
							   "</td>";
							}


							?>
						</tr>
					</table>
					<input type="submit" name="delete" class='submit' value='Delete my submitted details'>
				<?php
				 if(isset($_POST['delete'])){
	                 $sql = mysqli_query($connect, "SELECT * FROM teachers ORDER BY tid DESC LIMIT 1");
	                 $verjin = mysqli_fetch_row($sql);

	    
	                 mysqli_query($connect, "DELETE FROM teachers WHERE tid='".$verjin[0]."'");
	                 echo "<div class='ok'> Your details are deleted. You can <a href= 'teachreg.php'> Register </a> again</div>";
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