<?php
session_start();
include("includes/setup.php");

$id = $_GET['id'];
$res = mysqli_query($conn,"SELECT * FROM hotel_rooms WHERE id=$id");
$data = mysqli_fetch_assoc($res);

if(isset($_POST['book'])){
    $user = $_SESSION['user'];
    mysqli_query($conn,"INSERT INTO bookings_data(user,room_id) VALUES('$user',$id)");
    header("Location: my_bookings.php");
}
?>

<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
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
<a href="search_rooms.php" class="back-btn">← Back</a>
<div class="page-container">

<a href="search_rooms.php" class="back-btn">← Back to rooms</a>

<h2 class="page-title"><?php echo $data['room_name']; ?></h2>

<div class="room-card">
<img src="<?php echo $data['img']; ?>">

<div class="room-content">
<p class="price">$<?php echo $data['price']; ?> / night</p>
<p>Nice and comfortable room for your stay.</p>

<form method="POST">
<button class="btn" name="book">Book Now</button>
</form>
</div>
</div>

</div>

</body>
</html>