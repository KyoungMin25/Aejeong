<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		$id=$_POST['id'];
		
		if($id==NULL){
			echo "ID를 적어주세요.";
			exit();
		}

		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit();
		}

		$check_id="SELECT * FROM Users WHERE UserID='$id'";
		$result_id=$db->query($check_id);
		if($result_id->num_rows==1){
			echo "중복된 아이디입니다.";
			exit();
		}
		else {
			echo "사용 가능한 아이디입니다.";
		}

		
	?>
</body>
</html> 