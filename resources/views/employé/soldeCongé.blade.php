@include('banner.headerEmployé')
@include('banner.headerBlue')

<main class="solde-congé">
    <section class="contenu">
        <div class="div-grey">
            @include('employé.profil.profil-infos')
            <div class="div-grey__pay">
                <h4 class="title-h4">Mes congés</h4>

                <div class="shadow-box">
                    <div class="shadow-box__text">
                        {{-- soldes congés --}}
                        <h4 class="shadow-box__text__title navy">Mes soldes</h4>

                        <div class="shadow-box__text__content">
                            <div class="subtitle">
                                <h6>Solde réel</h6>
                            </div>

                            <div class="subtitle adjust-right">
                                <h6>{{ $jour }}j</h6>
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
                            <div class="subtitle">
                                <h6 class="black">À planifier avant</h6>
                                <h6 class="black">le 31/12/2023</h6>
                            </div>

                            <div class="subtitle adjust-right">
                                <h6>5j</h6>
                            </div>
                        </div>

                        <div class="trait-lg modified"></div>

                        {{-- derniers congés --}}
                        <h4 class="shadow-box__text__title on-top navy">Mes derniers congés</h4>

                        <div class="shadow-box__text__content">
                            <div>
                                <h6 class="subtitle black">Congé payé</h6>

                                <div class="subtitle">
                                    <h6>20/07/2023 au 21/07/2023 : 1j</h6>
                                </div>
                            </div>

                            <div class="subtitle adjust-right color-green">
                                <p>Validée</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="date-right">
            @php
                echo $dateDuJour;
            @endphp
        </div>
    </section>

</main>
