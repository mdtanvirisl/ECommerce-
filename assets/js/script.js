function review() {
    let address = document.getElementById("address").value;

    if (!address) {
        document.getElementById('addressErr').innerHTML = "review filled cannot be empty";
        return false;
    } else {
        document.getElementById('addressErr').innerHTML = "";
        return true;
    }
}