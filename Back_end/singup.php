<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		$id=$_POST['id'];
		$nick=$_POST['nick'];
		$password=$_POST['password'];
		$passwordCheck=$_POST['passwordCheck'];
		$birth=(int)($_POST['year'].$_POST['month'].$_POST['day']);
		$gender=$_POST['gender'];
		$phone=(int)($_POST['phone1'].$_POST['phone2']);
		$email=$_POST['email'];
		$dog=(int)($_POST['dog']);
		$cat=(int)($_POST['cat']);
		$etc1Name=$_Post['ext1name'];
		$etc1=(int)($_POST['etc1']);
		$etc2Name=$_Post['ext2name'];
		$etc2=(int)($_POST['etc2']);
		if($password!=$passwordCheck){
			echo "��й�ȣ�� �ٸ��ϴ�.";
			echo "<a herf=signup.html>back page</a>";
			exit();
		}
		else{
			$password=md5($_POST['password']);
		}
		if($id==NULL || $ncik==NULL || $password==NULL || $birth==NULL || $phone==NULL || $email==NULL){
			echo "��ĭ�� ��� ä���ּ���.";
			echo "<a herf=signup.html>back page</a>";
			exit();
		}
		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit();
		}

		if(strlen($_POST['phone1'])!=4 || strlen($_POST['phone2'])!=4 ||!(is_numeric($_POST['phone1'])) ||!(is_numeric($_POST['phone2']))){
			echo "��ȭ��ȣ�� �ٽ� �Է��� �ֽʽÿ�.";
			exit();
		}

		$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
		if($checkEmail!=true){
			echo "�̸��� �ּҸ� �ٽ� �Է��� �ֽʽÿ�.";
			exit();
		}
		$sql="INSERT INTO Users(UserID, Nickname, Password, Birth, Gender, PhoneNumber, Email, Dog, Cat, etc1Name, etc1, etc2Name, etc2)";
		$sql=$sql." VALUES ('$id','$nick','$password','$birth','$gender','$phone','$email','$dog','$cat','$ etc1name','$etc1','$ etc2name','$etc2')";
		if($mysqli->query($sql)){
			echo "ȸ�����Կ� �����ϼ̽��ϴ�.";
		}
		else {
			echo "ȸ�����Կ� �����ϼ̽��ϴ�.";
		}
	?>
</body>
</html> 