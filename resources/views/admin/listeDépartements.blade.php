<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style personnalisé pour les listes de postes */
        .job-list {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Liste des Départements</h1>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action" data-department="RH">Ressources Humaines</li>
                    <li class="list-group-item list-group-item-action" data-department="IT">Informatique</li>
                    <li class="list-group-item list-group-item-action" data-department="Ventes">Ventes</li>
                    <li class="list-group-item list-group-item-action" data-department="Compta">Comptabilité</li>
                </ul>
            </div>
            <div class="col-md-8">
                <div id="RH" class="job-list">
                    <h2>Postes dans le département Ressources Humaines :</h2>
                    <ul>
                        <li>Directeur des Ressources Humaines</li>
                        <li>Recruteur</li>
                        <li>Gestionnaire de la paie</li>
                    </ul>
                </div>
                <div id="IT" class="job-list">
                    <h2>Postes dans le département Informatique :</h2>
                    <ul>
                        <li>Ingénieur logiciel</li>
                        <li>Administrateur système</li>
                        <li>Technicien support informatique</li>
                    </ul>
                </div>
                <div id="Ventes" class="job-list">
                    <h2>Postes dans le département Ventes :</h2>
                    <ul>
                        <li>Directeur des ventes</li>
                        <li>Représentant des ventes</li>
                        <li>Assistant commercial</li>
                    </ul>
                </div>
                <div id="Compta" class="job-list">
                    <h2>Postes dans le département Comptabilité :</h2>
                    <ul>
                        <li>Comptable en chef</li>
                        <li>Auditeur financier</li>
                        <li>Assistant comptable</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure Bootstrap JS (jQuery requis) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Fonction pour afficher la liste des postes du département sélectionné
        function showJobs(department) {
            // Masquer tous les affichages de postes
            var jobLists = document.querySelectorAll(".job-list");
            for (var i = 0; i < jobLists.length; i++) {
                jobLists[i].style.display = "none";
            }

            // Afficher la liste des postes pour le département sélectionné
            var selectedDepartment = document.getElementById(department);
            if (selectedDepartment) {
                selectedDepartment.style.display = "block";
            }
        }

        // Associer la fonction showJobs aux éléments de la liste de départements
        var departmentItems = document.querySelectorAll(".list-group-item");
        for (var i = 0; i < departmentItems.length; i++) {
            departmentItems[i].addEventListener("click", function () {
                var department = this.getAttribute("data-department");
                showJobs(department);
            });
        }
    </script>
</body>
</html>
