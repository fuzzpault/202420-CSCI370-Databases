-- tZ819r1AmTX8

DROP DATABASE IF EXISTS MovieRatings;
CREATE DATABASE MovieRatings;
USE MovieRatings;

CREATE TABLE user (
    email VARCHAR(100),
    password VARCHAR(200),
    PRIMARY KEY (email)
);

INSERT INTO user (email, password) VALUES
("user1@uindy.edu", '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8'),
("user2@uindy.edu", '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');