
CREATE DATABASE IF NOT EXISTS skillswap;
USE skillswap;

USE skillswap;


CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  department VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS skills (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  skill_name VARCHAR(100) NOT NULL,
  type ENUM('teach','learn') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


INSERT INTO users (name, email, password, department)
VALUES 
('Hira Mim', 'hira@gmail.com', '1234', 'CSE'),
('Sara Khan', 'sara@gmail.com', '1234', 'BBA');

INSERT INTO skills (user_id, skill_name, type)
VALUES 
(1, 'PHP', 'teach'),
(1, 'HTML', 'teach'),
(2, 'Graphic Design', 'teach'),
(2, 'PHP', 'learn');

