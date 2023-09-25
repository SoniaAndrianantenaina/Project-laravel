@include('banner.headerEmployé')

<main class="solde-congé">
    <div class="container">
        <section class="banner-blue">
            <div class="boxNavAnnonces">
                <nav id="navigation-annonces">
                    <div class="content-nav-box left-modified">
                        <ul class="content-nav">
                            <li>
                                <a href="#" class="text-decoration">
                                    SOLDE
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration">
                                    DEMANDES
                                    <div class="white-trait"></div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration">
                                    SALAIRE
                                </a>
                            </li>
                            <li>
                                <a class="create-request" href="">Hello</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </section>

        <div class="div-grey">
            <div class="div-grey__profil">
                <div class="center-content">

                    <div class="div-grey__pic">
                        <figure class="div-grey__picture">
                            <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
                        </figure>
                    </div>

                    <div class="div-grey__infos">
                        <div class="div-grey__infos__center">
                            <div class="title-h6">
                                <h6>Sonia Fanomezantsoa</h6>
                            </div>

                            <div class="title-h6">
                                <h6>Andrianantenaina</h6>
                            </div>

                            <div class="title-h6 uppercase black">
                                <h6>Digital Agency</h6>
                            </div>

                            <div class="title-h6">
                                <h6>Stagiaire</h6>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="left-text">
                    <div class="div-grey__infos__left">
                        <div class="title-h6">
                            <h6>Matricule : 0222</h6>
                        </div>

                        <div class="title-h6">
                            <h6>+261323975502</h6>
                        </div>

                        <div class="trait-lg"></div>

                        <div>
                            <div class="title-h3-navy uppercase">
                                <h3>Contrat</h3>
                            </div>

                            <div class="title-h6">
                                <h6>Contrat : CDI</h6>
                            </div>
                        </div>

                        <div class="trait-lg"></div>

                        <div>
                            <div class="title-h3-navy uppercase">
                                <h3>Manager</h3>
                            </div>

                            <div>
                                <div class="bck-data">
                                    <div class="bck-data pic">
                                        <figure class="bck-data__picture">
                                            <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}"
                                                alt="">
                                        </figure>
                                    </div>

                                    <div class="bck-data__text">
                                        <div class="title-h6 black">
                                            <h6>Henikaja Andriamahay</h6>
                                        </div>

                                        <div class="title-h6">
                                            <h6>Team Leader Front End</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trait-lg"></div>

                        <div>
                            <div class="title-h3-navy uppercase">
                                <h3>Relations directes</h3>
                            </div>

                            <div>
                                <div class="bck-data">
                                    <div class="bck-data pic">
                                        <figure class="bck-data__picture">
                                            <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}"
                                                alt="">
                                        </figure>
                                    </div>

                                    <div class="bck-data__text">
                                        <div class="title-h6 black">
                                            <h6>Andrianantenaina Sonia</h6>
                                        </div>

                                        <div class="title-h6">
                                            <h6>Intégrateur Junior</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="bck-data">
                                    <div class="bck-data pic">
                                        <figure class="bck-data__picture">
                                            <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}"
                                                alt="">
                                        </figure>
                                    </div>

                                    <div class="bck-data__text">
                                        <div class="title-h6 black">
                                            <h6>Andrianantenaina Sonia</h6>
                                        </div>

                                        <div class="title-h6">
                                            <h6>Intégrateur Junior</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="height: 5vh"></div>

            </div>


            <div class="div-grey__pay">
                <div class="title-h4">
                    <h4>Mes congés</h4>
                </div>

                <div class="shadow-box">
                    <div class="shadow-box__text">
                        {{-- soldes congés --}}
                        <div class="shadow-box__text__title navy">
                            <h4>Mes soldes</h4>
                        </div>

                        <div>
                            <div class="shadow-box__text__content">
                                <div class="subtitle">
                                    <h6>Solde réel</h6>
                                </div>

                                <div class="subtitle adjust-right">
                                    <h6>10j</h6>
                                </div>
                            </div>

                            <div class="shadow-box__text__content">
                                <div class="subtitle">
                                    <h6>Solde prévisionnel</h6>
                                </div>

                                <div class="subtitle adjust-right">
                                    <h6>10j</h6>
                                </div>
                            </div>

                            <div class="shadow-box__text__content">
                                <div class="subtitle">
                                    <h6>Permission exceptionnelle</h6>
                                </div>

                                <div class="subtitle adjust-right">
                                    <h6>10j</h6>
                                </div>
                            </div>

                            <div class="shadow-box__text__content">
                                <div class="subtitle black">
                                    <h6>À planifier avant</h6>
                                    <h6>le 31/12/2023</h6>
                                </div>

                                <div class="subtitle adjust-right">
                                    <h6>5j</h6>
                                </div>
                            </div>
                        </div>

                        <div class="trait-lg modified"></div>

                        {{-- derniers congés --}}
                        <div class="shadow-box__text__title on-top navy">
                            <h4>Mes derniers congés</h4>
                        </div>

                        <div>
                            <div class="shadow-box__text__content">
                                <div class="subtitle black">
                                    <h6>Congé payé</h6>

                                    <div class="subtitle">
                                        <h6>20/07/2023 au 21/07/2023 : 1j</h6>
                                    </div>
                                </div>

                                <div class="subtitle adjust-right">
                                    <h6>Validée</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="date-right">
                <h6 class="title-h6 navy">Lundi 04 Septembre 2023</h6>
            </div>
        </div>
    </div>

</main>
