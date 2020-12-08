<?php
session_start();

		if(isset($_POST['logout'])){
			session_destroy();
			header("location:slogin.php");
			
        }

$connect = mysqli_connect("localhost", "root", "", "mark");
    if (!isset($_SESSION['user'])) {
		header("location:slogin.php");
	}else{
		 echo "<div class='ok'> Welcome ".$_SESSION['user']."</div>";

	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style type="text/css">

		.ok{
			color: #81de26ed;
			font-weight: bold;
			font-size: 20px;
			padding-top: 25px;
		}
		
		.button{
			background-color: #3a2c9a;
			width: 250px;
			color: white;
			padding: 10px;
			border: none;
		}
		.button:hover{
			background-color: grey;
		}
		.image{
			width:100px;
			
		}
		td {
			height: 170px;
			vertical-align: middle;
			}
		
		
		table th {
			background-color: #81de26ed;
		}

		table tr {
			background-color: #ddd;

		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		table tr:hover {
			background-color: #b0abf7;
		}
		.table{
			border-collapse: collapse;
			margin-top: 50px;
			margin-bottom: 50px;
			font-size: 18px;
		}
		.ma{
			font-size: 20;
			font-weight: bold;
			color: #3a2c9a;
		}

		
		
	</style>
</head>
<body>
	<form action ='' method="post">
			<div><input class ='button' type="submit" name="logout" value='LOGOUT'></div>
	</form>
	<div class='container' style="margin-top: 50px;">
		<form action='' method='post'>
		<?php
		$sql = "SELECT report.ddate, report.mark, students.sname, students.ssurname 
		FROM (report
		INNER JOIN students ON report.sid = students.sid) where tid='".$_SESSION['id']."' ";

		$result =mysqli_query($connect, $sql);



		    echo "<table class='table' style='border:2px solid #dee2e6;'>
		    <tr>
		    	<th> Date </th>
		        <th> Student's Name, Surname </th>
		        <th> Mark </th>
		       
		    </tr>";
		
			if (mysqli_num_rows($result) > 0) {
				
				  while($sql = mysqli_fetch_assoc($result)) {
				  	 echo "<tr>
				  	        <td style='vertical-align:middle;'>".$sql["ddate"]."
				    		</td>
				    		<td style='vertical-align:middle;'>".$sql['sname']." ".$sql['ssurname']."
				    		</td>
				    		<td style='vertical-align:middle; color:red; font-weight:bold;'>".$sql["mark"]."
				    		</td>
				    		
			    		</tr>";
			    		
				  }

				}
				echo "</table>";
				
				$sqll="SELECT AVG(mark) as 'Avmark' FROM report WHERE tid='".$_SESSION['id']."'";
				$result1 =mysqli_query($connect, $sqll);
				 $data = mysqli_fetch_array($result1);
				 echo "<p class='ma'>The avarage mark is - " .$data['Avmark'].".</p>";

	          
				
		?>  
		</form>
    </div>


</body>
</html>