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

