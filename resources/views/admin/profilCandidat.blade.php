@section('title', 'Profil candidat')
@include('banner.header')

<main class="profil-candidat">
    <div class="bg-color-grey">
        <div class="container display">
            <div class="block-profil">
                <figure class="block-profil__image">
                    @if (Str::startsWith($candidat->photo, 'public/'))
                        <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $candidat->photo)) }}"
                            alt="Image 1">
                    @else
                        <img src="{{ asset($candidat->photo) }}" alt="Image 1">
                    @endif
                </figure>
            </div>

            <div class="block-profil__informations">
                <div class="block-profil__informations__texte">
                    <div class="info request">Nom :</div>
                    <div class="info response maj">{{ $candidat->nom }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Prénoms :</div>
                    <div class="info response">{{ $candidat->prenom }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Genre :</div>
                    <div class="info response">{{ $candidat->genre->nom }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Date de naissance :</div>
                    <div class="info response">
                        {{ \Carbon\Carbon::parse($candidat->datenaissance)->locale('fr_FR')->isoFormat('D MMMM Y') }}
                    </div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Contact :</div>
                    <div class="info response">+261 {{ $candidat->contact }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Adresse :</div>
                    <div class="info response">{{ $candidat->adresse }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Email :</div>
                    <div class="info response">{{ $candidat->email }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Statut marital :</div>
                    <div class="info response">{{ $candidat->statutmarital->nom }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Nombre enfants :</div>
                    <div class="info response">{{ $candidat->nb_enfants }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Type Contrat :</div>
                    <div class="info response">{{ $candidat->typecontrat->type }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Département :</div>
                    <div class="info response">{{ $candidat->deptposte->dept->nom }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Poste :</div>
                    <div class="info response">{{ $candidat->deptposte->poste->nom }}</div>
                </div>

                <div class="block-profil__informations__texte">
                    <div class="info request">Statut :</div>
                    <div class="info response">
                        @if ($candidat->statut == 0)
                            <p> - </p>
                        @endif
                        @if ($candidat->statut == 1)
                            <p>Confirmé</p>
                        @endif
                        @if ($candidat->statut == 2)
                            <p>Refusé</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="boutons modify-height">

            <div class="btn bleu-clair" id="btnModifier">
                <a href="{{ route('modifier-candidat') }}"  class="btn__middle-btn">MODIFIER</a>
            </div>

            <div class="btn red">
                <a href="{{ route('supprimer-candidat') }}" onclick="confirmDeleteCandidat(event)" class="btn__middle-btn">SUPPRIMER</a>
            </div>

            <div class="btn bleu-foncé">
                <a href="{{ route('liste-candidats') }}" class="btn__middle-btn">ANNULER</a>
            </div>

        </div>
    </div>

    <script>
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
