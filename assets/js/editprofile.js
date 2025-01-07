
function editProfile() {
    const name = document.getElementById("name").value;
    const contact = document.getElementById("number").value;
    const email = document.getElementById("email").value;
    const address = document.getElementById("address").value;
    const ques1 = document.getElementById("ques1").value;
    const ques2 = document.getElementById("ques2").value;

    if (!name) {
        document.getElementById('nameErr').innerHTML = "Please enter name";
        return false;
    }
    if (!contact) {
        document.getElementById('numberErr').innerHTML = "Please enter number";
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
    if (!ques1) {
        document.getElementById('ques1Err').innerHTML = "Please enter ques1 ans";
        return false;
    }
    if (!ques2) {
        document.getElementById('ques2Err').innerHTML = "Please enter que2 ans";
        return false;
    }
    if (name && contact && email && address) {
        if (validateName(name)) {
            document.getElementById('nameErr').innerHTML = "Please enter at least 2 word";
            return false;
        }
        else if (validateNumber(contact)) {
            document.getElementById('numberErr').innerHTML = "Please enter valid 11 digit contact number starting with 0 & 1";
            return false;
        }
        else if (!validateEmail(email)) {
            document.getElementById('emailErr').innerHTML = "Please enter valid email";
            return false;
        }
        else {
            const data = {
                'name': name,
                'number': contact,
                'email': email,
                'address': address,
                'ques1': ques1,
                'ques2': ques2,
            };
            const dataToSend = JSON.stringify(data);
            // console.log(dataToSend);
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/editprofileCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("data=" + dataToSend);
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const response = JSON.parse(this.responseText);
                    alert(response);
                    // if (response) {
                    //     window.location.href = "../view/eprofile.php";
                    // }
                }
            }
        }
    }
}


