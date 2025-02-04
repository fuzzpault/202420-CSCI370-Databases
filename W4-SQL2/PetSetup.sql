DROP DATABASE if EXISTS Animals;
CREATE DATABASE Animals;

USE Animals;

CREATE TABLE Pets (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(20),
    type VARCHAR(20),
    age FLOAT,
    owner VARCHAR(20),
    vaccinated TINYINT);

