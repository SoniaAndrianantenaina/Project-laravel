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

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const departmentItems = document.querySelectorAll('.department-item');
            const listContentRight = document.querySelector('.list-content__right'); // Define listContentRight here

            departmentItems.forEach(function(department) {
                department.addEventListener('click', function() {
                    const departmentId = department.getAttribute('data-dept-id');
                    console.log(departmentId);

                    fetch(`/get-employes/${departmentId}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);

                            listContentRight.innerHTML = '';

                            const noEmployeesMessage = document.createElement('p');
                            noEmployeesMessage.className = 'p-medium';

                            if (data.length > 0) {
                                const listContentBlocks = document.createElement('div');
                                listContentBlocks.className = 'list-content__blocks';

                                data.forEach(employee => {
                                    const employeeCard = document.createElement('div');
                                    employeeCard.className =
                                        'list-content__blocks__item';
                                    employeeCard.innerHTML = `
                                        <div class="list-content__picture">
                                            <a href="{{ route('profil-employe') }}">
                                                <figure class="list-content__image">
                                                    <img src="${employee.imagePath}" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="list-content__infos">
                                            <p class="p-medium uppercase">${employee.nomEmploye}</p>
                                            <p class="p-medium">${employee.prenom}</p>
                                            <p class="p-medium grey-text">${employee.nomPoste}</p>
                                            <p class="p-medium grey-text">${employee.contact}</p>
                                        </div>
                                    `;
                                    listContentBlocks.appendChild(employeeCard);
                                });

                                listContentRight.appendChild(listContentBlocks);
                            } else {
                                const noEmployeesMessage = document.createElement('p');
                                noEmployeesMessage.className = 'no-employees-message';
                                // Set the message when no employees are found
                                noEmployeesMessage.textContent ="Il n'y a pas encore d'employés.";
                                listContentRight.appendChild(noEmployeesMessage);
                            }
                        });
                });
            });
        });
    </script>


</main>
