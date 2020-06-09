<?php
   include('session.php');
?>



<html>
   
   <head>

      <title>Delete </title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <style>


      		body
      		{
      			margin:0px;
      			padding:0px;
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
				padding:7px;
			}

			#nav
			{
				font-family: verdana;
				font-size: 25px;
				background-color: black;
				color:white;
				font-weight: bold;
				text-align: right;
				text-decoration: none;			

			}


			

			input[type=button], input[type=submit], input[type=reset] 
			{
  				background-color: white;
  				border: none;
  				color: black;
  				padding: 12px 32px;
  				text-decoration: none;
  				margin: 0px 850px 5px 5px;
  				cursor: pointer;
  				font-family: verdana;
  				font-size: 15px;
  				border: 1px solid black;
			}

			input[type="text"]
			{
				border: 2px solid white;
				height: 40px;
				font-size: 20px;
				font-family: verdana;
			}

			ul 
			{
  				list-style-type: none;
  				margin: 0;
 				padding: 0;
			}

			li
			{
				padding: 1px;
				display: inline;
			}

			.sidebar 
			{
		
		 		height: 100%;
  				width: 160px;
  				position: fixed;
 				z-index: 1;
  				top: 0;
  				left: 0;
  				background-color: black;
  				overflow-x: hidden;
  				padding-top: 30px;
  				margin-top: 125px;
			}

			.sidebar a 
			{
  				padding: 6px 8px 6px 16px;
  				text-decoration: none;
  				font-size: 30px;
  				color: #818181;
  				display: block;
			}

			.sidebar a:hover 
			{
  				color: #f1f1f1;
			}

			.main 
			{
  				margin-left: 160px; /* Same as the width of the sidenav */
  				padding: 0px 10px;
			}

			@media screen and (max-height: 450px) 
			{
  				.sidebar {padding-top: 15px;}
  				.sidebar a {font-size: 18px;}
  		}

            input[type=text],[type=number],[type=date] ,#albumID,select {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
            }

            input[type=submit] {
              width: 100%;
              background-color: black;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              border-radius: 4px;
              cursor: pointer;
            }

            input[type=submit]:hover {
              background-color: #2E6171;
            }

            div.container {
              font-family: verdana;
              font-color:black;
              border: 2px solid black;
              border-radius: 5px;
              background-color: white;
              padding: 40px;
            }

            #inputform1
            {
              margin-left:250px;
              margin-top: 5px;
              float: left;
            }

            #inputform2
            {
              margin-left:800px;
              //float: left;
            }

            h1
            {
              margin-left:480px;
              margin-top: 10px;
              letter-spacing: 5px;
              font-style: bold;
            }


      </style>
   </head>
   
   <body>

   	

   		<div id="header">GEET</div>

   		

   		<div id="nav">
   			<ul>
   		 		<li></li>
   		 	</ul>
   		</div>

   		<div class="sidebar">
        <a href=""><i class="fa fa-user-o"> <?php echo $login_session; ?></i> </a>
  		  <a href="insertalbum.php"><i class="fa fa-database"></i> Insert</a>
  	 	 <a href="update.php"><i class="fa fa-pencil-square-o"></i> Update</a>
 		<a href="delete.php"><i class="fa fa-times"></i> Delete</a>
 		<a href="search.php"><i class="fa fa-binoculars"></i> Search</a>
 		<a href = "logout.php"><i class="fa fa-user-o"> Logout</a>
		</div>

    <h1 style="font-family:verdana font-size:30px;"> Delete Album or Songs</h1>
        <div id="inputform1" class="container">
            <form method="POST">
              <label for="albumname">Album Name to Delete</label>
              <input type="text" id="albumname" name="albumname">

      
              <input type="submit" name="submit" value="Submit">
            </form>
        </div>

        <div id="inputform2" class="container">
            <form method="POST">

              <label for="name">Name</label>
              <input type="text" id="name" name="name">
        
              <input type="submit" value="Submit">
            </form>
        </div>

   		
   		<?php

                  $mysql_host     = "localhost";
                  $mysql_username = "root";
                  $mysql_password = "";
                  $mysql_database = "album management system";
                  $conn  =mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);
			 
                  if(!empty($_POST["albumname"]) )
                  {
                      $albumname = $_POST['albumname'];
                      

                      
                      $prepare1 = "select a_id from album where name = '$albumname' ";
                      $result = mysqli_query($conn,$prepare1);
                      while($row = mysqli_fetch_array($result))
                      {
                         $alb_id=$row['a_id'];
                        
                      }
                      $mysqli  = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

                      $prepare2=$mysqli->prepare("DELETE FROM track WHERE album_id='$alb_id'");
                      $prepare2->execute();

                      $prepare3 = $mysqli->prepare("DELETE FROM album WHERE name='$albumname'");

                      $prepare3->execute();
                      $mysqli->close();
                  }


                  if(!empty($_POST["name"]) )
                  {
                      $tname = $_POST['name'];
                 

                      $mysqli  = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
                      $prepare = $mysqli->prepare("DELETE FROM track WHERE name='$tname'");
                      $prepare->execute();
                      $mysqli->close();


                  }



		  ?>


   </body>
   
</html>