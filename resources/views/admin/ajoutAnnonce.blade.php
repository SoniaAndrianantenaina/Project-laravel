@include('banner.header')

<main class="ajout-annonce">
    <div class="border-center">

        <div class="border-center__navy-blue">
            <div class="border-center__title">
                <h2>AJOUTER CONTENU</h2>
            </div>

            <div class="border-center__contenu">
                <div class="content">
                    <label for="">
                        <span class="navy-span">Photo :</span>
                        <input type="file" class="btn-blue small">
                    </label>
                </div>

                <div class="content">
                    <label for="">
                        <span class="navy-span">Titre :</span>
                        <input type="file" class="btn-blue small">
                    </label>
                </div>

                <div class="formulaire-collab__content">
                    <label for="">
                        <span class="navy-span">Contenu :</span>
                        <div>
                            <textarea class="small-text" name="" id="" cols="45" rows="10"></textarea>
                        </div>
                    </label>
                </div>

                <div class="content">
                    <label for="">
                        <span class="navy-span">Date de parution prévue :</span>
                        <input type="datetime-local" class="btn-blue small">
                    </label>
                </div>

                <div class="content">
                    <label for="">
                        <span class="navy-span">Date fin :</span>
                        <input type="datetime-local" class="btn-blue small">
                    </label>
                </div>

                <div class="boutons modify-top">
                    <div class="btn bleu-clair">
                        <a href="" class="btn__middle-btn">AJOUTER</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
