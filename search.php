
<?php
   include('session.php');
?>

<html>
<head>
<title>Search</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
    
    .search-box{
        width: 590px;
        position: relative;
        display: inline-block;
        font-size: 14px;
        margin-left: 400px;
        margin-top: 50px;
        border: 2px solid black;
    }
    .search-box input[type="text"]{
        height: 70px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }


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

          table {
            margin-left: 400px;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 40%;
          }

           td,  th {
            border: 1px solid #ddd;
            padding: 3px;
          }

          tr:nth-child(even){background-color: #f2f2f2;}

          tr:hover {background-color: #ddd;}

          th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: black;
            color: white;
          }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
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

       		
       		<form method="POST">

    		    <div class="search-box">
    		        <input type="text" autocomplete="off" name="search" id="search" placeholder="Search albums..." />
    		        <div class="result"></div>
    		    </div>

    		    <input type="submit" name="submit"  value="submit" style="margin-left: 630px; margin-top: 30px">

    	    </form>

          <?php

            $mysql_host     = "localhost";
            $mysql_username = "root";
            $mysql_password = "";
            $mysql_database = "album management system";  
            $conn  =mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);

            if(!empty($_POST["search"]))
            { 
              $query = "SELECT * FROM album WHERE name = '".$_POST["search"]."'";

              $result = mysqli_query($conn,$query);
              echo "<table>"; 
              echo"<tr><th>Album-ID</th><th>No of songs</th><th>Creator id</th><th>date of release</th><th> name</th></tr>";
              while($row = mysqli_fetch_array($result))
              {  
                echo "<tr><td>" . $row['a_id'] . "</td><td>" . $row['no_of_songs'] ."</td><td>".$row['c_id']."</td><td>".$row['d_o_creation']."</td><td>".$row['name']."</td></tr>";
              }




            
              echo "</table><br>"; 
              $result = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result))
              {
                 $alb_id=$row['a_id'];
                
              }
             


              $query2 = "SELECT * FROM track WHERE album_id = '".$alb_id."'";
            
              $result2 = mysqli_query($conn,$query2);
              echo "<table>"; 
              echo"<tr><th>Track-ID</th><th>Track-Name</th><th>Rating</th><th>Length</th><th>Album-ID</th><th>Artist-ID</th></tr>;";

              while($row2 = mysqli_fetch_array($result2))
              {  
                
                echo "<tr><td>" . $row2['t_id'] . "</td><td>" . $row2['name'] ."</td><td>".$row2['rating']."</td><td>".$row2['length']."</td><td>".$row2['album_id']."</td><td>".$row2['art_id']."</td></tr>";
              }
              echo "</table>";

            
            }

          ?>

</body>
</html>