function login() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (!username) {
        document.getElementById('usernameErr').innerHTML = "Please enter username";
        return false;
    }
    if (!password) {
        document.getElementById('passwordErr').innerHTML = "Please enter password";
        return false;
    }
    if (username && password) {
        document.getElementById('usernameErr').innerHTML = "";
        document.getElementById('passwordErr').innerHTML = "";
        return true;
    }
}
// forget password
function forgetPassCheck() {
    let username = document.getElementById("username").value;
    let ques1 = document.getElementById("ques1").value;
    let ques2 = document.getElementById("ques2").value;
    if (!username) {
        document.getElementById('usernameErr').innerHTML = "Please enter username";
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
    if (username && ques1 && ques2) {
        document.getElementById('usernameErr').innerHTML = "";
        document.getElementById('ques1Err').innerHTML = "";
        document.getElementById('ques2Err').innerHTML = "";
        return true;
    }
}

function recoverPass() {
    let newPass = document.getElementById("newpassword").value;
    let retypePass = document.getElementById("retypepassword").value;

    if (!newPass) {
        document.getElementById('npassErr').innerHTML = "Please enter new password";
        return false;
    }
    if (!retypePass) {
        document.getElementById('repassErr').innerHTML = "Please retype password";
        return false;
    }
    if (newPass && retypePass) {
        if (newPass < 6) {
            document.getElementById('npassErr').innerHTML = "Please enter 6 digit new password";
            return false;
        }
        if (newPass !== retypePass) {
            document.getElementById('repassErr').innerHTML = "Password did not match";
            return false;
        }
    }
}

function changePasword() {
    let oldPass = document.getElementById("password").value;
    let newPass = document.getElementById("newpassword").value;
    let retypePass = document.getElementById("retypepassword").value;

    if (!oldPass) {
        document.getElementById('oldpassErr').innerHTML = "Please enter old password";
        return false;
    }
    if (!newPass) {
        document.getElementById('npassErr').innerHTML = "Please enter new password";
        return false;
    }
    if (!retypePass) {
        document.getElementById('repassErr').innerHTML = "Please retype password";
        return false;
    }
    if (oldPass && newPass && retypePass) {
        if (newPass < 6) {
            document.getElementById('npassErr').innerHTML = "Please enter 6 digit new password";
            return false;
        }
        if (newPass !== retypePass) {
            document.getElementById('repassErr').innerHTML = "Password did not match";
            return false;
        }
    }
}