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
                <h2 class='title-h2'>{{ $candidat->nom }} {{ $candidat->prenom }}</h2>
            </div>

            <div class="formulaire-collab__content">

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Département :</span>
                        <input type="text" class="btn-blue" name="" id=""
                            value="{{ $candidat->deptposte->dept->nom }}">
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Poste :</span>
                        <input type="text" class="btn-blue" name="" id=""
                            value="{{ $candidat->deptposte->poste->nom }}">
                    </label>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Salaire :</span>
                        <input type="text" class="btn-blue" name="" id=""
                            value="{{ $candidat->deptposte->poste->salaire }} Ar">
                    </label>
                </div>

                <div class="formulaire-select">
                    <label for="">
                        <span class="d-block">Type Contrat :</span>
                    </label>
                    <select class="select" name="type_contrat" id="type_contrat">
                        @foreach ($type_contrat as $tp)
                            <option value="{{ $tp->idTypeContrat }}">{{ $tp->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="formulaire label">
                    <label for="">
                        <span class="d-block">Date début :</span>
                        <input type="date" class="btn-blue" name="" id="">
                    </label>
                </div>


                <div class="formulaire label" id="date_fin_container" style="display: none;">
                    <label for="">
                        <span class="d-block">Date fin :</span>
                        <input type="date" class="btn-blue" name="date_fin" id="date_fin_input">
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

    <script>
        var typeContratSelect = document.getElementById("type_contrat");
        var dateFinContainer = document.getElementById("date_fin_container");

        typeContratSelect.addEventListener("change", function() {
            if (typeContratSelect.value === "2" || typeContratSelect.value === "3") {
                dateFinContainer.style.display = "block";
            } else {
                dateFinContainer.style.display = "none";
            }
        });
    </script>

</main>
