<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
     $sql = "Select * from users where username='$username' AND password='$password'";
   // $sql = "Select * from register where username='$username'";
    $result = mysqli_query($conn, $sql);
    // $num = mysqli_num_rows($result);
    // if ($num == 1){
    //     while($row=mysqli_fetch_assoc($result)){
        //    if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location:new/index.html");
          //  } 
            //else{
              //  $showError = "Invalid password";
            }
        //}
        
    //} 
    else{
        $showError = "Invalid user name";
    //}
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

<div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()" >Login</span>
                            <span onclick="register()" >Register</span>
                            <hr id="Indicator" >
                        </div>
                        <form   action="/project/login.php" method="post"  >
                            <input type="text"   id="username" name="username" placeholder="Username">
                            <input type="password"   id="password" name="password"  placeholder="Password">
                            <button type="submit" class="btn" >Login</button>
                            <a href="">Forgot password</a>
                        </form>
    
  </body>
</html>