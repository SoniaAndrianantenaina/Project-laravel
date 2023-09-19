@include('banner.header')

<main class='page-ajout-candidat'>

    <section class='block-ajoutCol'>

        <figure class='block-accueil__bg-img'>
            <img src='{{ asset('assets/images/collaborateur/recrutement.jpg') }}' alt=''>
        </figure>

        <div class='block-ajoutCol__paragraphe'>
            <div class='block-ajoutCol__text'>
                <h2 class='block-ajoutCol subtitle-collab'>Nouveau Candidat</h2>

                <h3 class='block-ajoutCol cause-collab'>
                    Le recrutement est un <strong>facteur d'accroissement économique</strong> : il permet d'augmenter le
                    chiffre d'affaires,
                    <strong>parfaire les marges bénéficiaires</strong>, dégager du temps susceptible d'être alloué à
                    d'autres tâches
                    au sein de l'entreprise, et <strong>apporter de l'aide aux apprenants qualifiés.</strong>
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

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span class="d-block">Nom :</span>
                        <input type="text" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span class="d-block">Prénom :</span>
                        <input type="text" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Date de naissance :</span>
                        <input type="date" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Genre :</span>
                        <select class="select" name="" id="">
                            <option value="">Homme</option>
                            <option value="">Femme</option>
                        </select>
                    </label>
                </div>

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span class="d-block">Contact :</span>
                        <input type="text" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span class="d-block">Adresse :</span>
                        <input type="text" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Statut marital :</span>
                        <select class="select" name="" id="">
                            <option value="">Marié</option>
                            <option value="">Célibataire</option>
                        </select>
                    </label>
                </div>

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span>E-mail :</span>
                        <input type="email" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span class="d-block">Numéro CIN :</span>
                        <input type="number" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire-collab__content input">
                    <label for="">
                        <span class="d-block">Nombre enfants :</span>
                        <input type="number" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div>
                    <label for="photo">
                        <span class="d-block">Photo :</span>
                        <input type="file" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div>
                    <label for="cv">
                        <span class="d-block">CV :</span>
                        <input type="file" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div>
                    <label for="lm">
                        <span class="d-block">LM :</span>
                        <input type="file" class="btn-blue" name="" id="">
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Départements :</span>
                        <select class="select" name="" id="">
                            <option value="">Digital Agency</option>
                        </select>
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Postes :</span>
                        <select class="select" name="" id="">
                            <option value="">Stagiaire</option>
                        </select>
                    </label>
                </div>


            </div>

            <div class="btn-générer">
                <a href="#"" class="btn-blue primary medium">Valider</a>
            </div>

    </section>

</main>
