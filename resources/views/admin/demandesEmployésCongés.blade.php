@section('title', 'Demandes-employés-congés')
@include('banner.header')

<body class="bg-color-grey-1">
    <main class="demandes-employés-congés">
        <section class="contenu">

            <div class="wrapper-main">
                <div class="bg-color-blue">
                    <div class="bg-color-blue__block">
                        <form action="{{ route('demande-employe-conge') }}" method="POST">
                            @csrf
                            <div class="filtre">
                                <div class="filtre__select">
                                    <label class="filter-label">
                                        <span class="filter-span">Année :</span>
                                        <select class="select white" name="annee" id="annee">
                                            @php
                                                $anneeActuelle = date('Y');
                                                $nombreAnnees = 10;
                                            @endphp

                                            @for ($i = 0; $i < $nombreAnnees; $i++)
                                                @php
                                                    $annee = $anneeActuelle + $i;
                                                @endphp
                                                <option value="{{ $annee }}">{{ $annee }}</option>
                                            @endfor
                                        </select>
                                    </label>
                                </div>

                                <div class="filtre__select">
                                    <label class="filter-label">
                                        <span class="filter-span">Département :</span>
                                        <select class="select white" name="departement" id="">
                                            @foreach ($departements as $dep)
                                                <option value="{{ $dep->idDepartement }}">{{ $dep->nom }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>

                                <div class="filtre__select">
                                    <label class="filter-label">
                                        <span class="filter-span">Poste :</span>
                                        <select class="select white" name="poste" id="">
                                            @foreach ($poste as $post)
                                                <option value="{{ $post->idPoste }}">{{ $post->nom }}</option>
                                            @endforeach

                                        </select>
                                    </label>
                                </div>
                            </div>

                            <div class="boutons modify-top">
                                <div class="btn btn-filtre bleu-foncé">
                                    <a href="{{ route('demande-employe-conge') }}" class="btn__middle-btn">EFFACER</a>
                                </div>
                        
                                <div class="btn btn-filtre bleu-clair">
                                    <input type="submit" href="" class="btn__middle-btn"
                                        value="FILTRER"></input>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

                {{-- table --}}

                <table class="table-list">
                    <thead>
                        <tr>
                            <th>
                                <div>NOM/ADRESSE <i class="icon-chevron-bottom"></i></div>
                            </th>
                            <th>
                                <div>DÉPARTEMENT</div>
                            </th>
                            <th>
                                <div>POSTE</div>
                            </th>
                            <th>
                                <div>TYPE CONGÉ</div>
                            </th>
                            <th>
                                <div>MOTIF</div>
                            </th>
                            <th>
                                <div>DÉBUT</div>
                            </th>
                            <th>
                                <div>FIN</div>
                            </th>
                            <th>
                                <div></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allDemandes as $demande)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        @php
                                            $idDepartement = $demande->employe->candidat->deptposte->dept->idDepartement;
                                        @endphp

                                        <a
                                            href="{{ route('planning-conge-employe', ['idDepartement' => $idDepartement]) }}">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}"
                                                alt="">
                                        </a>
                                        {{ $demande->employe->candidat->nom }}
                                        {{ $demande->employe->candidat->prenom }}
                                        <br>
                                        {{ $demande->employe->candidat->adresse }}

                                    </div>
                                </td>
                                <td>
                                    <div>{{ $demande->employe->candidat->deptposte->dept->nom }}</div>
                                </td>
                                <td>
                                    <div>{{ $demande->employe->candidat->deptposte->poste->nom }}</div>
                                </td>
                                <td>
                                    <div>{{ $demande->typeconge->nom }} </div>
                                </td>
                                <td>
                                    @if ($demande->motifperm)
                                        <div>{{ $demande->motifperm->motif }} </div>
                                    @endif
                                </td>
                                <td>
                                    <div>{{ $demande->date_debut }}</div>
                                </td>
                                <td>
                                    <div>{{ $demande->date_fin }}</div>
                                </td>
                                <td>
                                    <div class="statut centered-container">
                                        <a href="{{ url('confirmer-conge', ['idDemandeConge' => $demande->idDemandeConge]) }}"
                                            onclick="confirmerCongé(event);">
                                            <img src="{{ asset('assets/images/icon/done.png') }}" alt="">
                                        </a>

                                        <a href="{{ url('refuser-conge', ['idDemandeConge' => $demande->idDemandeConge]) }}"
                                            onclick="refuserCongé(event);">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>

        <script>
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Succès',
                    text: '{{ session('success') }}'
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
</body>
