<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		$nick=$_POST['nick'];
		if$ncik==NULL){
			echo "�г����� �����ּ���.";
			exit();
		}

		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit();
		}

		$check_nick="SELECT * FROM Users WHERE Nickname='$nick'";
		$result_nick=$db->query($check_nick);
		if($row[Nickname]==$nick){ echo "������ �г����Դϴ�.";}
		else if($result_nick->num_rows==1){
			echo "�ߺ��� �г����Դϴ�.";
			exit();
		}
		else {
			echo "��� ������ �г����Դϴ�.";
		}
	?>
</body>
</html> 