-- Creates tables in the database: only needs to be executed once per server.

CREATE TABLE profile (
    email VARCHAR(255) PRIMARY KEY,
    password_hash TEXT,
    first_name VARCHAR(255), 
    last_name VARCHAR(255), 
    year INTEGER, 
    major VARCHAR(255), 
    contacts VARCHAR(255), 
    looking_for VARCHAR(255), 
    bio VARCHAR(255),
    classes VARCHAR(255)
);

CREATE TABLE class (
    department_code VARCHAR(255), 
    department_number INTEGER,
    name VARCHAR(255),
    description VARCHAR(10000),
    people VARCHAR(255),
    PRIMARY KEY(name)
);
