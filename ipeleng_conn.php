<?php
	if (isset($_POST['login'])) {
				validate_user();
			} 

			if (isset($_POST['register'])){
				echo "You can register a new user here.";
				//header("Location: index.html");
			}

			function validate_user() {
				//include_once ("db.php");
				$username = strip_tags($_POST['username']);
				echo "Username: ".$username ."<br/>";
				$password = strip_tags($_POST['password']);
				echo "Password is ".$password."<br/>";

				mysql_connect("196.253.4.24","uitrw2016_G3","passit324873");
				mysql_select_db("itrw2016_G3");

				$result = mysql_query("select * from user where username = '$username' and pwd = '$password' LIMIT 1") or die("Failed to connect to the database". mysql_error());

				$row = mysql_fetch_array($result);
				if ($row['username']==$username && $row['pwd']==$password){
					echo "Login successful! Welcome ". $row['username'];
				} else{
					echo "Log in failed";
				}
			}
?>