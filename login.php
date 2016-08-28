<!DOCTYPE html>
<html>
    <head>
    	<title>DotWe | Login</title>
    </head>
    
    <body>
        <?php
        session_start();
		
		if (isset($_POST['login'])) {
			validate_user();
		} 

		if (isset($_POST['register'])){
			echo "You can register a new user here.";
			//header("Location: index.html");
		}
		
		function validate_user() {
			//include_once ("db.php");
            $username = strip_tags(mysql_escape_string($_POST['username']));
			$password = strip_tags(mysql_escape_string(md5($_POST['password'])));
			mysql_connect("196.253.4.24","uitrw2016_G3","passit324873");
			mysql_select_db("itrw2016_G3");
			
			$result = mysql_query("select * from user where username = '$username' and pwd = '$password' LIMIT 1") or die("Failed to connect to the database". mysql_error());
			
			$row = mysql_fetch_array($result);
			if ($row['username']==$username && $row['pwd']==$password && $row['active']=='1'){
				echo "Login successful! Welcome ". $row['username'];
			} elseif($row['active']==0){
					echo "Use link provided in the email to login.";
			} 
			else{
				echo "Log in failed";
			}
		}
		
		/**
		//User insert
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$lname = "Manyoni";
		$fname = "Zacharia";
		
		//Connection
		$conn = new mysqli("196.253.4.24","uitrw2016_G3","passit324873","itrw2016_G3");
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "INSERT INTO user (username,pwd,fname,lname) VALUES ('$username','$password','$lname','$fname')";
		
		if ($conn->query($sql) === TRUE) {
			echo "Insert successful";
		} else {
			echo "Error: " . $sql ."<br>" . $conn->error;
		}
		
		$conn->close();
		**/
		
		//User validation
		/**
		if (isset($_POST['login'])) {
			include_once ("db.php");
            $username = strip_tags($_POST['username']);
		 	echo "Username: ".$username ."<br/>";
			$password = strip_tags($_POST['password']);
			echo "Password is ".$password."<br/>";
			
			$sql = "select * from users where username = '$username' LIMIT 1";
			
			$query = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($query);
			
			if ($row==null){
				echo "There is no data from this query". "<br/>";
			}
			
			$id = $row['username'];
			$db_password = $row['pwd'];
			
			echo "Username is: ". "<br/>";
			echo "Password is: ".$row['pwd']. "<br/>";
			echo "First name is: ".$row['fname']. "<br/>";
			echo "Last name is: ".$row['lname']. "<br/>";
			
			if ($row['username']==null){
				echo "The username id is null". "<br/>";
			}
			
			if($password ==$db_password){
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $id; 
				header("Location: index.html");
			} else{
				echo "Incorrect username and password for user" . $id;
			}
        }

		**/
		
		
        ?>
    </body>
</html>