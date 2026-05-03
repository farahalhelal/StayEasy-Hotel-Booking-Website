<?php
$conn=mysqli_connect("localhost","root","");
mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS stayeasy_db");
mysqli_select_db($conn,"stayeasy_db");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS users_simple(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),password VARCHAR(100))");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS hotel_rooms(
id INT AUTO_INCREMENT PRIMARY KEY,
room_name VARCHAR(100),price INT,img VARCHAR(100))");

mysqli_query($conn,"CREATE TABLE IF NOT EXISTS bookings_data(
id INT AUTO_INCREMENT PRIMARY KEY,
user VARCHAR(50),room_id INT)");

$c=mysqli_query($conn,"SELECT * FROM hotel_rooms");
if(mysqli_num_rows($c)==0){
mysqli_query($conn,"INSERT INTO hotel_rooms(room_name,price,img) VALUES
('Single Room',100,'images/room1.jpg'),
('Double Room',150,'images/room2.jpg')");}
?>