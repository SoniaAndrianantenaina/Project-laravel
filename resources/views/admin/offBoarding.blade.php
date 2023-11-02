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
                <h2 class='title-h2'>{{ $employe->nom }} {{ $employe->prenom }}</h2>
            </div>

            <form action="{{ route('valider-off-boarding') }}" method="POST">
                @csrf
                <div class="formulaire-collab__content">
                    <div>
                        <label for="">
                            <span>Type de départ :</span>
                            <select class="select" name="idTypeDepart" id="">
                                @if ($employe->date_fin)
                                    @php
                                        $typeDepartOptions = $typedepart->keyBy('idTypeDepart');
                                    @endphp

                                    <option value="3">Fin contrat CDD</option>

                                    @foreach ($typedepart as $td)
                                        @if ($td->idTypeDepart != 3)
                                            <option value="{{ $td->idTypeDepart }}">{{ $td->nom }}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($typedepart as $td)
                                        <option value="{{ $td->idTypeDepart }}">{{ $td->nom }}</option>
                                    @endforeach

                                @endif
                            </select>
                        </label>

                    </div>

                    <div class="formulaire label">
                        <label for="">
                            <span class="d-block">Date départ :</span>
                            @if ($employe->date_fin)
                                <input type="date" class="btn-blue" name="date_depart" id=""
                                    value="{{ $employe->date_fin }}">
                            @else
                                <input type="date" class="btn-blue" name="date_depart" id="">
                            @endif

                        </label>
                    </div>

                    <div class="formulaire-collab__content">
                        <textarea class="textarea" name="motif" id="" cols="50" rows="10" placeholder="Motif"></textarea>
                    </div>

                </div>

                <div class="btn-générer">
                    <button type="submit" class="btn-blue primary medium">Licencier</button>
                </div>
            </form>
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
