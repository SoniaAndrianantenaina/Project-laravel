@include('banner.header')

<main class='page-off-boarding'>

    <section class='block-ajoutCol'>

        <figure class='block-accueil__bg-img'>
            <img src='{{ asset('assets/images/collaborateur/offboarding.jpg') }}' alt=''>
        </figure>

        <div class='block-ajoutCol__paragraphe'>
            <div class='block-ajoutCol__text'>
                <h2 class='block-ajoutCol subtitle-collab'>Offboarding</h2>

                <h3 class='block-ajoutCol cause-collab'>
                    L'offboarding désigne la période précédant le départ, <strong>souhaité ou non,</strong> d'un
                    salarié. Prendre soin de ses salariés depuis
                    leurs arrivées jusqu'à leurs départs apportera de nombreux bénéfices à votre entreprise, en termes
                    de réputation, de
                    réseau mais aussi de performance.
                </h3>

            </div>
        </div>

    </section>

    <section class="formulaire">
        <div class="formulaire-collab">
            <div class="block-annonces__item__title">
                <h2 class='title-h2'>{{ $offboarding->nom }} {{ $offboarding->prenom }}</h2>
            </div>

            <div class="formulaire-collab__content">

                <div>
                    <label for="">
                        <span>Type de départ :</span>
                        <select class="select" name="" id="">
                            <option value="">Type</option>
                        </select>
                    </label>

                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Date départ :</span>
                        <input type="date" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire-collab__content">
                    <textarea class="textarea" name="" id="" cols="50" rows="10" placeholder="Motif"></textarea>
                </div>

            </div>

            <div class="btn-générer">
                <a href="envoyerIdentifiant.php" class="btn-blue primary medium">Licencier</a>
            </div>

        </div>
    </section>

</main>
