
function validate() {
    let name = document.getElementById("name").value;
    let contact = document.getElementById("number").value;
    let gender = document.getElementById("gender").value;
    let email = document.getElementById("email").value;
    let address = document.getElementById("address").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;
    let ques1 = document.getElementById("ques1").value;
    let ques2 = document.getElementById("ques2").value;
    if (!name) {
        document.getElementById('nameErr').innerHTML = "Please enter name";
        return false;
    }
    if (!contact) {
        document.getElementById('numberErr').innerHTML = "Please enter number";
        return false;
    }
    if (!gender) {
        document.getElementById('genderErr').innerHTML = "Please select gender";
        return false;
    }
    if (!email) {
        document.getElementById('emailErr').innerHTML = "Please enter email";
        return false;
    }
    if (!address) {
        document.getElementById('addressErr').innerHTML = "Please enter address";
        return false;
    }
    if (!username) {
        document.getElementById('usernameErr').innerHTML = "Please enter username";
        return false;
    }
    if (!password) {
        document.getElementById('passwordErr').innerHTML = "Please enter password";
        return false;
    }
    if (!confirmPassword) {
        document.getElementById('confirmpassErr').innerHTML = "Please retype password";
        return false;
    }
    if (!ques1) {
        document.getElementById('ques1Err').innerHTML = "Please enter ques1 ans";
        return false;
    }
    if (!ques2) {
        document.getElementById('ques2Err').innerHTML = "Please enter que2 ans";
        return false;
    }
    if (name && contact && gender && username && email && address && password && confirmPassword) {
        if (validateName(name)) {
            document.getElementById('nameErr').innerHTML = "Please enter at least 2 word";
            return false;
        }
        if (validateNumber(contact)) {
            document.getElementById('numberErr').innerHTML = "Please enter valid 11 digit contact number starting with 0 & 1";
            return false;
        }
        if (validateEmail(email)) {
            document.getElementById('emailErr').innerHTML = "Please enter valid email";
            return false;
        }
        if (confirmPassword !== password) {
            document.getElementById('confirmpassErr').innerHTML = "Passwords did not match";
            return false;
        }
    }

}


