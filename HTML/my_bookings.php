<?php
session_start();
include("includes/setup.php");

$user=$_SESSION['user'];

if(isset($_GET['cancel'])){
    $id=$_GET['cancel'];
    mysqli_query($conn,"DELETE FROM bookings_data WHERE id=$id");
}

$res=mysqli_query($conn,"
SELECT bookings_data.id, hotel_rooms.room_name 
FROM bookings_data 
JOIN hotel_rooms ON bookings_data.room_id = hotel_rooms.id
WHERE bookings_data.user='$user'
");
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

<div class="page-container">

<h2 class="page-title">My Bookings</h2>

<div class="table-box">
<table>
<tr>
<th>ID</th>
<th>Room</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($res)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['room_name']; ?></td>
<td>
<a class="btn" href="?cancel=<?php echo $row['id']; ?>">Cancel</a>
</td>
</tr>
<?php } ?>

</table>
</div>

</div>
</body>
</html>