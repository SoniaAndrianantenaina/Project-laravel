@include('banner.header')

<main class="ajout-annonce">
    <div class="border-center">

        <div class="border-center__navy-blue">
            <div class="border-center__title">
                <h2>MODIFIER CONTENU</h2>
            </div>

            <div class="border-center__contenu">

                <div class="content">
                    <div class="test">
                        <div>
                            <figure class="left-image">
                                <img src="{{ asset('assets/images/annonces/image-annonce.jpg') }}" alt="">
                            </figure>

                        </div>

                        <div class="p-bottom">
                            <label for="file" class="label-file">Modifier l'image</label>
                            <input id="file" class="input-file" type="file">
                        </div>

                    </div>

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
                        <span class="navy-span">Date parution :</span>
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
                        <a href="" class="btn__middle-btn">MODIFIER</a>
                    </div>

                    <div class="btn bleu-foncé">
                        <a href="" class="btn__middle-btn">ANNULER</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
