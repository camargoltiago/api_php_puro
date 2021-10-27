#MYSQL

CREATE DATABASE api_php_puro;

USE api_php_puro;

CREATE TABLE notes (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    body text(255) NOT NULL,
    PRIMARY KEY (id)
);