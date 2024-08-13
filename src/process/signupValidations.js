function clientSideValidateSignup() {
    const password = document.getElementById("password");
    const password_confirmation = document.getElementById("password-confirmation")

    console.log('Hi');
    const invalidRedirect = "";

    if (password.length < 8) {
        window.location.href = invalidRedirect + "eight+chars";
        return false;
    }

    let oneLetter = false;
    let oneNumber = false;
    for (let i = 0; i < password.length; i++) {
        const char = password.charAt(i);
        if ((/[a-zA-Z]/).test(char)) {
            oneLetter = true;
        } else if (char >= '0' && char <= '9') {
            oneNumber = true;
        }

        if (oneLetter && oneNumber) {
            break;
        }
    }

    /*
    if (!oneLetter) {
        window.location.href = invalidRedirect + "one+letter";
        return false;
    }*/

    if (!oneNumber) {
        window.location.href = invalidRedirect + "one+number";
        return false;
    }

    if (password.equals !== password_confirmation) {
        window.location.href = invalidRedirect + "must+match";
        return false;
    }

}