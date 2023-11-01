@include('banner.header')

<body>
    <div>
        <div class="edit-dept">
            <h2 class="edit-dept__title">Modifier departement et poste</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label class="label-edit">Département :</label>
                    <input type="text" class="input-edit" id="nomDepartement" name="nomDepartement"
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const posteInputs = document.querySelectorAll('.input-edit');
        const posteModal = document.getElementById('posteModal');
        const modalClose = document.getElementById('modalClose');
        const posteInput = document.getElementById('posteInput');
        const salaireInput = document.getElementById('salaireInput');
        const modifierButton = document.getElementById('modifierPoste');

        posteInputs.forEach(input => {
            input.addEventListener('focus', function() {
                const nom = input.value;
                const salaire = input.getAttribute('data-salaire');
                posteInput.value = nom;
                salaireInput.value = salaire;
                posteModal.style.display = 'block';
            });
        });

        modalClose.addEventListener('click', function() {
            posteModal.style.display = 'none';
        });

        modifierButton.addEventListener('click', function() {
            const nom = posteInput.value;
            const salaire = salaireInput.value;
            // Mettez en œuvre la logique de mise à jour des données ici
            console.log('Poste modifié :', nom);
            console.log('Nouveau salaire :', salaire);
            posteModal.style.display = 'none';
        });
    </script>

</body>

</html>
