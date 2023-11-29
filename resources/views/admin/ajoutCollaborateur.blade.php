@section('title', 'Ajout Collaborateur')
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

            <form action="{{ route('generer-id') }}" method="POST">
                @csrf
                <div class="formulaire-collab__content">

                    <div class="formulaire label">
                        <label for="">
                            <span class="d-block">Département :</span>
                            <input type="text" class="btn-blue clair" name="idDepartement" id=""
                                value="{{ $candidat->deptposte->dept->nom }}">
                        </label>
                    </div>

                    <div class="formulaire label">
                        <label for="">
                            <span class="d-block">Poste :</span>
                            <input type="text" class="btn-blue clair" name="idPoste" id=""
                                value="{{ $candidat->deptposte->poste->nom }}">
                        </label>
                    </div>

                    <div class="formulaire label">
                        <label for="">
                            <span class="d-block">Salaire :</span>
                            <input type="text" class="btn-blue clair" name="salaire" id=""
                                value="{{ $candidat->deptposte->poste->salaire }}">
                        </label>
                    </div>

                    <div class="formulaire-select">
                        <label for="">
                            <span class="d-block">Type Contrat :</span>
                        </label>
                        <select class="select clair" name="type_contrat" id="type_contrat">
                            @foreach ($type_contrat as $tp)
                                <option value="{{ $tp->idTypeContrat }}"
                                    {{ $candidat->idTypeContrat == $tp->idTypeContrat ? 'selected' : '' }}>
                                    {{ $tp->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="formulaire label">
                        <label for="">
                            <span class="d-block">Date début :</span>
                            <input type="date" class="btn-blue clair" name="date_debut" id="">
                        </label>
                    </div>


                    <div class="formulaire label" id="date_fin_container" style="display: none;">
                        <label for="">
                            <span class="d-block">Date fin :</span>
                            <input type="date" class="btn-blue clair" name="date_fin" id="date_fin_input">
                        </label>
                    </div>

                </div>

                <div class="boutons">
                    <button type="submit" class="btn btn-small bleu-clair">GÉNÉRER IDENTIFIANTS</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var typeContratSelect = document.getElementById("type_contrat");
            var dateFinContainer = document.getElementById("date_fin_container");

            function toggleDateFinContainer() {
                if (typeContratSelect.value === "2" || typeContratSelect.value === "3") {
                    dateFinContainer.style.display = "block";
                } else {
                    dateFinContainer.style.display = "none";
                }
            }

            typeContratSelect.addEventListener("change", toggleDateFinContainer);

            toggleDateFinContainer();
        });
    </script>


</main>
