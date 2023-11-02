@include('banner.header')

<body>
    <div>
        <div class="edit-dept">
            <h2 class="edit-dept__title">Modifier departement et poste</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label class="label-edit">Département :</label>
                    <input type="text" class="input-edit-modal" id="nomDepartement" name="nomDepartement"
                        value="{{ $departement->nom }}" required>
                </div>
                <div class="form-group">
                    <label class="label-edit">Postes :</label>
                    @foreach ($postes as $poste)
                        <input type="email" class="input-edit" data-nom="{{ $poste->nom }}"
                            data-salaire="{{ $poste->salaire }}" value="{{ $poste->nom }}" required
                            autocomplete="off">
                    @endforeach
                </div>

                <div class="modal" id="posteModal">
                    <div class="modal-content">
                        <span class="close" id="modalClose">&times;</span>
                        <label class="label-edit" for="posteInput">Poste :</label>
                        <input type="text" class="input-edit-modal" id="posteInput" name="posteInput">
                        <label class="label-edit" for="salaireInput">Salaire :</label>
                        <input type="text" class="input-edit-modal" id="salaireInput" name="salaireInput">
                        <button class="modal-button" id="modifierPoste">Modifier</button>
                    </div>
                </div>

                <input type="submit" class="submit-form" value="Envoyer">
            </form>
        </div>
    </div>


    <script>
        modifyDeptPoste();
    </script>

</body>

</html>
