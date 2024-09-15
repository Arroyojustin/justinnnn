-- Create a new database
CREATE DATABASE user_management;

-- Use the new database
USE user_management;

-- Create a table for user information
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
