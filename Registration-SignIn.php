<html>
<head>
	<title></title>
	<style>

		body
		{
			padding:0px;
			margin: 0px;
		}
		
		#header
		{
			font-family: verdana;
			font-size: 70px;
			background-color: black;
			color:white;
			letter-spacing: 10px;
			font-weight: bold;
			text-align: center;
			padding:20px;
		}

		#registration
		{
			float: left;
			font-family: verdana;
			font-weight: bold;
			letter-spacing: 5px;
			font-size: 15px;
			border: 1px solid black;
			padding: 20px;
			margin: 10px 20px 0px 20px;
			text-align: center;
		}

		#Login
		{
			float: left;
			font-family: verdana;
			font-weight: bold;
			letter-spacing: 5px;
			font-size: 15px;
			border: 1px solid black;
			padding: 20px;
			margin: 80px 30px 0px 30px;
			text-align: center;
		}

		input[type=text],input[type=password],input[type=email]
		{
			width: 100%;
			height: 35px;
			font-size: 15px;
  			box-sizing: border-box;
  			margin: 10px 0px 0px 0px;
		}

		input[type=button], input[type=submit], input[type=reset] 
		{
  			background-color: black;
  			border: none;
  			color: white;
  			padding: 16px 32px;
  			text-decoration: none;
  			margin: 4px 2px 0px 2px;
  			cursor: pointer;
  			font-family: verdana;
  			font-size: 30px;
		}


	</style>
</head>

<body>
	<div id="header">GEET</div>

	<div id="registration">

			<p style="font-family:verdana; font-size:40px ;font-weight-bold; letter-spacing: 10px;">Registration</p>
			<form method="POST">

    			<label for="USERNAME">USERNAME</label>
    			<input type="text" id="USERNAME" name="USERNAME" placeholder=""><br><br>

    			<label for="EMAIL">EMAIL-ACC</label>
    			<input type="EMAIL" id="EMAIL" name="EMAIL" placeholder=""><br><br>

    			<label for="PASSWORD">PASSWORD</label>
    			<input type="PASSWORD" id="PASSWORD" name="PASSWORD" placeholder=""><br><br>

    			<label for="CONFIRM-PASSWORD">CONFIRM PASSWORD</label>
    			<input type="PASSWORD" id="CONFIRM-PASSWORD" name="CONFIRM-PASSWORD" placeholder=""><br><br>	
    
    			<input type="submit" value="Submit">
  			</form>
	</div>

	<div id="Login">
			<p style="font-family:verdana; font-size:40px ;font-weight-bold; letter-spacing: 10px;">Login</p>
			<form method="POST">

    			<label for="SUSERNAME">USERNAME</label>
    			<input type="text" id="SUSERNAME" name="SUSERNAME" placeholder=""><br><br>

    			<label for="SPASSWORD">PASSWORD</label>
    			<input type="PASSWORD" id="SPASSWORD" name="SPASSWORD" placeholder=""><br><br>	

    			<input type="submit" value="Submit">
  			</form>
	</div>

	<div style="float:left; margin: 100px 40px 100px 40px;">
		<img src="im.jpg"></img>
	</div>

	<?php


		$mysql_host     = "localhost";
		$mysql_username = "root";
		$mysql_password = "";
		$mysql_database = "album management system";

		if(!empty($_POST["USERNAME"]) && ($_POST["EMAIL"]) && ($_POST["PASSWORD"]))
		{
  			$USERNAME = $_POST['USERNAME'];
  			$EMAIL = $_POST['EMAIL'];
  			$PASSWORD = $_POST['PASSWORD'];

  			$mysqli  = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
  			$prepare = $mysqli->prepare("INSERT INTO `users`(`USERNAME`,`EMAIL`,`PASSWORD`) VALUES (?,?,?)");
  			$hashedpassword=password_hash($PASSWORD, PASSWORD_DEFAULT);
  			$prepare->bind_param("sss",$USERNAME,$EMAIL,$PASSWORD);
  			$prepare->execute();
  			$mysqli->close();
		}

		if(!empty($_POST["SUSERNAME"]) && ($_POST["SPASSWORD"]))
		{
			session_start();
			$SUSERNAME = $_POST['SUSERNAME'];
  			$XPASSWORD = $_POST['SPASSWORD'];
  			$SPASSWORD = password_hash($XPASSWORD, PASSWORD_DEFAULT);

  			$mysqli  = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
			$sql = "select * from USERS where USERNAME = '$SUSERNAME' and PASSWORD='$XPASSWORD'";
  			$result=$mysqli->query($sql);

  			if ($result->num_rows == 1) 
  			{
  				$_SESSION['login_user']=$SUSERNAME;
  				header("location: HomePage.php");
    		}
			else 
			{
				echo "incorrect username or password";
			}
		}
		


	?>

</body>

</html>