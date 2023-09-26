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


                <div class="centered-container">
                    <div class="div-grey__request">
                        <div class="div-grey__request__data">
                            <div>
                                <p class="div-grey__request__data__span">Date début : </p>
                            </div>

                            <div>
                                <input class="div-grey__request__data__input" type="date">
                            </div>
                        </div>

                        <div class="div-grey__request__data">
                            <div>
                                <p class="div-grey__request__data__span">Date fin : </p>
                            </div>

                            <div>
                                <input class="div-grey__request__data__input" type="date">
                            </div>
                        </div>

                        <div class="div-grey__request__data">
                            <div>
                                <label class="div-grey__request__data__span">Type congé :</label>
                            </div>

                            <div>
                                <select class="div-grey__request__data__input blue" name="" id="">
                                    <option value="">Congés payés</option>
                                    <option value="">Permissions exceptionnelles</option>
                                </select>
                            </div>
                        </div>

                        <div class="div-grey__request__data">
                            <div>
                                <label class="div-grey__request__data__span">Motif congé :</label>
                            </div>

                            <div class="ml">
                                <select class="div-grey__request__data__input blue" name="" id="">
                                    <option value="">Mariage</option>
                                    <option value="">Décès</option>
                                </select>
                            </div>
                        </div>


                        <div class="boutons">

                            <div class="btn re-arraganged bleu-foncé">
                                <a href="" class="btn__middle-btn">SOUMETTRE</a>
                            </div>

                            <div class="btn re-arraganged bleu-clair">
                                <a href="" class="btn__middle-btn">ANNULER</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="date-right">
                <h6 class="title-h6 navy">Lundi 04 Septembre 2023</h6>
            </div>

        </div>
    </section>

</main>
