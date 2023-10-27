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
                                <h6>{{ $soldes['solde_reel'] }} j</h6>
                            </div>
                        </div>

                        <div class="shadow-box__text__content">
                            <div class="subtitle">
                                <h6>Solde prévisionnel</h6>
                            </div>

                            <div class="subtitle adjust-right">
                                <h6>{{ $soldes['solde_previsionnel'] }} j</h6>
                            </div>
                        </div>

                        <div class="shadow-box__text__content">
                            <div class="subtitle">
                                <h6>Permissions exceptionnelles </h6>
                            </div>

                            <div class="subtitle adjust-right">
                                <h6>{{ $soldes['solde_perm'] }} j</h6>
                            </div>
                        </div>

                        <div class="shadow-box__text__content">
                            <div class="subtitle">
                                <h6 class="black">À planifier avant</h6>
                                <h6 class="black">le 31/12/2023</h6>
                            </div>

                            <div class="subtitle adjust-right">
                                <h6>{{ $soldes['a_planifier'] }} j</h6>
                            </div>
                        </div>

                        <div class="trait-lg modified"></div>

                        {{-- derniers congés --}}
                        <h4 class="shadow-box__text__title on-top navy">Mes derniers congés</h4>

                        @foreach ($lastLeaves as $last)
                            <div class="shadow-box__text__content">
                                <div>
                                    <h6 class="subtitle black">{{ $last->typeconge->nom }}</h6>

                                    <div class="subtitle">
                                        <h6>{{ $last->date_debut }} au {{ $last->date_fin }} :
                                            {{ $nbjour[$loop->index] }}j</h6>
                                    </div>
                                </div>

                                @if ($last->etat == 1)
                                    <div class="subtitle adjust-right color-green">
                                        <p>Validée</p>
                                    </div>
                                @elseif ($last->etat == 2)
                                    <div class="subtitle adjust-right color-red">
                                        <p>Refusée</p>
                                    </div>
                                @else
                                    <div class="subtitle adjust-right color-yellow">
                                        <p>En attente</p>
                                    </div>
                                @endif

                            </div>
                        @endforeach
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
