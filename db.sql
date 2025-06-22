-- Create database
CREATE DATABASE spendwise;

-- Use the database
USE spendwise;

-- Create income table
CREATE TABLE income (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount INT NOT NULL,
    date DATE NOT NULL,
    description TEXT
);

-- Create expenses table
CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount INT NOT NULL,
    date DATE NOT NULL,
    description TEXT
);

