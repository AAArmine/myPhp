<?php
$connect = mysqli_connect("localhost", "root", "", "mark");

	if (isset($_POST['value'])) {
		$id = $_POST['id'];
		$value = $_POST['value'];

		$sql="UPDATE teachers SET tsubject='".$value."' WHERE tid='".$id."' ";
		$result = mysqli_query($connect, $sql);

		if($result){
			echo "The changes have been made!";
		}else{
			echo "Something is wrong!";
		}
		
	}
?>