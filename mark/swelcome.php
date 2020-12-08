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
	$arr=array();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Welcome</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<style type="text/css">
		.ym{
			color: #52a005;
			font-weight: 600;
			font-size: 18px;

		}
	</style>
	
</head>
<body>
	<form action ='' method="post">
			<div><input class ='button' type="submit" name="logout" value='LOGOUT'></div>
	</form>
	<div class='container' style="margin-top: 50px;">
		<div id="result"></div>
		<form action='' method='post'>
		<?php
		

		echo "<br>";
		$sql = "SELECT * FROM teachers";
		$result = mysqli_query($connect, $sql);



		    echo "<table class='table' style='border:2px solid #dee2e6;'>
		    <tr>
		    	<th> My mark </th>
		        <th> Teahcer's Name, Surname </th>
		        <th> Subject </th>
		        <th> Confirm </th>
		        <th> Average mark </th>
		    </tr>";
		
			if (mysqli_num_rows($result) > 0) {
				$str='';
				  while($sql = mysqli_fetch_assoc($result)) {
				  	 echo "<tr data-id='".$sql['tid']."'>
				  	 		<input type='hidden' id= 'sid' name='sid' value='".$_SESSION['id']."'>
				    		<td><img class='image' src='pictures/".$sql['tphoto']."'><br>";
				    		$sql1="SELECT * from report where tid='".$sql['tid']."' and sid='".$_SESSION['id']."' ";

				    		$result1 = mysqli_query($connect, $sql1);
				    		$ishmar = false;
				    		if (mysqli_num_rows($result1) < 1){

					    	  echo "<div class='mark_radio' id='mark_radio_".$sql['tid']."'><input type='radio' id='1' class='mark_".$sql['tid']."' name='mark_".$sql['tid']."' value='1'>
							  <label for='1'>1</label>
							  <input type='radio' id='2' class='mark_".$sql['tid']."' name='mark_".$sql['tid']."' value='2'>
							  <label for='2'>2</label>
							  <input type='radio' id='3' class='mark_".$sql['tid']."' name='mark_".$sql['tid']."' value='3'>
							  <label for='3'>3</label>
							  <input type='radio' id='4' class='mark_".$sql['tid']."' name='mark_".$sql['tid']."' value='4'>
							  <label for='4'>4</label>
							  <input type='radio' id='5' class='mark_".$sql['tid']."' name='mark_".$sql['tid']."' value='5'>
							  <label for='5'>5</label></div>
							  <p class='ym' id='ekac_".$sql['tid']."' style='display:none;'> </p>";
							
							  	
							  }else if(mysqli_num_rows($result1)==1){
							  	echo "<p class='ym'>Your mark is ";

							  	$sql2 = "SELECT mark FROM report WHERE tid='".$sql['tid']."' and sid='".$_SESSION['id']."'"; 

                                $result2 = mysqli_query($connect, $sql2);
								$data2 = mysqli_fetch_array($result2);
							  	echo $data2[0]."</p>"; 
							  	$ishmar = true;

							  }

							  $dis_av = $ishmar ? 'disabled' : '';
				    		echo "</td>
				    		<td style='vertical-align:middle;'>".$sql['tname']." ".$sql['tsurname']."
				    		</td>
				    		<td style='vertical-align:middle;'>

				    		<span class='span'>".$sql["tsubject"]."</span>
				    		
				    		<input type='hidden' value='".$sql["tsubject"]."' class='subject' name='hidden_".$sql['tid']."'>
				    		<input type='button' class='divV' style='display:none;' value='V' >
				    		</td>

				    		<td id='td_".$sql['tid']."' style='vertical-align:middle;'>
				    		<input class='submit' type ='button' ".$dis_av." value='Submit' name='submit_".$sql['tid']."' id='inp_".$sql['tid']."'>
				    		</td>
				    		<td style='vertical-align:middle;' id='avg_".$sql['tid']."'>";
				    			$sql3="SELECT AVG(mark) as 'Avmark' FROM report WHERE tid='".$sql['tid']."'";
								 $result3 =mysqli_query($connect, $sql3);
								 $data = mysqli_fetch_array($result3);

								 echo $data['Avmark'];
				    		
				    		"</td>	    		
			    		</tr>";
			    		$str.=$sql['tid']."*";
				  }

				}
				echo "</table>";
				
				echo "<input type ='hidden' id='tid' name = 'hidden' value='" .$str. "'>";				
				
		?>  
		</form>

		
    </div>
    <script type="text/javascript">
  	
       
  			$('.span').dblclick(function(){
  				var t = $(this).parent().find('[name*="hidden"]');
  				t.attr("type", "text");
  				$(this).parent().find('.divV').show();
	  			$(this).hide();
	  		});


			$(document).click(function(e) {

		        if($(e.target).hasClass('subject')){
		            e.preventDefault();
		            return;
		        }
		        // links to be clickable
		        if($(e.target).is('a')){ 
		            return;
		        }
		        else{
		        	 $('.divV').hide();
					 $('.subject').attr("type", "hidden");
					 $('.span').show();
		        }
		    });

	  		$(".divV").click( function() {
	  			var value = $(this).parent().find('[name*="hidden"]').val();
	  			var id = $(this).parents('tr').data('id');
	  			var data = {
	  				'value' : value,
	  				'id' : id
				};
				console.log(id);
	  			var span = $(this).parent().find('span');
	  			var hidden = $(this).parent().find('[type="text"]');
	  			var divV = $(this);

				$.ajax({
				  type: 'post',
				  url: 'ajaxphp.php',
				  data: data,
				  success: function(data){
				  	span.html(value);
				  	span.show();
				  	hidden.attr("type", "hidden");
				  	divV.hide();
				    $('#result').html(data);
				  }
				});
			});

			
			$('.submit').click(function(){
				var sid = $('#sid').val();
				var tid = $(this).parents('tr').data('id');
				var mark = $(".mark_"+tid+":checked").val();
				var data = {
					'student_id' : sid,
					'teacher_id' : tid,
					'mark' : mark
					};

				var id = $(this).parents('tr').data('id');
				var avgTd= $(this).parents().find('#avg_'+id);
				$.ajax({
				  type: 'post',
				  url: 'ajaxphp1.php',
				  data: data,
				  success: function(result){
				  	$(document).find("#avg_"+tid).html(result);
				  	$(document).find("#mark_radio_"+tid).hide();
				  	$(document).find("#ekac_"+tid).html('Your mark is '+mark);
				  	$(document).find("#ekac_"+tid).show();
				  	$(document).find("#inp_"+tid).prop('disabled', true);				  	
				  }
				});

			});

	</script>
	

</body>
</html>