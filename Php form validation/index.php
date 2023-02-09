<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
$name = $email = $pass = "";
// define variables and set to empty values
$nameErr = $emailErr  = $passError = $sucess = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // name validation 
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
     }else {
        $name = test_input($_POST["name"]);
     }
     
     if (empty($_POST["email"])) {
        $emailErr = "Email is required";
     }else {
        $email = test_input($_POST["email"]);
        
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $emailErr = "Invalid email format"; 
        }
     }
     if ($_POST["password"] === $_POST["confirm_password"]) {
        // success!
     } else {
        $passError = "password not match";
     }


     if($nameErr = $emailErr  = $passError = ""){
        $sucess = "successfully validated";
     }


    
}


?>

   <div class="container">
   <h2>PHP Form Validation Example</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <span class = "error"> <?php echo $nameErr; ?> <br> <?php echo $emailErr; ?> <br> <?php echo $passError; echo $sucess;  ?> </span>
   
        <div class="form-box">
        <br><br>
        Name: <input type="text" name="name">
        <br><br>
        E-mail: <input type="text" name="email">
        <br><br>
        password: <input type="pass" name="password">
        <br><br>
        Confirm password: <input type="pass" name="confirm_password">
        <br><br>
        </div>
    
     
        <input type="submit" name="submit" value="Submit">
    </form>
   </div>

    <?php

?>

<style>
    .container{
        width: 30%;
        border: 2px solid black;
        background-color: lightblue;
        padding: 5pc;
        margin: auto;
        margin-top: 100px;
       
    }
    .form-box{
        
        display: block;
        /* justify-content: center; */
        align-items: center;
    }
</style>

</body>

</html>