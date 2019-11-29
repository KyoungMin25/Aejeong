<!DOCTYPE html>
<html>

<head>
<title> Login </title>
</head>

<body>
	<?php
		$nick=$_POST['nick'];
		$password=$_POST['password'];
		$passwordCheck=$_POST['passwordCheck'];
		$birth=(int)($_POST['year'].$_POST['month'].$_POST['day']);
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$dog=(int)($_POST['dog']);
		$cat=(int)($_POST['cat']);
		$etc1Name=$_Post['ext1name'];
		$etc1=(int)($_POST['etc1']);
		$etc2Name=$_Post['ext2name'];
		$etc2=(int)($_POST['etc2']);

		$db=new mysqli('localhost', 'aejeong', 'aejeong123', 'aejeong');
		if(mysqli_connect_errno()){
			echo "<p>Error: Could not connect to database. <br/>Please try again later.</p>";
			exit();
		}

		session_start();

		$id=$_SESSION['UserID'];

		if(isset($_SESSION['UserID'])){
			$query="SELECT * FROM Users WHERE UserID='$id'";
			$result=mysqli_query($query);

			$check_nick="SELECT * FROM Users WHERE Nickname='$nick'";
			$result_nick=$db->query($check_nick);


			if($password!=$passwordCheck){
			echo "비밀번호가 다릅니다.";
			exit();
			}
			else{
				$password=md5($_POST['password']);
			}

			if(strlen($_POST['phone1'])!=4 || strlen($_POST['phone2'])!=4 ||!(is_numeric($_POST['phone1'])) ||!(is_numeric($_POST['phone2']))){
				echo "전화번호를 다시 입력해 주세요.";
				exit();
			}
			else{
				$phone=(int)($_POST['phone1'].$_POST['phone2']);
			}

			$checkEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
			if($checkEmail!=true){
			echo "이메일 주소를 다시 입력해 주십시오.";
			exit();
			}

			if($id==NULL || $ncik==NULL || $birth==NULL || $phone==NULL || $email==NULL){
			echo "빈칸을 모두 채워주세요.";
			exit();
			}
			
			$sqlNick="UPDATE Users SET Nickname='$nick' WHERE UserID='$id'";
			$sqlBirth="UPDATE Users SET Birth='$birth' WHERE UserID='$id'";
			$sqlGender="UPDATE Users SET Gender='$gender' WHERE UserID='$id'";
			$sqlPhone="UPDATE Users SET PhoneNumber='$phone' WHERE UserID='$id'";
			$sqlEmail="UPDATE Users SET Email='$email' WHERE UserID='$id'";
			$sqlDog="UPDATE Users SET Dog='$dog' WHERE UserID='$id'";
			$sqlCat="UPDATE Users SET Cat='$cat' WHERE UserID='$id'";
			$sqletc1Name="UPDATE Users SET etc1Name='$etc1Name' WHERE UserID='$id'";
			$sqletc1="UPDATE Users SET etc1='$etc1' WHERE UserID='$id'";
			$sqletc2Name="UPDATE Users SET etc2Name='$etc2Name' WHERE UserID='$id'";
			$sqletc12="UPDATE Users SET etc2='$etc2' WHERE UserID='$id'";

			if($password!=NULL){
				$sqlPassword="UPDATE Users SET Password='$password' WHERE UserID='$id'";
				if($mysqli->query($sqlNick) && $mysqli->query($sqlPsw) && $mysqli->query($sqlBirth) && $mysqli->query($sqlGender) && $mysqli->query($sqlPhone) && $mysqli->query($sqlEmail) && 
					$mysqli->query($sqlDog) && $mysqli->query($sqlCat) && $mysqli->query($sqletc1Name) && $mysqli->query($sqletc1) && $mysqli->query($sqletc2Name) && $mysqli->query($sqletc2) &&$mysqli->query($password)){
						echo "정보 수정이 완료되었습니다.";
				}
				else{
					echo "정보 수정에 실패하였습니다.";
				}
			}
			else{
				if($mysqli->query($sqlNick) && $mysqli->query($sqlPsw) && $mysqli->query($sqlBirth) && $mysqli->query($sqlGender) && $mysqli->query($sqlPhone) && $mysqli->query($sqlEmail) && 
					$mysqli->query($sqlDog) && $mysqli->query($sqlCat) && $mysqli->query($sqletc1Name) && $mysqli->query($sqletc1) && $mysqli->query($sqletc2Name) && $mysqli->query($sqletc2)){
						echo "정보 수정이 완료되었습니다.";
				}
				else {
					echo "정보 수정에 실패하였습니다.";
				}

			}
		}
				

	?>
</body>

</html>