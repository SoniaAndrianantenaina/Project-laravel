@section('title', 'Ajout candidat')
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

        <div class="formulaire-collab__title">
            <h2 class='title-h2'>VEUILLEZ REMPLIR LE FORMULAIRE SUIVANT :</h2>
        </div>

        <div class="formulaire-collab">
            <form id="regForm" action="{{ route('valider-ajout-candidat') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="tab">
                    <div class="grid">
                        <div class="formulaire-collab__content input">
                            <label for="">
                                <span class="d-block">Nom :</span>
                                <input type="text" class="btn-blue clair" name="nom" id="" required>
                            </label>
                        </div>

                        <div class="formulaire-collab__content input">
                            <label for="">
                                <span class="d-block">Prénom :</span>
                                <input type="text" class="btn-blue clair" name="prenom" id="" required>
                            </label>
                        </div>

                        <div class="formulaire label">
                            <label for="">
                                <span class="d-block">Date de naissance :</span>
                                <input type="date" class="btn-blue clair" name="date_naissance" id="" required>
                            </label>
                        </div>

                        <div class="formulaire label">
                            <label for="">
                                <span class="d-block">Genre :</span>
                                <select class="select clair" name="idGenre" id="">
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->idGenre }}">{{ $genre->nom }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="formulaire-collab__content input">
                            <label for="">
                                <span class="d-block">Contact :</span>
                                <input type="number" class="btn-blue clair" name="contact" required>
                            </label>
                        </div>

                        <div class="formulaire-collab__content input">
                            <label for="">
                                <span class="d-block">Adresse :</span>
                                <input type="text" class="btn-blue clair" name="adresse" id="">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="grid">
                        <div class="formulaire label">
                            <label for="">
                                <span class="d-block">Statut marital :</span>
                                <select class="select clair" name="statut_marital" id="">
                                    @foreach ($statut_marital as $sm)
                                        <option value="{{ $sm->idStatutMarital }}">{{ $sm->nom }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="formulaire-collab__content input">
                            <label for="">
                                <span>E-mail :</span>
                                <input type="email" class="btn-blue clair" name="email" id="" required>
                            </label>
                        </div>

                        <div class="formulaire-collab__content input">
                            <label for="">
                                <span class="d-block">Nombre enfants :</span>
                                <input type="number" class="btn-blue clair" name="nbrEnfants" id="" required>
                            </label>
                        </div>

                        <div>
                            <label for="photo">
                                <span class="d-block">Photo :</span>
                                <input type="file" class="btn-blue clair" name="file" id="">
                            </label>
                        </div>

                        <div>
                            <label for="cv">
                                <span class="d-block">CV :</span>
                                <input type="file" class="btn-blue clair" name="CV" id="">
                            </label>
                        </div>

                        <div>
                            <label for="lm">
                                <span class="d-block">LM :</span>
                                <input type="file" class="btn-blue clair" name="LM" id="">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="grid">
                        <div class="formulaire label">
                            <label for="">
                                <span class="d-block">Départements :</span>
                                <select class="select clair" name="idDepartement" id="idDepartement">
                                    @foreach ($departements as $dpt)
                                        <option value="{{ $dpt->idDepartement }}">{{ $dpt->nom }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="formulaire label">
                            <label for="">
                                <span class="d-block">Postes :</span>
                                <select class="select clair" name="idPoste" id="idPoste">
                                    <option value=""></option>
                                </select>
                            </label>
                        </div>

                        <div class="formulaire label">
                            <label for="">
                                <span class="d-block">Type Contrat :</span>
                                <select class="select clair" name="idTypeContrat">
                                    @foreach ($type_contrat as $tc)
                                        <option value="{{ $tc->idTypeContrat }}">{{ $tc->type }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                </div>

                <div style="overflow:auto;">
                    <div class="btn-position">
                        <button class="button-step" type="button" id="prevBtn"
                            onclick="nextPrev(-1)">Previous</button>
                        <button class="button-step" type="button" id="nextBtn"
                            onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <div class="steps">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
        </div>


    </section>

    <script>
        $(document).ready(function() {
            $('select[name="idDepartement"]').change(function() {
                var selectedDepartementId = $(this)
                    .val();

                $.ajax({
                    url: '/get-postes/' + selectedDepartementId,
                    type: "GET",
                    success: function(data) {
                        var options = '';

                        for (var i = 0; i < data.postes.length; i++) {
                            options += '<option value="' + data.postes[i].idPoste + '">' + data
                                .postes[i].nom + '</option>';
                        }

                        $('select[name="idPoste"]').html(options);
                    }
                });
            });
        });

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('liste-candidats') }}';
                }
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}'
            });
        @endif
    </script>
</main>
