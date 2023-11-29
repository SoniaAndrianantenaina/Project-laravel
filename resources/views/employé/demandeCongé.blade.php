@section('title', 'Demande congé')
@include('banner.headerEmployé')

<main class="demande-congé">
    <section class="contenu">
        <div class="div-grey">
            <div class="date-right">
                @php
                    echo $dateDuJour;
                @endphp
            </div>
            <div class="div-grey__profil" style="height: 90%;">
                <div class="center-content">
            
                    <div>
                        <figure class="div-grey__picture">
                            @if (Str::startsWith($profil->photo, 'public/'))
                                <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $profil->photo)) }}" alt="Image 1">
                            @else
                                <img src="{{ asset($profil->photo) }}" alt="Image 1">
                            @endif
                        </figure>
                    </div>
            
                    <div class="div-grey__infos">
                        <div class="div-grey__infos__center">
                            <h6>{{ $profil->prenom }}</h6>
                            <h6>{{ $profil->nom }}</h6>
                            <h6 class="uppercase black"> {{ $profil->deptposte->dept->nom }}</h6>
                            <h6>{{ $profil->deptposte->poste->nom }}</h6>
                        </div>
                    </div>
                </div>
            
                <div class="left-text">
                    <div class="div-grey__infos__left">
                        <h6>Matricule : 00{{ $profil->idEmploye }}</h6>
                        <h6>0{{ $profil->contact }}</h6>
            
                        <div class="trait-lg"></div>
            
                        <div>
                            <h3 class="title-h3-navy uppercase">Contrat</h3>
                            <h6 class="title-h6">Contrat : {{ $profil->typecontrat->type }}</h6>
                        </div>
            
                        <div class="trait-lg"></div>
            
                        <div>
                            @if ($profil->degre = 1)
                                <h3 class="title-h3-navy uppercase">Manager</h3>
                                @foreach ($manager as $man)
                                    <div class="bck-data">
                                        <div class="bck-data__picture">
                                            @if (Str::startsWith($man->photo, 'public/'))
                                                <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $man->photo)) }}"
                                                    alt="Image 1">
                                            @else
                                                <img src="{{ asset($man->photo) }}" alt="Image 1">
                                            @endif
                                        </div>
            
                                        <div class="bck-data__text">
                                            <h6 class="title-h6 black">{{ $man->nomEmploye }} {{ $man->prenom }}</h6>
                                            <h6 class="title-h6">{{ $man->nomPoste }}</h6>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-12"></div>
                                @endforeach
                            @endif
                        </div>
            
                        <div>
                            <div class="title-h3-navy uppercase">
                                <h3>Relations directes</h3>
                            </div>
            
                            @foreach ($relation as $rel)
                                <div class="bck-data">
                                    <div class="bck-data__picture">
                                        @if (Str::startsWith($rel->photo, 'public/'))
                                                <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $rel->photo)) }}"
                                                    alt="Image 1">
                                            @else
                                                <img src="{{ asset($rel->photo) }}" alt="Image 1">
                                            @endif
                                    </div>
            
                                    <div class="bck-data__text">
                                        <h6 class="title-h6 black">{{ $rel->nomEmploye }} {{ $rel->prenom }}</h6>
                                        <h6 class="title-h6">{{ $rel->nomPoste }}</h6>
                                    </div>
                                </div>
            
                                <div class="mb-12"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>            

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
                                    <option value="">Sélectionnez une option</option>
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
