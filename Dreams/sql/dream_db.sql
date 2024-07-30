CREATE DATABASE dream_db;

USE dream_db;

CREATE TABLE dreams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    dream_type ENUM('Good', 'Bad') NOT NULL,
    dream_description TEXT NOT NULL
);
