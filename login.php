
<!DOCTYPE html>
<?php
require_once "pdo.php";
#session_start();

?>
<html>
<head>
<?php
session_start();
?>
<title>LOGIN HERE</title>
<link rel="stylesheet" type="text/css" href="loginform.css">
</head>
<style>

.all{
    font-family: Helvetica;

}
/* Bordered form */
form {
  border: 3px solid #f1f1f1;
  background-color:#94b9f7;}

/* Full-width inputs */
input[type=text], input[type=password] {
  text-align: center;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 100px 550px;
  border: none;
  cursor: pointer;
  width: 25%;
  text-align: center;
  
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}



/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

h2{
    color:white;
    font-size:30px;
}

}

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--<script>
    $("document").ready( function () {
        alert("You have logged in succesfully");
    }); 
</script>
-->

<script>

function preback(){window.history.forward();}
setTimeout("preback()",0);
window.onunload = function(){null};


</script>


<body class="all">
	<div class="container" style="background-color:#5892f5">
	<center><h2>LOGIN </h2></center>
	</div>
    <form method="post">
    
    <center><h3>Username:   <input type="text" placeholder="Enter Username"  name="username"><br></h3></center>
    <center><h3>Password:   <input type="password" placeholder="Enter password"  name="password"><br></h3></center>
    <div class="container">
    <center><a href="register.php">New here ? Click to Register</a><br></center>
    </div>
<br>
    <div>
    <center><input type="submit" value="LOGIN" style="font-size: 20px"></center>
    <br>
    <br>
    <br>
    </div>
    </form>
<?php
    
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $name = $_POST["username"];
            $pass = md5($_POST["password"]);

            $stmt = $pdo->query("SELECT username,Email,password,type from user ");
            

                    while($row = $stmt->fetch(PDO :: FETCH_ASSOC)){
                        if($row['username']==$name && $row['password']==$pass){
                            $_SESSION["login"]="Login Successful";
                            if($row['type']=='Admin'){
                                header("Location:index1.php");
                                $_SESSION['loggedIn'] = true;  

                            }
                            if ($row['type']=='user'){
                                header("Location:index.php");
                                $_SESSION['loggedIn'] = true;  

                            }
                            
                            


                    }
            
            
            
            
                }
            
            
            }
        
    
?>
</body>
</html>