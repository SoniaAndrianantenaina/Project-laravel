function filterDropDown() {
    const filterOptions = document.getElementById("filter-options");
    filterOptions.classList.toggle("d-none");
}

function showForm(formId) {
    var forms = document.querySelectorAll(".main-section.section-two");
    forms.forEach(function (form) {
        form.style.display = "none";
    });

    var selectedForm = document.getElementById(formId);
    selectedForm.style.display = "flex";
}

function confirmDelete(event) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute("href");

    Swal.fire({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir supprimer cette annonce ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Annuler",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == x.length - 1) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n);
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x,
        y,
        i,
        valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className +=
            " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i,
        x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

function showMotif() {
    var type_conge = document.getElementById("type_conge");
    var motif_permission = document.getElementById("motif_permission");

    type_conge.addEventListener("change", function () {
        if (type_conge.value === "5") {
            motif_permission.style.display = "flex";
        } else {
            motif_permission.style.display = "none";
        }
    });
}

function confirmerCongé(event) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute("href");

    Swal.fire({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir confirmer ce congé ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, confirmer",
        cancelButtonText: "Annuler",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

function refuserCongé(event) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute("href");

    Swal.fire({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir refuser ce congé ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, refuser",
        cancelButtonText: "Annuler",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

function supprimerEmploye(event) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute("href");

    Swal.fire({
        title: "Confirmation",
        text: "Êtes-vous sûr de vouloir supprimer cet(te) employé(e) ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Annuler",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

function listeEmployés() {
    document.addEventListener("DOMContentLoaded", function () {
        const departmentItems = document.querySelectorAll(".department-item");
        const listContentRight = document.querySelector(".list-content__right"); // Define listContentRight here

        departmentItems.forEach(function (department) {
            department.addEventListener("click", function () {
                const departmentId = department.getAttribute("data-dept-id");
                console.log(departmentId);

                fetch(`/get-employes/${departmentId}`)
                    .then((response) => response.json())
                    .then((data) => {
                        console.log(data);

                        listContentRight.innerHTML = "";

                        const noEmployeesMessage = document.createElement("p");
                        noEmployeesMessage.className = "p-medium";

                        if (data.length > 0) {
                            const listContentBlocks =
                                document.createElement("div");
                            listContentBlocks.className =
                                "list-content__blocks";

                            data.forEach((employee) => {
                                var idEmployee = employee.idEmploye;
                                var imagePath = employee.imagePath;

                                var link = document.createElement("a");
                                link.href = `/profil-employe/${idEmployee}`;

                                var figure = document.createElement("figure");

                                var image = document.createElement("img");
                                image.src = imagePath;
                                image.alt = "";

                                figure.appendChild(image);

                                link.appendChild(figure);

                                var listContentPicture =
                                    document.createElement("div");
                                listContentPicture.className =
                                    "list-content__picture";
                                listContentPicture.appendChild(link);

                                const employeeCard =
                                    document.createElement("div");
                                employeeCard.className =
                                    "list-content__blocks__item";

                                employeeCard.appendChild(listContentPicture);

                                var employeeInfo =
                                    document.createElement("div");
                                employeeInfo.className = "list-content__infos";
                                employeeInfo.innerHTML = `
                                            <p class="p-medium uppercase">${employee.nomEmploye}</p>
                                            <p class="p-medium">${employee.prenom}</p>
                                            <p class="p-medium grey-text">${employee.nomPoste}</p>
                                            <p class="p-medium grey-text">${employee.contact}</p>
                                        `;

                                employeeCard.appendChild(employeeInfo);

                                listContentBlocks.appendChild(employeeCard);
                            });

                            listContentRight.appendChild(listContentBlocks);
                        } else {
                            const noEmployeesMessage =
                                document.createElement("p");
                            noEmployeesMessage.className =
                                "no-employees-message";
                            // Set the message when no employees are found
                            noEmployeesMessage.textContent =
                                "Il n'y a pas encore d'employés.";
                            listContentRight.appendChild(noEmployeesMessage);
                        }
                    });
            });
        });
    });
}

function modifyDeptPoste() {
    const posteInputs = document.querySelectorAll(".input-edit");
    const posteModal = document.getElementById("posteModal");
    const modalClose = document.getElementById("modalClose");
    const posteInput = document.getElementById("posteInput");
    const salaireInput = document.getElementById("salaireInput");
    const modifierButton = document.getElementById("modifierPoste");

    posteInputs.forEach((input) => {
        input.addEventListener("focus", function () {
            const nom = input.value;
            const salaire = input.getAttribute("data-salaire");
            posteInput.value = nom;
            salaireInput.value = salaire;
            posteModal.style.display = "block";
        });
    });

    modalClose.addEventListener("click", function () {
        posteModal.style.display = "none";
    });

    modifierButton.addEventListener("click", function () {
        const nom = posteInput.value;
        const salaire = salaireInput.value;
        // Mettez en œuvre la logique de mise à jour des données ici
        console.log("Poste modifié :", nom);
        console.log("Nouveau salaire :", salaire);
        posteModal.style.display = "none";
    });
}
