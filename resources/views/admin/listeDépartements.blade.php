@section('title', 'Liste départements')
@include('banner.header')

<main class="liste-departements">

    <section class="recherche">
        <div class="div-blue">
            <form action="{{ route('search-departements') }}" method="POST">
                @csrf
                <div class="search-container">
                    <input type="text" class="search-input" name="search" placeholder="Search...">
                    <button class="search-button">Search</button>
                </div>
            </form>

            <div class="filter-container">
                <img src="{{ asset('assets/images/icon/filter.png') }}" alt="">
                <p id="filter-button" onclick="filterDropDown()">Filtres</p>
                <div id="filter-options" class="d-none">
                    <a  href="{{ route('filtre-departements', ['sort' => 'asc']) }}">de A-Z</a> <br>
                    <a href="{{ route('filtre-departements', ['sort' => 'desc']) }}">de Z-A</a>
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
                                <a
                                    href="{{ route('update-department', ['idDepartement' => $groupedDepartements->first()->dept->idDepartement]) }}">
                                    <img src="{{ asset('assets/images/icon/modify.png') }}" alt="Modifier">
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

    <script>
        document.getElementById("sort-az").addEventListener("click", function(event) {
            event.preventDefault();
            console.log('hello')
            departements.sort((a, b) => a.nom.localeCompare(b.nom));
        });

    </script>
</main>
