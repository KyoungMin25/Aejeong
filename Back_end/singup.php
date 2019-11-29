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
			echo "비밀번호가 다릅니다.";
			echo "<a herf=signup.html>back page</a>";
			exit();
		}
		else{
			$password=md5($_POST['password']);
		}
		if($id==NULL || $ncik==NULL || $password==NULL || $birth==NULL || $phone==NULL || $email==NULL){
			echo "빈칸을 모두 채워주세요.";
			echo "<a herf=signup.html>back page</a>";
			exit();
		}
		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database. <br/>Please try again later.</p>';
			exit();
		}

		if(strlen($_POST['phone1'])!=4 || strlen($_POST['phone2'])!=4 ||!(is_numeric($_POST['phone1'])) ||!(is_numeric($_POST['phone2']))){
			echo "전화번호를 다시 입력해 주십시오.";
			exit();
		}

		$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
		if($checkEmail!=true){
			echo "이메일 주소를 다시 입력해 주십시오.";
			exit();
		}
		$sql="INSERT INTO Users(UserID, Nickname, Password, Birth, Gender, PhoneNumber, Email, Dog, Cat, etc1Name, etc1, etc2Name, etc2)";
		$sql=$sql." VALUES ('$id','$nick','$password','$birth','$gender','$phone','$email','$dog','$cat','$ etc1name','$etc1','$ etc2name','$etc2')";
		if($mysqli->query($sql)){
			echo "회원가입에 성공하셨습니다.";
		}
		else {
			echo "회원가입에 실패하셨습니다.";
		}
	?>
</body>
</html> 