<?php

$connect = mysqli_connect("localhost", "root", "", "mark");
		if (isset($_POST['student_id']) && isset($_POST['teacher_id'])) {
			
		
			$sid = $_POST['student_id'];
			$tid = $_POST['teacher_id'];
			$mark = $_POST['mark'];

    		$sql1="SELECT * FROM report WHERE tid='".$tid."' AND sid='".$sid."' ";

    		$result = mysqli_query($connect, $sql1);

    		if (mysqli_num_rows($result) < 1){

	    		$sql3 = "INSERT INTO report (sid, mark, tid) VALUES ('".$sid."', '".$mark."', '".$tid."')";
            
				$hajoxutyamb = mysqli_query($connect, $sql3);

				if ($hajoxutyamb) {
					$sql4 ="SELECT AVG(mark) as 'Avmark' FROM report WHERE tid='".$tid."'";
						 $result4 =mysqli_query($connect, $sql4);
						 $data = mysqli_fetch_array($result4);
                	echo $data['Avmark'];
				}else{
					echo "There are no resulats.";
				}
			
			}else{
				echo "You are already marked this teacher.";
			}	
		}
	
?>  
	