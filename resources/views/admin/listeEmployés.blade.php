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
                        <div>
                            <h5 class="list-dpt title-h5">Tous</h5>

                            <div class="list-dpt nom">
                                <p class="p-bleu foncé">Dept 1</p>
                            </div>

                            <div class="list-dpt nom">
                                <p class="p-bleu clair">Dept 1</p>
                            </div>

                            <div class="list-dpt nom">
                                <p class="p-bleu clair">Dept 1</p>
                            </div>

                            <div class="list-dpt nom">
                                <p class="p-bleu clair">Dept 1</p>
                            </div>

                            <div class="list-dpt nom">
                                <p class="p-bleu clair">Dept 1</p>
                            </div>

                            <div class="list-dpt nom">
                                <p class="p-bleu clair">Dept 1</p>
                            </div>

                        </div>

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
                                <div class="uppercase">
                                    <p class="p-medium">Andrianantenaina</p>
                                </div>

                                <div class="prénoms">
                                    <p class="p-medium">Sonia Fanomezantsoa</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">Stagiaire</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">+261 32 54 542 14</p>
                                </div>
                            </div>
                        </div>

                        <div class="list-content__blocks__item">
                            <div class="list-content__picture">
                                <figure class="list-content__image">
                                    <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="list-content__infos">
                                <div class="uppercase">
                                    <p class="p-medium">Andrianantenaina</p>
                                </div>

                                <div class="prénoms">
                                    <p class="p-medium">Sonia Fanomezantsoa</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">Stagiaire</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">+261 32 54 542 14</p>
                                </div>
                            </div>
                        </div>

                        <div class="list-content__blocks__item">
                            <div class="list-content__picture">
                                <figure class="list-content__image">
                                    <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="list-content__infos">
                                <div class="uppercase">
                                    <p class="p-medium">Andrianantenaina</p>
                                </div>

                                <div class="prénoms">
                                    <p class="p-medium">Sonia Fanomezantsoa</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">Stagiaire</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">+261 32 54 542 14</p>
                                </div>
                            </div>
                        </div>

                        <div class="list-content__blocks__item">
                            <div class="list-content__picture">
                                <figure class="list-content__image">
                                    <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="list-content__infos">
                                <div class="uppercase">
                                    <p class="p-medium">Andrianantenaina</p>
                                </div>

                                <div class="prénoms">
                                    <p class="p-medium">Sonia Fanomezantsoa</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">Stagiaire</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">+261 32 54 542 14</p>
                                </div>
                            </div>
                        </div>

                        <div class="list-content__blocks__item">
                            <div class="list-content__picture">
                                <figure class="list-content__image">
                                    <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="list-content__infos">
                                <div class="uppercase">
                                    <p class="p-medium">Andrianantenaina</p>
                                </div>

                                <div class="prénoms">
                                    <p class="p-medium">Sonia Fanomezantsoa</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">Stagiaire</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">+261 32 54 542 14</p>
                                </div>
                            </div>
                        </div>

                        <div class="list-content__blocks__item">
                            <div class="list-content__picture">
                                <figure class="list-content__image">
                                    <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                                </figure>
                            </div>

                            <div class="list-content__infos">
                                <div class="uppercase">
                                    <p class="p-medium">Andrianantenaina</p>
                                </div>

                                <div class="prénoms">
                                    <p class="p-medium">Sonia Fanomezantsoa</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">Stagiaire</p>
                                </div>

                                <div class="grey-text">
                                    <p class="p-medium">+261 32 54 542 14</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
