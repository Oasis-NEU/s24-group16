/**
 * Creates html elements appended onto the element with id "classmates"
 * for a single classmate hyperlink that can be clicked on to view their profile.
 * @param {*} encodedEmail the email of the classmate, encoded 
 * @param {*} first_name the first name of the classmate
 * @param {*} last_name the last name of the classmate
 */
function displayClassmate(encodedEmail, first_name, last_name) {
    let hyperLink = document.createElement('a');

    hyperLink.href = "ViewProfile.php?profile='" + encodedEmail + "'>";
    
    let name = document.createElement('p');

    name.style = "margin-left: 2vw; margin-top: 10px;";
    name.innerText = first_name + " " + last_name;

    hyperLink.appendChild(name);

    document.getElementById("classmates").appendChild(hyperLink);
}

/**
 * Creates an element appended as the child of the element with id "classmates-intro"
 * to tell the user that they have no classes
 */
function displayNoClassmates() {
    let info = document.createElement('p');
    
    info.innerText = "Oh no! There are no classmates using Study Buddy in your class:"
    + " try reaching out to your professor to introduce more of your classmates to this platform!";

    document.getElementById("classmates").appendChild(info);
}