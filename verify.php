<!DOCTYPE html>
<html>
	<head>
		<title>DotWe - Email Verification</title>
	</head>
	<body>
		<div>
			<h3>DotWe User Verification.</h3>
			
			<?php
				mysql_connect("196.253.4.24","uitrw2016_G3","passit324873");
				mysql_select_db("itrw2016_G3") or die(mysql_error());
			
				if (isset($_GET[email]) && !empty($_GET[email]) AND isset($_GET['hash'])) {
					$username = mysql_escape_string($_GET['email']);
					$hash = mysql_escape_string($_GET['hash']);
					
					$search = mysql_query("select username, hash, active from user where username='$username' and hash = '$hash' and active = '0'") or die(mysql_error());
					$result = mysql_num_rows($search);
					
					if($result >0) {
						mysql_query("Update user set active='1' where username='$username' and hash='$hash' and active='0'") or die(mysql_error());
						echo '<div class="status">Your account has been activated, you can now login.</div>';
					} else {
						echo '<div class="status">Invalid verification, please use the link provided in your email.</div>';
					}
				}
			?>
		</div>
	</body>
</html>