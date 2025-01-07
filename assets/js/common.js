//Name validation functions

function valid(name) {
    upperCaseName = name.toUpperCase();
    for (let i = 0; i < upperCaseName.length; i++) {
        let charCode = upperCaseName.charCodeAt(i);
        let char = name.charAt(i);

        if (charCode < 65 || charCode > 90) {
            if (char !== '-' && char !== '.') {
                return false;
            }
        }
    }
    return true;
}

function validateName(userName) {
    // userName = document.getElementById("name").value;

    userName = userName.trim();

    const words = userName.split(' ');

    if (words.length >= 2) {
        for (const word of words) {
            if (!valid(word)) {
                return false;
            }
        }
    }
    else {
        return true;// true for valid name.
    }
}

//email validation functions

function validateEmail(email) {
    // email = document.getElementById("email").value;

    if (email.indexOf('@') !== -1) {
        const emailparts = email.split('@');
        //console.log(emailparts[0] + " " + emailparts[1]);
        emailName = emailparts[0];
        emailDomain = emailparts[1];
        if (emailDomain.length !== 0 && emailName.length !== 0) {
            if (emailDomain.indexOf('.') !== -1) {
                if (!emailName.startsWith('.') || !emailName.endsWith('.') || !emailDomain.startsWith('.') || !emailDomain.endsWith('.')) {
                    return true;// true for valid email.
                }
            }
        }
    }
    else {
        return false;
    }
}
// document.getElementById('btn').addEventListener('click', function () {
//     validate();
// });

//mobile number validation functions
function validateNumber(number) {
    // number = document.getElementById("number").value;
    flag = false;
    if (number.length == 11) {
        if (number[0] == 0 && number[1] == 1) {
            for (i = 2; i < number.length; i++) {
                if (isNaN(number[i])) {
                    flag = true;
                }
            }
        }
    }
    if (flag) {
        return true;// true for valid number.
    }
    else {
        return false;
    }
}