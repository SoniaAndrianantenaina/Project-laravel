@include('banner.headerEmployé')

<main class="demande-congé">
    <section class="contenu">
        <div class="div-grey">
            @include('employé.profil.profil-infos')

            <div class="div-grey__content">

                <h4 class="title-h4 light-grey">Demander un congé</h4>
                <div class="white-trait-lg"></div>

                <div class="centered-container">

                    <div class="div-grey__request">
                        <form action="{{ route('valider-demande-congé') }}" method="POST">
                            @csrf
                            <div class="div-grey__request__data">
                                <p class="div-grey__request__data__span">Date demande :</p>
                                <input class="div-grey__request__data__input" type="date" name="date_demande">

                                <a class="see-planning" href="{{ route('planning-congé') }}">Voir le planning</a>
                            </div>

                            <div class="div-grey__request__data">
                                <p class="div-grey__request__data__span">Date début :</p>
                                <input class="div-grey__request__data__input" type="date" name="date_debut">
                            </div>

                            <div class="div-grey__request__data">
                                <p class="div-grey__request__data__span">Date fin :</p>
                                <input class="div-grey__request__data__input" type="date" name="date_fin">
                            </div>

                            <div class="div-grey__request__data">
                                <label class="div-grey__request__data__span">Type congé :</label>

                                <select class="div-grey__request__data__input blue" name="idTypeCongé" id="type_conge">
                                    @foreach ($type_conge as $tc)
                                        <option value="{{ $tc->idTypeConge }}">{{ $tc->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="div-grey__request__data" style="display: none;" id="motif_permission">
                                <label class="div-grey__request__data__span">Motif congé :</label>

                                <select class="div-grey__request__data__input blue" name="idMotifPermission">
                                    @foreach ($motif_permission as $mp)
                                        <option value="{{ $mp->idMotifPermission }}">{{ $mp->motif }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="boutons modify-top">
                                <div>
                                    <button type="submit" class="btn bleu-foncé fs-17">SOUMETTRE</button>
                                </div>

                                <div>
                                    <a href="{{ route('solde-conge') }}" class="btn bleu-clair fs-17">ANNULER</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="date-right">
                @php
                    echo $dateDuJour;
                @endphp
            </div>
        </div>
    </section>

    <script>
        showMotif();

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('solde-conge') }}';
                }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}'
            });
        @endif

        @if (session('errors'))
            Swal.fire({
                icon: 'error',
                title: 'Erreurs',
                html: '<ul>@foreach (session('errors') as $error) <li>{{ $error }}</li> @endforeach</ul>'
            });
        @endif
    </script>

</main>
