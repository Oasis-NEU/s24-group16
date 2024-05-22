const nameText = document.getElementById('nameText');
const yearText = document.getElementById('yearText');
const majorText = document.getElementById('majorText');
const lookingText = document.getElementById('lookingText');
const contactsText = document.getElementById('contactsText');

function retrieve() {
    nameText.innerText = ""; // SQL Retrieval here
    yearText.innerText = "Year: " + "";//SQL Retrieval here
    majorText.innerText = "Major: " + "";//SQL Retrieval here
    lookingText.innerText = "What I'm looking for in a study buddy: " + "";//SQL Retrieval here
    contactsText.innerText = "Contacts: " + "";//SQL Retrieval here
}