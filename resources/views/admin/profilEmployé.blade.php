@include('banner.header')

<main class="profil-employé">
    <section class="contenu">
        <div class="bg-color-grey">

            <div class="three-cubes">
                <div class="div">
                    <div class="cube__first">
                        <div class="center-content">
                            <div class="div">
                                <figure class="cube__first__image">
                                    <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
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
                            <div class="cube__second__salary title navy">
                                <h4 class="uppercase">
                                    SALAIRE
                                </h4>
                            </div>

                            <div class="cube__second__subtitle">
                                <h4 class="adjust-left">Solde</h4>
                                <h4 class="adjust-right__1">{{ $profil->deptposte->poste->salaire }}</h4>
                            </div>

                            <div class="boutons">
                                <div>
                                    <a href="" class="btn re-arranged bleu-clair">MODIFIER</a>
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

                        <div>
                            <div class="cube__third__ctn__info">
                                <h4>CIN</h4>
                            </div>

                            <div class="cube__third__ctn__trait"></div>
                        </div>
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
    </script>
</main>
