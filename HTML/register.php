<?php
include("includes/setup.php");

if(isset($_POST['register'])){
    $u = trim($_POST['username']);
    $p = md5(trim($_POST['password']));

    mysqli_query($conn,"INSERT INTO users_simple(username,password) VALUES('$u','$p')");
    header("Location: login.php");
}
?>

<html>
<head>
<link rel="stylesheet" href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<script>
function validateForm(){
    let u = document.getElementById("user").value;
    let p = document.getElementById("pass").value;

    if(u=="" || p==""){
        alert("Please fill all fields");
        return false;
    }

    if(p.length < 4){
        alert("Password must be at least 4 characters");
        return false;
    }

    return true;
}
</script>

</head>

<body>

<div class="form-box">

<h2 style="text-align:center;">Create Account</h2>

<form method="POST" onsubmit="return validateForm()">

<input type="text" name="username" id="user" placeholder="Username">

<input type="password" name="password" id="pass" placeholder="Password">

<button class="btn" name="register">Register</button>

</form>

<p style="text-align:center;">
Already have an account? <a href="login.php">Login</a>
</p>

</div>

</body>
</html>