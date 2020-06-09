<?php
   include('session.php');
?>



<html>
   
   <head>

      <title>welcome </title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <style>


      		body
      		{
      			margin:0px;
      			padding:0px;
            background-color: white;
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

        #banner
        {
          margin-left: 350px;
          margin-top: 50px;
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
  		<a href="delete.php"><i class="fa fa-pencil-square-o"></i> Update</a>
 		<a href="update.php"><i class="fa fa-times"></i> Delete</a>
 		<a href="search.php"><i class="fa fa-binoculars"></i> Search</a>
 		<a href = "logout.php"><i class="fa fa-user-o"> Logout</i></a>
		</div>

   	<h3 style="font-family: verdana; font-size: 30px; letter-spacing: 5 px; margin-left: 520px;  color: black;"> Music Album Manegement system </h3>
   	<img src="HomeBanner.jpg" id="banner">
    


   </body>
   
</html>