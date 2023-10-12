function filterDropDown() {
    const filterOptions = document.getElementById("filter-options");
    filterOptions.classList.toggle("d-none");
}

function showAdmin(){
    var userTypeDiv = document.getElementById("user-type");
    userTypeDiv.innerHTML = '<div class="main-section section-two__title">Admin</div>' + userTypeDiv.innerHTML;
    document.getElementById('admin-button').disabled = true;
}

document.getElementById('admin-button').addEventListener('click', function(event) {
    event.preventDefault();

    var identifiant = document.querySelector('input[name="identifiant"]').value;
    var mdp = document.querySelector('input[name="mdp"]').value;

    if (identifiant && mdp) {
        window.location.href = "{{ route('login-admin') }}?identifiant=" + identifiant + "&mdp=" + mdp;
    } else {
        alert("Veuillez remplir les identifiants.");
    }
});

function showEmploye(){
    var userTypeDiv = document.getElementById("user-type");
    userTypeDiv.innerHTML = '<div class="main-section section-two__title">Employé</div>' + userTypeDiv.innerHTML;
}
