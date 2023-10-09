@include('banner.headerEmployé')

<main class='page-accueil'>

    <section class='block-accueil'>

        <figure class='block-accueil__bg-img'>
            <img src='{{ asset('assets/images/accueil/accueil.jpg') }}' alt=''>
        </figure>

        <div class='block-accueil__section'>

            <div class='block-accueil__paragraph'>
                <h2 class='block-accueil subtitle'>RESSOURCES HUMAINES</h2>
                <h3 class='block-accueil texte'>
                    Au sein d'une entreprise la gestion des Ressources humaines couvre de multiples aspects tous très importants pour le bon
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

                        <div class="block-annonces content">
                            <p class="block-annonces content__paragraph">Souhaitons la bienvenue à notre nouvelle recrue Andrianantenaina Sonia</p>
                        </div>

                        <div class="block-annonces content">
                            <p class="block-annonces content__paragraph">Souhaitons la bienvenue à notre nouvelle recrue Andrianantenaina Sonia</p>
                        </div>

                    </div>
                </div>

                <div class="block-annonces__two-blocks__item">
                    <div class="block-annonces__two-blocks__item right">
                        <div class="block-annonces title">
                            <h2 class="title-h2">ANNONCES À VENIR</h2>
                        </div>

                        <div class="block-annonces content">
                            <p class="block-annonces content__paragraph">Souhaitons la bienvenue à notre nouvelle recrue Andrianantenaina Sonia</p>
                        </div>

                        <div class="block-annonces content">
                            <p class="block-annonces content__paragraph">Souhaitons la bienvenue à notre nouvelle recrue Andrianantenaina Sonia</p>
                        </div>

                        <div>
                            <a href="{{ route('liste-annonces-employe') }}" class="btn-white lg-plus">VOIR TOUT</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div style="height: 15vh"></div>

</main>
