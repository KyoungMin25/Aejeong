<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		$nick=$_POST['nick'];
		if$ncik==NULL){
			echo "닉네임을 적어주세요.";
			exit();
		}

		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit();
		}

		$check_nick="SELECT * FROM Users WHERE Nickname='$nick'";
		$result_nick=$db->query($check_nick);
		if($row[Nickname]==$nick){ echo "기존의 닉네임입니다.";}
		else if($result_nick->num_rows==1){
			echo "중복된 닉네임입니다.";
			exit();
		}
		else {
			echo "사용 가능한 닉네임입니다.";
		}
	?>
</body>
</html> 