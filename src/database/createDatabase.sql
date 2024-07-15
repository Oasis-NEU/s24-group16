CREATE TABLE profile (
    email TEXT PRIMARY KEY,
    password TEXT,
    first_name TEXT DEFAULT 'Your', 
    last_name TEXT DEFAULT 'Name', 
    year INTEGER, 
    major TEXT, 
    contacts TEXT, 
    looking_for TEXT, 
    bio TEXT
);