<!DOCTYPE html>
<?php
require_once "pdo.php";
session_start();

$nameErr = $emailErr = $genderErr = $passErr = "";
$name = $email = $gender = $comment = $website = "";
if (empty($_POST["username"])) {
    $nameErr = "* Name is required";
  } else {
    $name = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed";
    }
  }

  if (empty($_POST["Email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = test_input($_POST["Email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format";
    }
  }




  if (empty($_POST["password"])) {
    $passErr = "* Password is required";
  } else {
    $password = test_input($_POST["password"]);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    // check if e-mail address is well-formed
    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        $passErr = "* Requirements : Min 8 characters,Uppercase letter and a number";
      }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<script>

function preback(){window.history.forward();}
setTimeout("preback()",0);
window.onunload = function(){null};


</script>

<html>
<head>
<title>REGISTER HERE</title>
<link rel="stylesheet" type="text/css" href="loginform.css">

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<style>
input[type=text], input[type=password] {
  text-align: center;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  margin : 10px;
}

.error {color: #FF0000;}

.all{
    font-family: Helvetica;

}

h2{
    font-size: 30px;
    color: white;
}

form {
  border: 3px solid #f1f1f1;
  background-color:#94b9f7;}

  .container {
  padding: 16px;
}
</style>





<body class="all">
    <div class="container" style="background-color:#5892f5">
    <center><h2>Register</h2></center>
    </div>
    <form method="post">
    <center><h4>Enter Userame:  <input type="text" placeholder="Enter Username" name="username"><br><span class="error"> <?php echo $nameErr;?></span><br></h4></center>
    <center><h4>Enter Password:  <input type="password" placeholder="Enter Password" name="password"><br><span class="error"> <?php echo $passErr;?></span><br></h4></center>
    <center><h4>Email Address:  <input type="text" placeholder="Enter Email" name="Email"><br><span class="error"> <?php echo $emailErr;?></span><br></h4></center>
    <center><h4><input type="radio" id="admin" name="type" value="Admin">
                <label for="admin">Admin</label><br>
                <input type="radio" id="user" name="type" value="user">
                <label for="user">User</label><br></center>
    
    <center><input type="submit" value="SUBMIT" style="font-size:20px"></center>
    <br>
    <div class="container" style="background-color:#94b9f7">
    <center><a href="login.php">Already Registered? Go to Login Page</a><br></center>  
    </div>
    <br>
    <br>
    <br>
</form>

<?php

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["Email"]) && isset($_POST["type"])){
            
    $sql = "INSERT INTO user (username, Email, password,type)
      VALUES (:username, :Email, :password, :type)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
        ':username' => $_POST['username'],
        ':Email' => $_POST['Email'],
        ':type' => $_POST['type'],
        ':password' => md5($_POST['password'])));
        $_SESSION['success'] = 'Successfully Registered';
        header( 'Location: login.php' ) ;
        return;
    }

    ?>




</body>
</html>




