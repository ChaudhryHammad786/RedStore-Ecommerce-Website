<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `register` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if($password == $cpassword){
            //$hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `register` ( `username`, `password`) VALUES ('$username', '$password')";
            $res =mysqli_query($conn, $sql);
            if ($res){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" >
    <title>RedStore | Ecommerce Website</title>
    <!-- link with html and css file -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>
<body>


<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
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
    

    




























     <div   class="container" >
        <div class="navbar">
            <div class="logo">
                <!-- Redstore logo -->
                <img src="images/logo.png"  width="125px">
                
            </div>
           
            <!-- now we will add one icon in this navigation menu top which is cart icon -->
            <!-- <img src="images/cart.png" width="25px" height="25  px"> -->
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()"  >
            <nav>
                <ul id="MenuItems" >
                        <!-- anchor tag -->
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href=".html">About</a></li>
                        <li><a href="home.html">Contact</a></li>
                        <!-- <li><a href="account.html">Account</a></li> -->
                </ul>
            </nav>
            <!-- now we will add one icon in this navigation menu top which is cart icon -->
            <a href="cart.html"><img src="images/cart.png" width="25px" height="25px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()"  >
        </div>
        </div>







    <!-- account page  -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%">
                </div>

                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span  > <a href="login.php">Login</a> </span>
                            <span onclick="register()" >Register</span>
                            <hr id="Indicator" >
                        </div>
                       
                        
                        <form     action="/project/signup.php" method="post" id="RegForm"  >
                            <input type="text" name="username"  id="username"  placeholder="Username">
                            
                            <input type="password"  name="password" id="password" placeholder="Password">
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password">
                            <button type="submit" class="btn" >Register</button>
                        </form>



                    </div>
                </div>
            </div>
    </div>
    </div>
    










































                <!-- -------------Footer-------------  -->

                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="footer-col-1">
                                <h3>Download Our App</h3>
                                <p>
                                    Download App For Android and IOS Mobile Phone.
                                    
                                </p>
                                <div class="app-logo">
                                    <img src="images/play-store.png" alt="">
                                    <img src="images/app-store.png" alt="">
                                </div>
                            </div>
                            <div class="footer-col-2">
                                <img src="images/logo-white.png" alt="">
                                <p>
                                    Our Purpose Is To Sustainably Make the Pleasure and 
                                    Benefits of Sports Accessible to the Many.

                                </p>
                            </div>
                            <div class="footer-col-3">
                                <h3>Useful Links</h3>
                                <ul>
                                    <li>Coupons</li>
                                    <li>Blog Post</li>
                                    <li>Return Policy</li>
                                    <li>Join Affiliate</li>
                                </ul>
                            </div>
                            <div class="footer-col-4">
                                <h3>Follow us</h3>
                                <ul>
                                    <li>Facebook</li>
                                    <li>Twitter</li>
                                    <li>Instagram</li>
                                    <li>YouTube</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <p class="Copyright" >Copyright 2020 - Easy Tutorials</p>
                    </div>
                </div>
                
    




    <!-- Finals Start  -->
<!-- js for toggle menu  -->
<script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight="0px"; 
    // when we click menu toggle we create function 
    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px") 
        {
            MenuItems.style.maxHeight="200px"; 
        }
        else{
            MenuItems.style.maxHeight="0px";
        }
    }
</script>







<!-- js for toggle Form  -->
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");

    // creating function of register and login
    function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }
    function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";

    }

    // Add event listeners
    document.getElementById("registerButton").addEventListener("click", register);
    document.getElementById("loginButton").addEventListener("click", login);
</script>

    </body>
</html>






