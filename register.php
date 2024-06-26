<?php
include('config.php');
include('encryption.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="signup.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <br>
    <br>
    <form action="register.php" method="post">
        <h2>CREATE AN ACCOUNT</h2>
        <div class="cv"><p>Create an account to enjoy all our features ad-free </p></div>      
        <br>      
        <div class="ph">
        <input type="email" name="Email" id="Email" placeholder="Email">
        <br>
        <br>
        
        <input type="text" name="Username" id="Username" placeholder="Username">
        <br>
        <br>
        
        <input type="password" name="password" id="password" placeholder="Password">
        <br>
        <br>
        
        <input type="password" name="password" id="password" placeholder="Confirm Password">
    </div>
        <br>
        <br>
        <div class="sign"> <button type="submit">Register</button></div>
        
        <br>
        <div class="line">
            <div class="line1"></div>
            <p> or </p>
            <div class="line1"></div>
        </div> 
        
        <div class="dot"><button><a href="#"> <i class='bx bxl-google'></i>  Sign in with Google</a></div></button>
        <br>
        <p>Already have an account? <a href="login.php"> Sign in</a></p>



    </form>
</body>

</html>