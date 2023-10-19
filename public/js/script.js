function filterDropDown() {
    const filterOptions = document.getElementById("filter-options");
    filterOptions.classList.toggle("d-none");
}

function showForm(formId) {
    var forms = document.querySelectorAll('.main-section.section-two');
    forms.forEach(function(form) {
        form.style.display = 'none';
    });

    var selectedForm = document.getElementById(formId);
    selectedForm.style.display = 'flex';
}

function confirmDelete(event) {
    event.preventDefault();
    const url = event.currentTarget.getAttribute('href');

    Swal.fire({
        title: 'Confirmation',
        text: 'Êtes-vous sûr de vouloir supprimer cette annonce ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, supprimer',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
