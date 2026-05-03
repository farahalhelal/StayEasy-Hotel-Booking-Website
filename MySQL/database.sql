CREATE DATABASE stayeasy_db;

USE stayeasy_db;

CREATE TABLE users_simple (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100)
);

CREATE TABLE hotel_rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100),
    price INT,
    img VARCHAR(100)
);

CREATE TABLE bookings_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    room_id INT
);