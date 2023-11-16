<?php
session_start();

       include("connection.php");
       include("functions.php");

        if ($_SERVER['REQUEST_METHOD'] == "POST")
 {
        //something was posted
       $user_name = $_POST['user_name'];
       $password = $_POST['password'];

       if(!empty($user_name) && !empty($password) && !is_numeric($user_name))

      {

              //save to database
               $user_id = random_num(20);
               $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

         
      
               mysqli_query ($con,$query);
             
               header("Location: login.php");
               die;
      }else
      {
          echo "Please enter some valid information!";

      }
 }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
</head>
<body>
   <style type= "text/css">

     #text{
           height: 25px;
           border-radius: 5px;
           padding:10px;
           border: solid thin #aaa;
           width: 100%;
     }

     #button{
      padding: 10px;
      width: 150px;
      color: dimgray;
      background color: lightblue;
      border: none;

     }


     #box{
     	background-color: lightblue;
     	margin: auto;
     	width: 300px;
     	padding: 200px;


     }

 </style>

 <div id="box">
 	<form method="post">
 		<div style= "font-size: 50px;margin: 20px;color: white;">Sign Up</div>

 		<input id="text" type="text" name="user_name"><br><br>
 		<input id="text" type="password" name="password"><br><br>

 		<input id="button"type="submit"  value="Sign Up"><br><br>
 		<input id="button"type="submit"  value="Continue with Google"><br><br>

 		<a href="login.php">Click to Login</a><br><br>

    </form>		
 </div>
</body>
</html>