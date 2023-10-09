@include('banner.headerEmployé')
@include('banner.headerBlue')

<main class="solde-congé">
    <section class="contenu">
        <div class="div-grey">
            @include('employé.profil.profil-infos')
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
    </section>

</main>
