function filterDropDown() {
    const filterOptions = document.getElementById("filter-options");
    filterOptions.classList.toggle("d-none");
}

function showAdmin() {
    var userTypeDiv = document.getElementById("user-type");
    userTypeDiv.innerHTML =
        '<div class="main-section section-two__title">Admin</div>' +
        userTypeDiv.innerHTML;
    document.getElementById("admin-button").disabled = true;
}

function showEmploye() {
    var userTypeDiv = document.getElementById("user-type");
    userTypeDiv.innerHTML =
        '<div class="main-section section-two__title">Employé</div>' +
        userTypeDiv.innerHTML;
}

