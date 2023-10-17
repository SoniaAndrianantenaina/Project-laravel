@include('banner.header')

<main class="liste-departements">

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

            <div class="filter-container modified">
                <a href="{{ route('plan-departements') }}">
                    <img src="{{ asset('assets/images/icon/plan.png') }}" alt="">
                </a>
                <p>Voir le plan</p>
            </div>

            <div class="add-dept">
                <a href="{{ route('ajout-departement') }}">
                    <span>
                        <img src="{{ asset('assets/images/icon/add.png') }}" alt="">
                    </span>
                </a>
            </div>
        </div>
    </section>

    <section>
        <div class="dept-container">

            @foreach ($departements as $idDepartement => $groupedDepartements)
                <div class="department-card">
                    <div class="card-header">
                        <h3>{{ $groupedDepartements->first()->dept->nom }}</h3>
                        <div class="right-items">
                            <div class="edit-button">
                                <a href="#">
                                    <img src="{{ asset('assets/images/icon/modify.png') }}" alt="Modifier">
                                </a>
                            </div>
                            <div class="delete-button">
                                <a href="#">
                                    <img src="{{ asset('assets/images/icon/delete.png') }}" alt="Supprimer">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($groupedDepartements as $deptPoste)
                                <li>{{ $deptPoste->poste->nom }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</main>
