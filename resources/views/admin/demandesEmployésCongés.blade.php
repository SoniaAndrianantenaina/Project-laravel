@include('banner.header')

<main class="demandes-employés-congés">
    <section class="contenu">

        <div class="wrapper-main">
            <div class="bg-color-blue">
                <div class="bg-color-blue__block">
                    <div class="filtre">
                        <div class="filtre__select">
                            <label class="filter-label">
                                <span class="filter-span">Année :</span>
                                <select class="select white" id="">
                                    <option value="">2023</option>
                                    <option value="">2022</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtre__select">
                            <label class="filter-label">
                                <span class="filter-span">Département :</span>
                                <select class="select white" name="" id="">
                                    <option value="">Homme</option>
                                    <option value="">Femme</option>
                                </select>
                            </label>
                        </div>

                        <div class="filtre__select">
                            <label class="filter-label">
                                <span class="filter-span">Contrat :</span>
                                <select class="select white" name="" id="">
                                    <option value="">CDD</option>
                                    <option value="">CDI</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="boutons modify-top">
                        <div class="btn btn-filtre bleu-foncé">
                            <a href="" class="btn__middle-btn">EFFACER</a>
                        </div>

                        <div class="btn btn-filtre bleu-clair">
                            <a href="" class="btn__middle-btn">FILTRER</a>
                        </div>
                    </div>

                </div>
            </div>

            {{-- table --}}
            <div class="head-table">
                <div class="left-head">
                    <span>1-20</span>
                    de 134 résultats
                </div>
                <div class="right-head">
                    <a class="print" href="">
                    </a>
                </div>
            </div>

            <table class="table-list">
                <thead>
                    <tr>
                        <th>
                            <div>NOM/ADRESSE <i class="icon-chevron-bottom"></i></div>
                        </th>
                        <th>
                            <div>REF</div>
                        </th>
                        <th>
                            <div>DÉPARTEMENT</div>
                        </th>
                        <th>
                            <div>POSTE</div>
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
                                    <a href="{{ route('planning-congé-employé', ['idDepartement' => $idDepartement]) }}">
                                        <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                    </a>
                                    {{$demande->employe->candidat->nom}} {{$demande->employe->candidat->prenom}}  <br>
                                    {{$demande->employe->candidat->adresse}}
                                </div>
                            </td>
                            <td>
                                <div>REF00{{$demande->idDemandeConge}}</div>
                            </td>
                            <td>
                                <div>{{$demande->employe->candidat->deptposte->dept->nom}}</div>
                            </td>
                            <td>
                                <div>{{$demande->employe->candidat->deptposte->poste->nom}}</div>
                            </td>
                            <td>
                                <div>{{$demande->date_debut}}</div>
                            </td>
                            <td>
                                <div>{{$demande->date_fin}}</div>
                            </td>
                            <td>
                                <div class="statut centered-container">
                                    <a href="">
                                        <img src="{{ asset('assets/images/icon/done.png') }}" alt="">
                                    </a>
                                    <a href="">
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
</main>
