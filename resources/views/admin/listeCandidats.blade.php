@include('banner.header')

<body>
    <main class="liste-candidats">
        <section class="contenu">
            <div class="bg-color-grey">
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
                                        <span class="filter-span">Genre :</span>
                                        <select class="select white" name="" id="">
                                            <option value="">Homme</option>
                                            <option value="">Femme</option>
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
                                    <div>VALIDER</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                        </a>
                                        Andrianantenaina Sonia <br>
                                        Lot VR 52 Ter M Mahazoarivo
                                    </div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/file.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="{{ route('ajout-collaborateur') }}">
                                            <img src="{{ asset('assets/images/icon/add-candidat.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                        </a>
                                        Andrianantenaina Sonia <br>
                                        Lot VR 52 Ter M Mahazoarivo
                                    </div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/file.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/add-candidat.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                        </a>
                                        Andrianantenaina Sonia <br>
                                        Lot VR 52 Ter M Mahazoarivo
                                    </div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/file.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/add-candidat.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                        </a>
                                        Andrianantenaina Sonia <br>
                                        Lot VR 52 Ter M Mahazoarivo
                                    </div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/file.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/add-candidat.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                        </a>
                                        Andrianantenaina Sonia <br>
                                        Lot VR 52 Ter M Mahazoarivo
                                    </div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/file.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/add-candidat.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a href="">
                                            <img src="{{ asset('assets/images/collaborateur/user-profil.png') }}" alt="">
                                        </a>
                                        Andrianantenaina Sonia <br>
                                        Lot VR 52 Ter M Mahazoarivo
                                    </div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/cancel.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/file.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <a href="">
                                            <img src="{{ asset('assets/images/icon/add-candidat.png') }}" alt="">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>
</body>

</html>
