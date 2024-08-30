/**
 * Creates html elements with class title and info but not including classmates looking for buddies.
 * The section with classmates looking for buddies has id "classmates".
 * @param {*} name the name of the class to display
 * @param {*} description the description of the class to display
 */
function displayClassInfo(name, description) {
    let title = document.createElement('h2');

    title.classList = "font-primary text-center";
    title.innerText = name;

    let descriptionElement = document.createElement('p');

    descriptionElement.class = "text-center";
    descriptionElement.style = "margin-top: 5vh";
    descriptionElement.innerText = description;

    let classmatesTitle = document.createElement('div');

    classmatesTitle.innerText = "Classmates looking for buddies:";
    classmatesTitle.style = "margin-top: 5vh;";

    let classmates = document.createElement('div');
    classmates.id = "classmates";

    classmatesTitle.appendChild(classmates);

    document.getElementById("view-class").appendChild(title);
    document.getElementById("view-class").appendChild(descriptionElement);
    document.getElementById("view-class").appendChild(classmatesTitle);

}

/**
 * Displays to the user that they have no classes
 */
function displayNoClasses() {
    let noClasses = document.createElement('h3');

    noClasses.innerHTML = "You have no classes. Go to <a href=\"SearchClass.php\">Find Classes</a> to add some!";

    document.getElementById("view-class").appendChild(noClasses);

}
