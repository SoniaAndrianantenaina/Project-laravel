@include('banner.header')

<main class='page-ajout-collaborateur'>

    <section class='block-ajoutCol'>

        <figure class='block-accueil__bg-img'>
            <img src='{{ asset('assets/images/collaborateur/cohésion.jpg') }}' alt=''>
        </figure>

        <div class='block-ajoutCol__paragraphe'>
            <div class='block-ajoutCol__text'>
                <h2 class='block-ajoutCol subtitle-collab'>Nouveau Collaborateur</h2>

                <h3 class='block-ajoutCol cause-collab'>
                    La meilleure des façons de commencer, c'est de prévenir les équipes internes qu'un
                    <strong>nouveau collaborateur</strong> va rejoindre l'entreprise.
                </h3>

            </div>
        </div>

    </section>

    <section class="formulaire">
        <div class="formulaire-collab">
            <div class="block-annonces__item__title">
                <h2 class='title-h2'>VEUILLEZ REMPLIR LE FORMULAIRE SUIVANT :</h2>
            </div>

            <div class="formulaire-collab__content">

                <div class="formulaire-select">
                    <select class="select" name="" id="">
                        <option value="">Départements</option>
                    </select>
                </div>

                <div class="formulaire-select">
                    <select class="select" name="" id="">
                        <option value="">Postes</option>
                    </select>
                </div>

                <div class="formulaire-collab__content input">
                    <input type="text" class="btn-blue" name="" id="" placeholder="Salaire">
                </div>

                <div class="formulaire-select">
                    <select class="select" name="" id="">
                        <option value="">Type Contrat</option>
                    </select>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Date début :</span>
                        <input type="date" class="btn-blue" name="" id="">
                    </label>
                </div>


                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Date fin :</span>
                        <input type="date" class="btn-blue" name="" id="">
                    </label>
                </div>


            </div>

            <div class="boutons modify-height">

                <div class="btn btn-small bleu-clair">
                    <a href="{{ route('contrat-cdd') }}" class="btn__middle-btn">GÉNÉRER CONTRAT</a>
                </div>

                <div class="btn btn-small bleu-foncé">
                    <a href="{{ route('envoyer-identifiant') }}" class="btn__middle-btn">GÉNÉRER IDENTIFIANTS</a>
                </div>

            </div>

        </div>
    </section>

</main>
