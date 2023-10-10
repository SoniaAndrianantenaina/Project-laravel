@include('banner.header')

<main class="ajout-département">

    <div class="wrapper-crate">
        <div class="crate">
            <div class="crate-title">
                <h2>Nouveau département</h2>
            </div>
            <div class="crate-body">
                <label for="">
                    <span>Nom : </span>
                    <input type="text" class="btn-blue clair small">
                </label>

                <div class="mt-15 checkbox-container">
                    <div class="crate-width">
                        <label for="postes">Postes : </label>
                    </div>

                    <div>
                        <input type="checkbox" name="postes" id="postes1"><label for="postes1">Hello</label>
                        <input type="checkbox" name="postes" id="postes2"><label for="postes2">Hello</label>
                        <input type="checkbox" name="postes" id="postes3"><label for="postes3">Hello</label>
                        <input type="checkbox" name="postes" id="postes4"><label for="postes4">Hello</label>
                        <input type="checkbox" name="postes" id="postes5"><label for="postes5">Hello</label>
                        <input type="checkbox" name="postes" id="postes6"><label for="postes6">Hello</label>
                    </div>

                </div>
            </div>
            <div class="boutons">
                <div class="btn btn-filtre bleu-clair">
                    <a href="" class="btn__middle-btn">AJOUTER</a>
                </div>
            </div>
        </div>

        <div class="crate">
            <div class="crate-title">
                <h2>Nouveau poste</h2>
            </div>
            <div class="crate-body">
                <label for="">
                    <span>Nom : </span>
                    <input type="text" class="btn-blue clair small">
                </label>

                <div class="mt-15 checkbox-container">
                    <div class="crate-width-1">
                        <label for="postes">Départements : </label>
                    </div>
                    <div>
                        <input type="checkbox" name="postes" id="postes1"><label for="postes1">Hello</label>
                        <input type="checkbox" name="postes" id="postes2"><label for="postes2">Hello</label>
                        <input type="checkbox" name="postes" id="postes3"><label for="postes3">Hello</label>
                        <input type="checkbox" name="postes" id="postes4"><label for="postes4">Hello</label>
                        <input type="checkbox" name="postes" id="postes5"><label for="postes5">Hello</label>
                        <input type="checkbox" name="postes" id="postes6"><label for="postes6">Hello</label>
                    </div>
                </div>
                <label for="">
                    <span>Degré : </span>
                    <input type="number" class="btn-blue clair small">
                </label>
            </div>

            <div class="boutons">
                <div class="btn btn-filtre bleu-clair">
                    <a href="" class="btn__middle-btn">AJOUTER</a>
                </div>
            </div>
        </div>

    </div>

</main>
