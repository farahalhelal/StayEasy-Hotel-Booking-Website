<?php
session_start();
include("includes/setup.php");

if(isset($_POST['login'])){
    $u = trim($_POST['username']);
    $p = md5(trim($_POST['password']));

    $res = mysqli_query($conn,"SELECT * FROM users_simple WHERE username='$u'");

    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);

        if($row['password'] == $p){
            $_SESSION['user']=$u;
            header("Location: index.php");
        } else {
            echo "<script>alert('Wrong password');</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
?>

<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="form-box">
<h2 style="text-align:center;">Login</h2>

<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button class="btn" name="login">Login</button>
</form>

<p style="text-align:center;">
<a href="register.php">Create account</a>
</p>
</div>

</body>
</html>