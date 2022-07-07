<?php
 
@include 'server.php';

if (!empty($_POST['login'])) {
   $name = $_POST['Uname'];
   $pass = $_POST['Password'];

   $query = " SELECT * FROM signup_data WHERE name = '$name' && password = '$pass' ";

   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);

   if ($count>0) {
      
    header('location:http://why-a.ga/');     
   } 
   else {
    $error[] ='username or password is incorrect';
   }

}
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="CSSlogin.css">    
</head>    
<body>    
    <h2>Login Page</h2>
    <br>    
    <div class="login">    
    <form id="login" method="post" action="">    
    <div class="error-msg">
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?> 
    </div>
    <br><br>
        <label for="Uname"><b>User Name</b></label>    
        <input type="text" name="Uname" id="Uname" placeholder="Username" required>    
        <br>
        <br>    
        <label for="pwd"><b>Password</b></label>    
        <input type="Password" name="Password" id="pwd" placeholder="Password" required>    
        <br>
        <br>    
        <input type="submit" name="login" id="lgin" value="Login">       
        <br>
        <br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br>
        <br>    
        You Don't Have An Account?<a href="signuppage.php" >Join Now</a>  
    </form>     
 </div>
</body>    
</html>