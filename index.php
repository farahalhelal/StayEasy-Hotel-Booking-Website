<?php session_start(); include("includes/setup.php"); ?>
<!DOCTYPE html>
<html><head><title>StayEasy</title><link rel="stylesheet" href="css/style.css"></head>
<body>
    
<?php session_start(); ?>

<header class="main-header">
    <div class="logo">StayEasy <span>Hotel</span></div>

    <nav>
        <a href="index.php">Home</a>
        <a href="search_rooms.php">Find Rooms</a>

        <?php if(isset($_SESSION['user'])){ ?>
            <a href="my_bookings.php">My Bookings</a>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
        <?php } ?>
    </nav>
</header>

<section class="hero"><img src="images/banner.jpg"></section>
<footer><p>Student Project IT361</p></footer>
</body></html>