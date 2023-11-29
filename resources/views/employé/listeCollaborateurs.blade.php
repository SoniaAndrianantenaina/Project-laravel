@section('title', 'Liste collaborateurs')
@include('banner.headerEmployé')

<main>
    <section class="recherche">
        <div class="div-blue">

            <div class="search-container">
                <input type="text" id="search-input" class="search-input" name="search-employee" placeholder="Search...">
                <button id="search-button" class="search-button">Search</button>
            </div>
        </div>
    </section>

    <section class="list">
        <div class="d-block">
            <div class="list-content">
                <div class="list-content__left">
                    <div class="see-plan">
                        <a class="see-plan link" href="{{ route('plan-departements') }}">Voir le plan</a>
                        <div class="link__trait"></div>
                    </div>

                    <div class="list-dpt">
                        <h5 class="title-h5">Tous</h5>
                        @foreach ($departements as $departement)
                            <div data-dept-id="{{ $departement->idDepartement }}" class="department-item">
                                {{ $departement->nom }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="list-content__right">

                </div>
            </div>
        </div>
    </section>

    <script>
        listeEmployés();
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search-input");
            const searchButton = document.getElementById("search-button");
            const listContentRight = document.querySelector(".list-content__right");

            searchButton.addEventListener("click", function() {
                const searchTerm = searchInput.value;
                console.log(searchTerm)


                fetch(`/search-employe?search-employee=${searchTerm}`)
                    .then((response) => response.json())
                    .then((data) => {
                        listContentRight.innerHTML = ""; // Effacez le contenu précédent

                        if (data.length > 0) {
                            const listContentBlocks = document.createElement("div");
                            listContentBlocks.className = "list-content__blocks";

                            data.forEach((employee) => {
                                const employeeCard = document.createElement("div");
                                employeeCard.className = "list-content__blocks__item";

                                const listContentPicture = document.createElement("div");
                                listContentPicture.className = "list-content__picture";

                                const link = document.createElement("a");

                                const figure = document.createElement("figure");

                                const image = document.createElement("img");
                                image.alt = "";
                                image.className = "list-content__image";
                                const imagePath = employee.photo;

                                if (imagePath.startsWith("public/")) {
                                    image.src =
                                        window.location.origin +
                                        "/storage/" +
                                        imagePath.replace("public/", "");
                                } else if (imagePath.startsWith("assets/")) {
                                    image.src = imagePath;
                                } else {
                                    console.error("Chemin d'image inattendu : " + imagePath);
                                }

                                figure.appendChild(image);
                                link.appendChild(figure);
                                listContentPicture.appendChild(link);
                                employeeCard.appendChild(listContentPicture);

                                const employeeInfo = document.createElement("div");
                                employeeInfo.className = "list-content__infos";
                                employeeInfo.innerHTML = `
                            <p class="p-medium uppercase">${employee.nomEmploye}</p>
                            <p class="p-medium">${employee.prenom}</p>
                            <p class="p-medium grey-text">${employee.nomPoste}</p>
                            <p class="p-medium grey-text">+261${employee.contact}</p>
                        `;

                                employeeCard.appendChild(employeeInfo);
                                listContentBlocks.appendChild(employeeCard);
                            });

                            listContentRight.appendChild(listContentBlocks);
                        } else {
                            // Aucun résultat trouvé
                            const noEmployeesMessage = document.createElement("p");
                            noEmployeesMessage.className = "no-employees-message";
                            noEmployeesMessage.textContent = "Aucun employé trouvé.";
                            listContentRight.appendChild(noEmployeesMessage);
                        }
                    });
            });
        });
    </script>
</main>
