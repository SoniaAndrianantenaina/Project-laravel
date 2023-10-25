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
                        <div class="div-grey__request__data">
                            <div>
                                <p class="div-grey__request__data__span">Date début : </p>
                            </div>

                            <div>
                                <input class="div-grey__request__data__input" type="date">
                            </div>
                        </div>

                        <div class="div-grey__request__data">
                            <div>
                                <p class="div-grey__request__data__span">Date fin : </p>
                            </div>

                            <div>
                                <input class="div-grey__request__data__input" type="date">
                            </div>
                        </div>

                        <div class="div-grey__request__data">
                            <div>
                                <label class="div-grey__request__data__span">Type congé :</label>
                            </div>

                            <div>
                                <select class="div-grey__request__data__input blue" name="" id="">
                                    <option value="">Congés payés</option>
                                    <option value="">Permissions exceptionnelles</option>
                                </select>
                            </div>
                        </div>

                        <div class="div-grey__request__data">
                            <div>
                                <label class="div-grey__request__data__span">Motif congé :</label>
                            </div>

                            <div class="ml">
                                <select class="div-grey__request__data__input blue" name="" id="">
                                    <option value="">Mariage</option>
                                    <option value="">Décès</option>
                                </select>
                            </div>
                        </div>


                        <div class="boutons modify-top">
                            <div class="btn bleu-foncé">
                                <a href="" class="btn__middle-btn fs-17">SOUMETTRE</a>
                            </div>

                            <div class="btn bleu-clair">
                                <a href="" class="btn__middle-btn fs-17">ANNULER</a>
                            </div>
                        </div>

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

</main>
