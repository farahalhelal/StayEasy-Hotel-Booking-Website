<?php 
include("includes/setup.php");
$res = mysqli_query($conn,"SELECT * FROM hotel_rooms");
?>

<html>
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<script>
function filterRooms(){
    let input = document.getElementById("searchBox").value.toLowerCase();
    let minPrice = document.getElementById("minPrice").value;
    let cards = document.getElementsByClassName("room-card");

    for(let i=0;i<cards.length;i++){
        let text = cards[i].innerText.toLowerCase();
        let price = cards[i].getAttribute("data-price");

        if(text.includes(input) && (minPrice=="" || price >= minPrice)){
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}
</script>

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

<h2 class="page-title">Find Your Room</h2>

<div class="filter-box">
<input type="text" id="searchBox" onkeyup="filterRooms()" placeholder="Search room">
<input type="number" id="minPrice" onkeyup="filterRooms()" placeholder="Min price">
</div>

<div class="room-grid">

<?php while($row=mysqli_fetch_assoc($res)){ ?>
<div class="room-card" data-price="<?php echo $row['price']; ?>">

<img src="<?php echo $row['img']; ?>">

<div class="room-content">
<h3><?php echo $row['room_name']; ?></h3>
<p class="price">$<?php echo $row['price']; ?> / night</p>

<a class="btn" href="room_view.php?id=<?php echo $row['id']; ?>">
View Details
</a>
</div>

</div>
<?php } ?>

</div>

</div>

</body>
</html>