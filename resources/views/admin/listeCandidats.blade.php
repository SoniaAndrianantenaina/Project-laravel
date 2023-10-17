@include('banner.header')
{{-- {{$util}} --}}
<body>
    <main class="liste-candidats">
        <section class="contenu">
                <div class="wrapper-main">
                    <div class="bg-color-blue">
                        <div class="bg-color-blue__block">
                            <div class="filtre">
                                <div class="filtre__select">
                                    <label class="filter-label">
                                        <span class="filter-span">Département :</span>
                                        <select class="select white" id="">
                                            <option value="">Dept1</option>
                                            <option value="">Dept2</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="filtre__select">
                                    <label class="filter-label">
                                        <span class="filter-span">Poste :</span>
                                        <select class="select white" name="" id="">
                                            <option value="">Poste1</option>
                                            <option value="">Poste2</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="filtre__select">
                                    <label class="filter-label">
                                        <span class="filter-span">Statut :</span>
                                        <select class="select white" name="" id="">
                                            <option value="">Confirmé</option>
                                            <option value="">Refusé</option>
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
                            <a class="print" href="{{ route('ajout-candidat') }}">
                                <img src="{{ asset('assets/images/icon/add.jpg') }}" alt="">
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
                                    <div>DÉPARTEMENT</div>
                                </th>
                                <th>
                                    <div>POSTE</div>
                                </th>
                                <th>
                                    <div>STATUT</div>
                                </th>
                                <th>
                                    <div>CV</div>
                                </th>
                                <th>
                                    <div>LM</div>
                                </th>
                                <th>
                                    <div>VALIDER</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidats as $candidat)
                                <tr>
                                    <td>
                                        <div class="d-flex">
                                            <a
                                                href="{{ route('profil-candidat', ['idCandidat' => $candidat->idCandidat]) }}">
                                                <img src="{{ asset($candidat->photo) }}" alt="">
                                            </a>
                                            {{ $candidat->nom }} {{ $candidat->prenom }}<br>
                                            {{ $candidat->adresse }}
                                        </div>
                                    </td>
                                    <td>
                                        <div>{{ $candidat->deptposte->dept->nom }}</div>
                                    </td>
                                    <td>
                                        <div>{{ $candidat->deptposte->poste->nom }}</div>
                                    </td>
                                    <td>
                                        <div class="statut center-content">
                                            @if ($candidat->statut == 0)
                                                <p> - </p>
                                            @endif
                                            @if ($candidat->statut == 1)
                                                <img src="{{ asset('assets/images/icon/done.png') }}" alt="">
                                            @endif
                                            @if ($candidat->statut == 2)
                                                <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="statut center-content">
                                            <a href="{{ route('afficher-cv', ['idCandidat' => $candidat->idCandidat]) }}"
                                                target="_blank">
                                                <img src="{{ asset('assets/images/icon/file.png') }}" alt="CV">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="statut center-content">
                                            <a href="{{ route('afficher-LM', ['idCandidat' => $candidat->idCandidat]) }}"
                                                target="_blank">
                                                <img src="{{ asset('assets/images/icon/file.png') }}" alt="LM">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="statut center-content">
                                            <a
                                                href="{{ route('ajout-collaborateur', ['idCandidat' => $candidat->idCandidat]) }}">
                                                <img src="{{ asset('assets/images/icon/add-candidat.png') }}"
                                                    alt="">
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
</body>

</html>
