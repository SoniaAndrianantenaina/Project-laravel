@section('title', 'Profil employé')
@include('banner.header')

<body class="bg-color-grey">
    <main class="profil-employé">
        <section class="contenu">
            <div class="bg-color-grey">

                <div class="three-cubes">
                    <div class="div">
                        <div class="cube__first">
                            <div class="center-content">
                                <div class="div">
                                    <figure class="cube__first__image">
                                        @if (Str::startsWith($profil->photo, 'public/'))
                                            <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $profil->photo)) }}"
                                                alt="Image 1">
                                        @else
                                            <img src="{{ asset($profil->photo) }}" alt="Image 1">
                                        @endif
                                    </figure>
                                </div>

                                <div class="cube__text">
                                    <div class="cube__text title navy">
                                        <h4 class="uppercase">{{ $profil->nom }}</h4>
                                    </div>

                                    <div class="cube__text__subtitle navy">
                                        <h4>{{ $profil->prenom }}</h4>
                                    </div>

                                    <div class="pin">
                                        <div>
                                            <figure class="pin__image">
                                                <img src="{{ asset('assets/images/collaborateur/pin.png') }}"
                                                    alt="">
                                            </figure>
                                        </div>

                                        <div class="pin__content">
                                            <h4 class="pin__content__text">{{ $profil->adresse }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cube__second">
                            <div>
                                <div class="cube__second__title">
                                    <h4 class="uppercase">
                                        SALAIRE
                                    </h4>
                                </div>

                                <div class="cube__second__subtitle">
                                    <div class="flex">
                                        <h4>Solde brut : </h4>
                                        <h4>{{ $profil->salaire }} Ar</h4>
                                    </div>

                                    <div class="flex">
                                        <h4>Solde net : </h4>
                                        <h4>{{ $salaireNet }} Ar</h4>
                                    </div>

                                </div>

                                <div class="boutons">
                                    <div>
                                        <a href="#" class="btn re-arranged bleu-clair"  id="modifierButton"  data-toggle="modal"
                                            data-target="#modifierProfilModal">MODIFIER</a>
                                    </div>

                                    <div>
                                        <a href="{{ route('off-boarding') }}" class="btn re-arranged bleu-foncé"
                                            onclick="supprimerEmploye(event)">SUPPRIMER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cube__third">
                        <div class="cube__third__ctn">

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Nom : {{ $profil->prenom }} {{ $profil->nom }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>E-mail : {{ $profil->email }} </h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Date naissance :
                                        {{ \Carbon\Carbon::parse($profil->datenaissance)->locale('fr_FR')->isoFormat('LL') }}
                                    </h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Genre : {{ $profil->genre->nom }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Contact : 0{{ $profil->contact }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Département : {{ $profil->deptposte->dept->nom }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Poste : {{ $profil->deptposte->poste->nom }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Contrat : {{ $profil->typecontrat->type }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Date début :
                                        {{ \Carbon\Carbon::parse($profil->date_debut)->locale('fr_FR')->isoFormat('LL') }}
                                    </h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Date fin :
                                        {{ \Carbon\Carbon::parse($profil->date_fin)->locale('fr_FR')->isoFormat('LL') }}
                                    </h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Statut marital : {{ $profil->statutmarital->nom }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                            <div>
                                <div class="cube__third__ctn__info">
                                    <h4>Nombre d'enfants : {{ $profil->nb_enfants }}</h4>
                                </div>

                                <div class="cube__third__ctn__trait"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade d-none" id="modifierProfilModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modifier le Profil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Ajoutez ici votre formulaire de modification -->
                            <form id="modifierProfilForm">
                                <!-- Ajoutez les champs du formulaire ici -->
                                <label for="nom">Nom:</label>
                                <input type="text" id="nom" name="nom" value="{{ $profil->nom }}">
                                <!-- Ajoutez d'autres champs en conséquence -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary"
                                id="submitModifierProfilForm">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: '{{ session('success') }}',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('liste-employes') }}';
                    }
                });
            @elseif (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: '{{ session('error') }}'
                });
            @endif

           /* $(document).ready(function() {
                // Ajustez les sélecteurs en conséquence
                $('.btn.re-arranged.bleu-clair').click(function() {
                    $('#modifierProfilModal').modal('show');
                });

                $('#modifierProfilForm').submit(function(e) {
                    e.preventDefault();
                    // Ajoutez votre logique AJAX ici
                    // ...

                    // Fermez le modal après la soumission réussie
                    $('#modifierProfilModal').modal('hide');
                });
            });
        </script>
    </main>

</body>
