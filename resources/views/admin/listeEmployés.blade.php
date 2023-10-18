@include('banner.header')

<main>
    <section class="recherche">
        <div class="div-blue">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </div>
            <div class="filter-container">
                <img src="{{ asset('assets/images/icon/filter.png') }}" alt="">

                <p id="filter-button" onclick="filterDropDown()">Filtres</p>
                <div id="filter-options" class="d-none">
                    <p>Option 1</p>
                    <p>Option 2</p>
                    <p>Option 3</p>
                </div>
            </div>
            <div class="remove-user">
                <a href="{{ route('off-boarding') }}">
                    <img src="{{ asset('assets/images/icon/remove-user.png') }}" alt="">
                </a>
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
                                <div class="department-name">
                                    <p class="p-bleu clair">{{ $departement->nom }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="list-content__right">
                    <div class="list-content__blocks">
                        <div class="list-content__blocks__item">
                            <div class="list-content__picture">
                                <a href="{{ route('profil-employe') }}">
                                    <figure class="list-content__image">
                                        <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                                    </figure>
                                </a>
                            </div>

                            <div class="list-content__infos" id="result-container">
                                <p class="p-medium uppercase" id="nomEmploye"></p>
                                <p class="p-medium" id="prenomEmploye"></p>
                                <p class="p-medium grey-text" id="posteEmploye"></p>
                                <p class="p-medium grey-text" id="contactEmploye"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const departmentItems = document.querySelectorAll('.department-item');

            departmentItems.forEach(function(department) {
                department.addEventListener('click', function() {
                    const departmentId = department.getAttribute('data-dept-id');
                    console.log(departmentId);

                    fetch(`/get-employes/${departmentId}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            const nomEmployeElement = document.getElementById("nomEmploye");
                            const prenomEmployeElement = document.getElementById("prenomEmploye");
                            const posteEmployeElement = document.getElementById("posteEmploye");
                            const contactEmployeElement = document.getElementById("contactEmploye");


                            nomEmployeElement.innerHTML = data.nomEmploye;
                            prenomEmployeElement.innerHTML = data.prenom;
                            posteEmployeElement.innerHTML = data.nomPoste;
                            contactEmployeElement.innerHTML = data.contact;

                        });
                });
            });
        });
    </script>
</main>
