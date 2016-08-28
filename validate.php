<!DOCTYPE html>
<html>
	<head>
		<title>DotWe | User Validation</title>
	</head>

	<body>
		<?php
			if (isset($_POST['register'])) {
				$first_name = strip_tags(mysql_escape_string($_POST['first_name']));
				$last_name = strip_tags(mysql_escape_string($_POST['last_name']));
				$contact = strip_tags(mysql_escape_string($_POST['contact']));
				$username = strip_tags(mysql_escape_string($_POST['username']));
				$pwd = strip_tags(mysql_escape_string($_POST['pwd']));
				$hpwd = md5($pwd);
				
				$hash = md5(rand(0,1000)); //Generate random 32 char hash.

				$conn= new mysqli("196.253.4.24","uitrw2016_G3","passit324873","itrw2016_G3");
			
			
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$sql = "insert into user (username,pwd,fname,lname,hash) values ('$username','$hpwd','$first_name','$last_name','$hash')";	

				if ($conn->query($sql) === TRUE) {
					echo "Insert successful";
				} else {
					echo "Error: " . $sql ."<br/>" . $conn->error;
				}

				$conn->close();
				
				$to = $username;
				$subject = "Sign Up | Verification";
				$message = "
					Hello There,
					Thanks for signing up!
					Your account has been created, you can login with the following credentials after you have activated your account.

					------------------------------------------------------
					Username: $username
					Password: $pwd
					------------------------------------------------------

					Please click this link to activate your account:
					http://rkv-lnx3.puk.ac.za/~v24191566/Dot_we_Dynamic/verify.php?email=$username&hash=$hash
				";

				$headers = 'From: noreply@dotwe.com' . "\r\n";
				mail($to,$subject,$message,$headers);
				echo "Sent";
			}
		?>
	</body>
</html>