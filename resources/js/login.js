require('./bootstrap');

function setError() {
    document.getElementById('error').innerHTML = "Bad request !";
    document.getElementById('error').className = "alert alert-danger";
}
