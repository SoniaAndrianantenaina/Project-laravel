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
                                <div class="btn bleu-foncé">
                                    <a href="" class="btn__middle-btn">EFFACER</a>
                                </div>

                                <div class="btn bleu-clair">
                                    <a href="" class="btn__middle-btn">FILTRER</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- table --}}
                    <div class="head-table">
                        <div class="left-head">
                            <span>18</span>
                            consultations en cours
                        </div>
                        <div class="right-head">
                            <a class="print" target="_blank" href="">
                                <i class="icon-print"></i>Imprimer cette page
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div>Communauté de Communes Combrailles, Sioule et Morge</div>
                                </td>
                                <td>
                                    <div>Design Agency</div>
                                </td>
                                <td>
                                    <div>Développeur</div>
                                </td>
                                <td>
                                    <div class="statut center-content">
                                        <img src="{{asset('assets/images/icon/cancel.png')}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div>Référence : P2306-AOO-DSI<br>Type de procédure : Appel d'offres ouvert</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Mairie de Châteauneuf-les-Bains</div>
                                </td>
                                <td>
                                    <div>Création d'une salle de repos aux Thermes de Châteauneuf-Les-Bains</div>
                                </td>
                                <td>
                                    <div>Travaux</div>
                                </td>
                                <td>
                                    <div>15/05/2023<br>12:00</div>
                                </td>
                                <td>
                                    <div>Référence : 2023 Voirie<br>Type de procédure : procédure adaptée à une
                                        enveloppe
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Mairie de Saint-Pierre-Châtel</div>
                                </td>
                                <td>
                                    <div>Travaux d'assainissement - le Bourg - Bonnabaud - Roure</div>
                                </td>
                                <td>
                                    <div>Travaux</div>
                                </td>
                                <td>
                                    <div>15/05/2023<br>12:00</div>
                                </td>
                                <td>
                                    <div>Référence : 2023 Voirie<br>Type de procédure : procédure adaptée à une
                                        enveloppe
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Communauté de Communes Combrailles, Sioule et Morge</div>
                                </td>
                                <td>
                                    <div>Marché de maîtrise d'oeuvre pour la construction d'un bâtiment d'accueil,
                                        d'information et à usage de refuge au lieu-dit Chancelade</div>
                                </td>
                                <td>
                                    <div>Fournitures</div>
                                </td>
                                <td>
                                    <div>11/05/2023<br>23:59</div>
                                </td>
                                <td>
                                    <div>Référence : P2306-AOO-DSI<br>Type de procédure : Appel d'offres ouvert</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Mairie de Châteauneuf-les-Bains</div>
                                </td>
                                <td>
                                    <div>Création d'une salle de repos aux Thermes de Châteauneuf-Les-Bains</div>
                                </td>
                                <td>
                                    <div>Travaux</div>
                                </td>
                                <td>
                                    <div>15/05/2023<br>12:00</div>
                                </td>
                                <td>
                                    <div>Référence : 2023 Voirie<br>Type de procédure : procédure adaptée à une
                                        enveloppe
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div>Mairie de Saint-Pierre-Châtel</div>
                                </td>
                                <td>
                                    <div>Travaux d'assainissement - le Bourg - Bonnabaud - Roure</div>
                                </td>
                                <td>
                                    <div>Travaux</div>
                                </td>
                                <td>
                                    <div>15/05/2023<br>12:00</div>
                                </td>
                                <td>
                                    <div>Référence : 2023 Voirie<br>Type de procédure : procédure adaptée à une
                                        enveloppe
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
