let mysql = require('mysql');

let connection = mysql.createConnection({
  host: process.env.DB_HOST,
  port: process.env.DB_PORT,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_NAME,
});

function getValue() {
    let name = document.getElementById("inputName");
    let nameValue = name.value;
    let year = document.getElementById("inputYear");
    let yearValue = year.value;
    let major = document.getElementById("inputMajor");
    let majorValue = major.value;
    let lookingFor = document.getElementById("inputLookingFor");
    let lookingForValue = lookingFor.value;
    let contacts = document.getElementById("inputContacts");
    let contactsValue = contacts.value;
    //will insert the value given for name twice as the first and surname, need to separate these in the form
    //add minor to form 
    //do something smart that will input an empty / null value if nothing was inputted
    let valuesToInsert= [nameValue, nameValue, majorValue, yearValue, lookingForValue, contactsValue];
}

connection.connect((err) => {
    if (err) return console.error(err.message);
  
    let sqlInsertValues = `INSERT INTO Profile(NUID, FirstName, LastName, Major, Minor, Grade, Bio, Hometown, Instagram, LookingFor)
               VALUES(?,?)`;
  
    connection.query(sql, valuesToInsert, (err, results, fields) => {
      if (err) return console.error(err.message);
    });

    connection.end();
  });

