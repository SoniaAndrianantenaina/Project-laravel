@section('title', 'Ajout département et poste')
@include('banner.header')

<body class="bg-color-grey-1">

    <div style="display: flex;">
        <div class="edit-dept">
            <h2 class="edit-dept__title">Ajouter département</h2>
            <form action="{{ route('add-dept-poste') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="label-edit">Département :</label>
                    <div class="display-flex">
                        <input type="text" class="input-edit-modal" id="nomDepartement" name="nomDepartement"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex" style="justify-content: space-between;">
                        <label class="label-edit">Poste :</label>

                        <a style="margin-right: 0;" onclick="addSelect()">
                            <img src="{{ asset('assets/images/icon/add.jpg') }}" alt="" >
                        </a>
                    </div>


                    <div id="select-container">
                        <div>
                            <select class="select white clair" name="poste[]" id="poste1">
                                @foreach ($postes as $poste)
                                    <option value="{{ $poste->idPoste }}">{{ $poste->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <input type="submit" class="submit-form" value="Ajouter">
            </form>
        </div>

        <div class="edit-dept">
            <h2 class="edit-dept__title">Ajouter poste</h2>
            <form action="{{ route('add-dept-poste') }}" method="post">
                @csrf
                <div class="form-group">
                    <div>
                        <label class="label-edit">Poste :</label>
                        <input type="text" class="input-edit" name="nomPoste" value="">
                    </div>

                    <div>
                        <label class="label-edit">Salaire :</label>
                        <input type="text" class="input-edit" name="salairePoste" value="">
                    </div>

                    <div>
                        <label class="label-edit">Poste :</label>
                        <input type="text" class="input-edit" name="degrePoste" value="">
                    </div>

                </div>

                <input type="submit" class="submit-form" value="Ajouter">
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

        let selectCount = 1;

        function addSelect() {
            selectCount++;

            // Créer un nouvel élément select
            const newSelect = document.createElement('select');
            newSelect.classList.add('select', 'white', 'clair');
            newSelect.name = 'poste[]';
            newSelect.id = 'poste' + selectCount;

            // Copier les options du premier select
            const originalSelect = document.getElementById('poste1');
            for (const option of originalSelect.options) {
                const newOption = document.createElement('option');
                newOption.value = option.value;
                newOption.text = option.text;
                newSelect.add(newOption);
            }

            // Ajouter le nouveau select au DOM
            document.getElementById('select-container').appendChild(newSelect);
        }
    </script>
</body>
