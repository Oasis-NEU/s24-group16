//Note: This isn't currently being used since it uses an outdated version of the database
//but it will still serve useful for the future once it's updated with the current database
let mysql = require('mysql');

let connection = mysql.createConnection({
  host: process.env.DB_HOST,
  port: process.env.DB_PORT,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
});

connection.connect((err) => {
  if (err) return console.error(err.message);
  
  const createLoginTable = `create table if not exists Login (
    NUID INT PRIMARY KEY NOT NULL UNIQUE,
    Email VARCHAR(50) NOT NULL,
    Passwrd VARCHAR(30) NOT NULL
    )`;

  connection.query(createLoginTable, (err, results, fields) => {
    if (err) return console.log(err.message);
  });

  const createProfileTable = `create table if not exists Profile (
    NUID INT PRIMARY KEY NOT NULL UNIQUE,
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    Major VARCHAR(100) NOT NULL, 
    Minor VARCHAR(100), 
    Grade int NOT NULL,
    Bio VARCHAR(150),
    HomeTown VARCHAR(30),
    Instagram VARCHAR(50),
    LookingFor VARCHAR(150),
    FOREIGN KEY (NUID) REFERENCES Login(NUID)
    )`;
    
  connection.query(createProfileTable, (err, results, fields) => {
    if (err) return console.log(err.message);
  });

  const createStudentClassTable = `create table if not exists StudentClass (
    NUID INT PRIMARY KEY NOT NULL,
    ClassID INT PRIMARY KEY NOT NULL,
    FOREIGN KEY (NUID) REFERENCES Profile(NUID),
    FOREIGN KEY(ClassID) REFERENCES Class(ClassID)
    )`;
    
  connection.query(createStudentClassTable, (err, results, fields) => {
    if (err) return console.log(err.message);
  });

  const createClassTable = `create table if not exists Class (
    CLassID INT PRIMARY KEY NOT NULL,
    Title VARCHAR(50), 
    Descrip VARCHAR(150)
    )`;
    
  connection.query(createClassTable, (err, results, fields) => {
    if (err) return console.log(err.message);
  });

  connection.end((err) => {
    if (err) return console.log(err.message);
  });
});
