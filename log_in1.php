<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    

<?php
$nameErr = $regnoErr = $emailErr = $websiteErr = $PassErr = $PassE = "";
$name = $regno = $email = $website = $password = "";

if(isset($_POST['login'])){
    // $conn = new mysqli('localhost','root','','wedding_planner');
    // die("Error: sjjjjjjjjjjjjj"); 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    if (empty($_POST["regno"])) {
        $regnoErr = "Registration No is required";
     }
     else {
        $regno = test_input($_POST["regno"]);}
     if (empty($_POST["password"])) {
        $PassErr = "Password is required";
        }
        else {
            $password = test_input($_POST["password"]);
   
         }
         $conn = new mysqli('localhost','root','','wedding_planner');
         $sql = "SELECT * FROM vendor WHERE regno = '$regno' && password = '$password'";
           $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
             if ($rowCount>0) {
            //    $PassE= "Login successful";
                // die("Error: sjjjjjjjjjjjjj"); 
                header("Location: vendor.php");
             }
             else{
               $PassE= "Login failed";
                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             }

 }
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      } 
      $name = test_input($_POST["name"]);
      $regno = test_input($_POST["regno"]);
      $email = test_input($_POST["email"]);
      $password = test_input($_POST["password"]);
      
      $conn = new mysqli('localhost','root','','wedding_planner');
      $sql = "SELECT * FROM vendor WHERE regno = '$regno'";
      $result = mysqli_query($conn, $sql);
       $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
            die("Error: regno already exist.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // array_push($errors, "Email is not valid");
            die("Error: Email is not valid");
           }
      else{
        $sql="insert into vendor (username,regno,email,password)values('$name','$regno','$email','$password')"; 
      if (mysqli_query($conn, $sql)) {
        // $PassE= " successful";
        echo"successfull registration";
          header("Location:log_in1.php");
         
      } else {
        // $PassE = "Registration failed";
        echo"failed";
        
          }
      }

}


  
?>

    <header class="header">
        <a href="#" class="logo"><span>Wedding</span>Blast</a>
        <nav class="navbar">
            <a href="Home.php#home">home</a>
            <a href="Home.php#services">services</a>
            <a href="Home.php#about">about</a>
            <a href="Home.php#gallery">gallery</a>
            <a href="Home.php#price">price</a>
            <a href="Home.php#review">review</a>
            <a href="Home.php#contact">contact</a>
        </nav>
      
        
    </header>
    <div class="wrapper">
        
        <div class="form-box login">
         <h2>Sign in</h2>
         <form  method="POST" action="">
         <div class="input-box">
                <span class="icon"><ion-icon name="code-working-outline"></ion-icon></span>
                <input type="text" required name="regno">
                <label>Registration No</label>
            </div>
            
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password">
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password</a>
            </div>
            <!-- <button type="submit" class="button"><a href="Home.html">Sign in</a></button> -->
            <input type="submit" name="login" value="Sign in">
            <div class="login-signup">
                <p>Don't have an account? <a href="#" class="register-link">Sign up</a></p>
            </div>
         </form>
        </div>
        <div class="form-box register">
         <h2>Sign up</h2>
         <form method="post" action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                <input type="text" required name="name">
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="code-working-outline"></ion-icon></span>
                <input type="text" required name="regno">
                <label>Registration No</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" required name="email">
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" required name="password">
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">agree to the terms & conditions</label>
                
            </div>
            <input type="submit" name="submit" value="Sign Up"> 
            <!-- <button type="submit" class="button"><a href="Home.html">Sign up</a></button> -->
            <div class="login-signup">
                <p>Already have an account?<a href="#" class="login-link">Sign in</a></p>
            </div>
         </form>
        </div>
        
        
    </div>
    <script src="script1.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>