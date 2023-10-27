@include('banner.headerEmployé')
@include('banner.headerBlue')

<main>
    <section class="liste-demande-conge">
        <div class="div-grey">
            @include('employé.profil.profil-infos')
            <div class="request-list">

                <div class="title-h4 light-grey">
                    <h4>Mes demandes</h4>
                </div>

                <div class="white-trait-lg"></div>

                <div class="request-list box">
                    <div class="request-list box__color">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title">
                                <h4>Solde réel sur congé payé</h4>
                            </div>
                            <div class="request-list box__content__text">
                                <h6>{{ $soldes['solde_reel'] }}</h6>
                                <p>Jours</p>
                            </div>
                        </div>
                    </div>

                    <div class="request-list box__color">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title">
                                <h4>Solde prévisionnel sur congé payé</h4>
                            </div>
                            <div class="request-list box__content__text">
                                <h6>{{ $soldes['solde_previsionnel'] }}</h6>
                                <p>Jours</p>
                            </div>
                        </div>
                    </div>

                    <div class="request-list box__color">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title">
                                <h4>Permissions consommées</h4>
                            </div>
                            <div class="request-list box__content__text">
                                <h6>{{ $permconsommée }} / 10</h6>
                                <p>Jours</p>
                            </div>
                        </div>
                    </div>

                    <div class="request-list box__color navy">
                        <div class="request-list box__content">
                            <div class="request-list box__content__title white">
                                <h4>Congés à planifier avant 31/12/2023</h4>
                            </div>
                            <div>
                                <h6 class="white">{{ $soldes['a_planifier'] }}</h6>
                                <p class="p-text-white">Jours</p>
                            </div>
                        </div>
                    </div>
                </div>


                <table class="white-table">
                    <thead>
                        <tr>
                            <th>
                                <div>Référence</div>
                            </th>
                            <th>
                                <div>Date de la demande</div>
                            </th>
                            <th>
                                <div>Type d'absence</div>
                            </th>
                            <th>
                                <div>Motif d'absence</div>
                            </th>
                            <th>
                                <div>Date début</div>
                            </th>
                            <th>
                                <div>Date fin</div>
                            </th>
                            <th>
                                <div>Durée absence</div>
                            </th>
                            <th>
                                <div>Etat</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mesDemandesCongé as $demande)
                            <tr>
                                <td>
                                    <div>REF0{{$demande->idDemandeConge}}</div>
                                </td>
                                <td>
                                    <div>{{$demande->date_demande}}</div>
                                </td>
                                <td>
                                    <div>{{$demande->typeconge->nom}}</div>
                                </td>
                                <td>
                                    @if ($demande->motifperm)
                                        <div>{{$demande->motifperm->motif}}</div>
                                        @else
                                        <div> - </div>
                                    @endif
                                </td>
                                <td>
                                    <div>{{$demande->date_debut}}</div>
                                </td>
                                <td>
                                    <div>{{$demande->date_fin}}</div>
                                </td>
                                <td>
                                    <div>{{ $nbjour[$loop->index] }} j</div>
                                </td>
                                <td>
                                    @if ($demande->etat == 1)
                                        <div class="color-green">Validée</div>
                                        @elseif ($demande->etat == 2)
                                        <div class="color-red">Refusée</div>
                                        @else
                                        <div class="color-yellow">En attente</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="date-right">
            @php
                echo $dateDuJour;
            @endphp
        </div>
    </section>
</main>
