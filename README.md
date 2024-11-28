# Rubyublade
Rubyublade TM Website 

PHP development version 8.2

Installation Guide : 

1 : Create Database

2 : Create tables with this query 

CREATE TABLE blog_posts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    download_link VARCHAR(255),
    image_link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

3 : Edit all PHP files and insert database information
