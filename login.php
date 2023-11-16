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

              //read from database
              
               $query = "select * from users where user_name = '$user_name' limit 1";
      
               $result = mysqli_query ($con,$query);

               if ($result)
               {

               	if($result && mysqli_num_rows($result) > 0)

                 	{

                 $user_data = mysqli_fetch_assoc($result);

                  if($user_data['password'] === $password)
                  {

                     $_SESSION['user_id'] = $user_data['user_id'];
                     header("Location: index.php");
                          die;

                        }

                	}
               }
           echo "Invalid Username or Password!";  
              
      }else
      {
          echo "Invalid Username or Password!";

      }
 }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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
      width: 100px;
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
 		<div style= "font-size: 50px;margin: 20px;color: white;">Login</div>

 		<input id="text" type="text" name="user_name"><br><br>
 		<input id="text" type="password" name="password"><br><br>

 		<input id="button"type="submit"  value="Login"><br><br>

 		<a href="signup.php">Click to Sign Up</a><br><br>

    </form>		
 </div>
</body>
</html>