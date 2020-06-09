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

        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }

        input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
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
  		<a href=""><i class="fa fa-pencil-square-o"></i> Update</a>
 		<a href="update.php"><i class="fa fa-times"></i> Delete</a>
 		<a href="search.php"><i class="fa fa-binoculars"></i> Search</a>
 		<a href = "logout.php"><i class="fa fa-user-o"> Logout</a>
		</div>

    <h3>Contact Form</h3>

    <div class="container">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>

        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>

   		
   		<?php
			
		?>


   </body>
   
</html>