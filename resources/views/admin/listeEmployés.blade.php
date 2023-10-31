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
       listeEmployés();

    </script>


</main>
