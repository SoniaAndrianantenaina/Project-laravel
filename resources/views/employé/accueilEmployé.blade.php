@include('banner.headerEmployé')
{{$employe_user}}
<main class='page-accueil'>

    <section class='block-accueil'>

        <figure class='block-accueil__bg-img'>
            <img src='{{ asset('assets/images/accueil/accueil.jpg') }}' alt=''>
        </figure>

        <div class='block-accueil__section'>

            <div class='block-accueil__paragraph'>
                <h2 class='block-accueil subtitle'>RESSOURCES HUMAINES</h2>
                <h3 class='block-accueil texte'>
                    Au sein d'une entreprise la gestion des Ressources humaines couvre de multiples aspects tous très
                    importants pour le bon
                    fonctionnement de la société.
                </h3>

            </div>
        </div>

    </section>

    <section class='block-annonces'>
        <div class='block-annonces__item'>
            <div class='block-annonces__item__title'>
                <h2 class='title-h2'>
                    ANNONCES
                </h2>
                <div class="trait"></div>
            </div>

            <div class="block-annonces__two-blocks">
                <div class="block-annonces__two-blocks__item">
                    <div class="block-annonces__two-blocks__item left">
                        <div class="block-annonces title">
                            <h2 class="title-h2">ANNONCES DU JOUR</h2>
                        </div>

                        @foreach ($annonceDuJour as $adj)
                            <div class="block-annonces content">
                                <div class="block-annonces content__paragraph">
                                    <h6>{{ $adj->titre }}</h6>
                                    <p>{{ $adj->contenu }}</p>
                                    <p class="date">
                                        Heure début : {{ \Carbon\Carbon::parse($adj->date_debut)->format('H:i') }}
                                    </p>
                                    <p class="date">
                                        Date fin :
                                        {{ \Carbon\Carbon::parse($adj->date_fin)->locale('fr_FR')->isoFormat('LL [à] LT') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="block-annonces__two-blocks__item">
                    <div class="block-annonces__two-blocks__item right">
                        <div class="block-annonces title">
                            <h2 class="title-h2">ANNONCES À VENIR</h2>
                        </div>

                        @foreach ($annoncesAvenir as $av)
                            <div class="block-annonces content">
                                <div class="block-annonces content__paragraph">
                                    <h6>{{ $av->titre }}</h6>
                                    <p>{{ $av->contenu }}</p>
                                    <p class="date">
                                        Date début :
                                        {{ \Carbon\Carbon::parse($av->date_fin)->locale('fr_FR')->isoFormat('LL [à] LT') }}
                                    </p>
                                    <p class="date">
                                        Date parution :
                                        {{ \Carbon\Carbon::parse($av->date_parution)->locale('fr_FR')->isoFormat('LL [à] LT') }}
                                    </p>
                                    <p class="date">
                                        Date fin :
                                        {{ \Carbon\Carbon::parse($av->date_fin)->locale('fr_FR')->isoFormat('LL [à] LT') }}
                                    </p>

                                </div>
                            </div>
                        @endforeach

                        <div>
                            <a href="{{ route('annonces-du-jour') }}" class="btn-white lg-plus">VOIR TOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div style="height: 15vh"></div>

</main>
