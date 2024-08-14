function clientSideValidateSignup() {
    const email = document.getElementById('email').value;
    const password = document.getElementById("password").value;
    const password_confirmation = document.getElementById("password-confirmation").value;

    const invalidRedirect = "./Signup.php?message=";

    if (password.length < 8) {
        window.location.href = invalidRedirect + "eight+chars&email=" + encodeURIComponent(email);
        return false;
    }
    console.log(password);

    let oneLetter = false;
    let oneNumber = false;
    for (let i = 0; i < password.length; i++) {
        const char = password.charAt(i);
        if (char.toUpperCase() != char.toLowerCase()) {
            oneLetter = true;
        } else if (char >= '0' && char <= '9') {
            oneNumber = true;
        }

        if (oneLetter && oneNumber) {
            break;
        }
    }

    if (!oneLetter) {
        window.location.href = invalidRedirect + "one+letter&email=" + encodeURIComponent(email);
        return false;
    }

    if (!oneNumber) {
        window.location.href = invalidRedirect + "one+number&email=" + encodeURIComponent(email);
        return false;
    }

    if (password.equals !== password_confirmation) {
        window.location.href = invalidRedirect + "must+match&email=" + encodeURIComponent(email);
        return false;
    }

}