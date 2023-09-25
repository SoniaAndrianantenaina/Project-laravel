@include('banner.headerEmployé')

<main class="demande-congé">

    <section class="banner-blue">
        <div class="container">
            <div class="boxNavAnnonces">
                <nav id="navigation-annonces">
                    <div class="content-nav-box left-modified">
                        <ul class="content-nav">
                        </ul>

                        <div class="create-request">
                            <div class="create-request__text">
                                <p>Voir le planning</p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <section class="contenu">
        <div class="div-grey">
            @include('employé.profil.profil-infos')

            <div class="div-grey__content">

                <div class="title-h4 light-grey">
                    <h4>Demander un congé</h4>
                </div>

                <div class="white-trait-lg"></div>


                <div class="div-grey__request">
                    <div class="div-grey__request__data">
                        <p>Date début : </p>
                        <input type="date">
                    </div>

                    <div class="div-grey__request__data">
                        <p>Date fin : </p>
                        <input type="date">
                    </div>
                </div>

            </div>


            <div class="date-right">
                <h6 class="title-h6 navy">Lundi 04 Septembre 2023</h6>
            </div>

        </div>
    </section>

</main>
