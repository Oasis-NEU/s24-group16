const form = document.getElementById('login');
//const email = form.elements['inputEmail'];
//const password = form.elements['inputPassword'];
const emailWarning = document.getElementById('emailWarning');
const passwordWarning = document.getElementById('passwordWarning');

function notEmpty(input, text, msg) {
    if (input.value.trim() === "") {
        text.innerText = msg;
        return false;
    }
    text.innerText = "";
    return true;
}

form.addEventListener("submit", function(event) {
    // stop form submission
    event.preventDefault();

    //validate the form
    let emailValid = notEmpty(form.elements["inputEmail"], emailWarning, "Please enter something.");
    let passwordValid = notEmpty(form.elements["inputPassword"], passwordWarning, "Please enter something.");

    if (emailValid && passwordValid) {
        console.log("success") // actual behavior here
    }
})