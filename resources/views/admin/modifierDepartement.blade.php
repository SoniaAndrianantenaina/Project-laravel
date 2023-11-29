@section('title', 'Modifier département')
@include('banner.header')

<body class="bg-color-grey-1">

    <div style="display: flex;">
        <div class="edit-dept">
            <h2 class="edit-dept__title">Modifier département</h2>
            <form action="{{ route('valider-update-department') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="label-edit">Département :</label>
                    <div class="display-flex">
                        <input type="text" class="input-edit-modal" id="nomDepartement" name="nomDepartement"
                            value="{{ $departement->nom }}" required>
                        <div class="delete-button">
                            <a href="{{ route('delete-department', ['idDepartement' => $departement->idDepartement] ) }}" onclick="confirmDeleteDept(event)">
                                <img src="{{ asset('assets/images/icon/delete-blue.png') }}" alt="Supprimer">
                            </a>
                        </div>
                    </div>
                </div>
                <input type="submit" class="submit-form" value="Modifier">
            </form>
        </div>

        <div class="edit-dept">
            <h2 class="edit-dept__title">Modifier postes</h2>
            <form action="{{ route('valider-update-poste') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="d-flex" style="justify-content: space-between;">
                        <div>
                            <label class="label-edit">Postes :</label>
                        </div>

                        <div>
                            <a style="margin-right: 0;" onclick="showPostListModal()">
                                <img src="{{ asset('assets/images/icon/add.jpg') }}" alt=""
                                    style="margin-top:0;">
                            </a>
                        </div>
                    </div>

                    @foreach ($postes as $poste)
                        <div class="display-flex">
                            <input type="text" class="input-edit" name="nomPoste[]" value="{{ $poste->nom }}">
                            <input type="text" class="input-edit" name="salairePoste[]"
                                value="{{ $poste->salaire }}">
                            <input type="text" class="input-edit" name="degrePoste[]" value="{{ $poste->degre }}">
                            <div class="delete-button">
                                <a href="#"
                                    data-url-departement="{{ route('delete-departement-poste', ['idDepartement' => $departement->idDepartement, 'idPoste' => $poste->idPoste]) }}"
                                    data-url-poste="{{ route('delete-poste', ['idPoste' => $poste->idPoste]) }}"
                                    onclick="confirmDeletePoste(event)">
                                    <img src="{{ asset('assets/images/icon/delete-blue.png') }}" alt="Supprimer">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <input type="submit" class="submit-form" value="Modifier">
            </form>
        </div>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}'
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}'
            });
        @endif

        async function showPostListModal() {
            // Récupérer la liste des postes depuis le serveur
            const response = await fetch('/liste-postes');
            const postData = await response.json();

            // Construire le texte pour la modale
            var modalText = '<label for="poste-select">Sélectionnez un poste : </label>';
            modalText += '<select id="poste-select" class="select clair">';
            for (const postId in postData) {
                modalText += '<option value="' + postId + '">' + postData[postId] + '</option>';
            }
            modalText += '</select>';

            // Afficher la modale SweetAlert
            Swal.fire({
                title: 'Sélection de poste',
                html: modalText,
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ajouter',
                cancelButtonText: 'Annuler',
                focusConfirm: false,
                preConfirm: () => {
                    // Récupérer la valeur sélectionnée
                    const selectedPostId = document.getElementById('poste-select').value;

                    const url =
                        '{{ route('ajout-poste-departement', ['idDepartement' => $departement->idDepartement, 'idPoste' => ':idPoste']) }}';

                    // Remplacer :idPoste par la valeur sélectionnée
                    window.location.href = url.replace(':idPoste', selectedPostId);
                }
            });
        }
    </script>
</body>
