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
                            <div data-dept-id="{{ $departement->idDepartement }}">
                                <p class="p-bleu clair">{{ $departement->nom }}</p>
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

                            <div class="list-content__infos">
                                <p class="p-medium uppercase">ANDRIANANTENAINA</p>
                                <p class="p-medium">Sonia Fanomezantsoa</p>
                                <p class="p-medium grey-text">Stagiaire</p>
                                <p class="p-medium grey-text">+261 32 54 542 14</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
