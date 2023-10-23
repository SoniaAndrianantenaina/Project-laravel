<div class="div-grey__profil">
    <div class="center-content">

        <div class="div-grey__pic">
            <figure class="div-grey__picture">
                <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}" alt="">
            </figure>
        </div>

        <div class="div-grey__infos">
            <div class="div-grey__infos__center">
                <div class="title-h6">
                    <h6>{{ $profil->prenom }}</h6>
                </div>

                <div class="title-h6">
                    <h6>{{ $profil->nom }}</h6>
                </div>

                <div class="title-h6 uppercase black">
                    <h6> {{$profil->deptposte->dept->nom}}</h6>
                </div>

                <div class="title-h6">
                    <h6>{{$profil->deptposte->poste->nom}}</h6>
                </div>
            </div>

        </div>
    </div>

    <div class="left-text">
        <div class="div-grey__infos__left">
            <div class="title-h6">
                <h6>Matricule : {{$profil->idEmploye}}</h6>
            </div>

            <div class="title-h6">
                <h6>0{{$profil->contact}}</h6>
            </div>

            <div class="trait-lg"></div>

            <div>
                <div class="title-h3-navy uppercase">
                    <h3>Contrat</h3>
                </div>

                <div class="title-h6">
                    <h6>Contrat : CDI</h6>
                </div>
            </div>

            <div class="trait-lg"></div>

            <div>
                <div class="title-h3-navy uppercase">
                    <h3>Manager</h3>
                </div>

                <div>
                    <div class="bck-data">
                        <div class="bck-data pic">
                            <figure class="bck-data__picture">
                                <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}"
                                    alt="">
                            </figure>
                        </div>

                        <div class="bck-data__text">
                            <div class="title-h6 black">
                                <h6>Henikaja Andriamahay</h6>
                            </div>

                            <div class="title-h6">
                                <h6>Team Leader Front End</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="trait-lg"></div>

            <div>
                <div class="title-h3-navy uppercase">
                    <h3>Relations directes</h3>
                </div>

                <div>
                    <div class="bck-data">
                        <div class="bck-data pic">
                            <figure class="bck-data__picture">
                                <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}"
                                    alt="">
                            </figure>
                        </div>

                        <div class="bck-data__text">
                            <div class="title-h6 black">
                                <h6>Andrianantenaina Sonia</h6>
                            </div>

                            <div class="title-h6">
                                <h6>Intégrateur Junior</h6>
                            </div>
                        </div>
                    </div>

                    <div class="bck-data">
                        <div class="bck-data pic">
                            <figure class="bck-data__picture">
                                <img src="{{ asset('assets/images/collaborateur/profil.jpg') }}"
                                    alt="">
                            </figure>
                        </div>

                        <div class="bck-data__text">
                            <div class="title-h6 black">
                                <h6>Andrianantenaina Sonia</h6>
                            </div>

                            <div class="title-h6">
                                <h6>Intégrateur Junior</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 5vh"></div>

</div>
