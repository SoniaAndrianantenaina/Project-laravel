@include('banner.headerEmployé')

<main>
    <section class="banner-blue">
        <div class="container">
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

                        </ul>

                        <div class="create-request">
                            <div class="create-request__text">
                                <p>+ Créer une demande</p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="liste-demande-conge">
        <div class="div-grey">
            @include('employé.profil.profil-infos')
            <div class="request-list">

                <div class="title-h4 light-grey">
                    <h4>Mes demandes</h4>
                </div>

                <div class="white-trait-lg"></div>

                <div class="request-list box">
                    <div class="request-list box__color">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title">
                                <h4>Solde réel sur congé payé</h4>
                            </div>
                            <div class="request-list box__content__text">
                                <h6>12,0</h6>
                                <p>Jours</p>
                            </div>
                        </div>
                    </div>

                    <div class="request-list box__color">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title">
                                <h4>Solde prévisionnel sur congé payé</h4>
                            </div>
                            <div class="request-list box__content__text">
                                <h6>12,0</h6>
                                <p>Jours</p>
                            </div>
                        </div>
                    </div>

                    <div class="request-list box__color">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title">
                                <h4>Permissions consommées</h4>
                            </div>
                            <div class="request-list box__content__text">
                                <h6>0 / 10</h6>
                                <p>Jours</p>
                            </div>
                        </div>
                    </div>

                    <div class="request-list box__color navy">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title white">
                                <h4>Congés à planifier avant 31/12/2023</h4>
                            </div>
                            <div>
                                <h6 class="h6-text-white">5</h6>
                                <p class="p-text-white">Jours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="date-right">
            <h6 class="title-h6 navy">Lundi 04 Septembre 2023</h6>
        </div>
    </section>
</main>
