<?php
 
@include 'server.php';

if(isset($_POST['signp'])){

   $name = mysqli_real_escape_string($conn, $_POST['Uname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['Password']);
   $cpass = ($_POST['CPassword']);
  

   $select = " SELECT * FROM signup_data WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO signup_data(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:loginpage.php');
      }
   }

};


?>
<!DOCTYPE html>    
<html>    
<head>    
    <title>Sign Up Form</title>    
    <link rel="stylesheet" type="text/css" href="CSSsignup.css">    
</head>    
<body>    
    <h2>Sign Up</h2>
    <br>    
    <div class="signup">    
    <form id="signup" method="POST" action="">   
    <div class="error-msg">
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?> 
    </div>
    
      <br>
      <br>
        <label for="Uname"><b>User Name</b></label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username" required>    
        <br>
        <br>
        <label for="email"><b>Email</b></label><br>
        <input id="email" type="email" name="email" placeholder="example@gmail.com" required>    
        <br>
        <br>
        <label for="pwd"><b>Password</b></label>    
        <input type="Password" name="Password" id="pwd" placeholder="Password" required >    
        <br>
        <br>    
        <label for="Cpwd"><b>Confirm Password<b></label>
        <input id="Cpwd" name="CPassword" type="Password" placeholder="Confirm Password" required>
        <br>
        <br>
        <input type="submit" name="signp" id="sign" value="signup">       
        <br>
        <br>    
        Already Has An account?<a href="loginpage.php" >Log in</a>
    </form>     
 </div>
</body>    
</html>