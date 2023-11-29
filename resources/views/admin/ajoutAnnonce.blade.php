@section('title', 'Ajout annonce')
@include('banner.header')

<main class="ajout-annonce">
    <div class="border-center">

        <div class="border-center__navy-blue">
            <div class="border-center__title">
                <h2>AJOUTER CONTENU</h2>
            </div>

            <div class="border-center__contenu">
                <form action="{{ route('valider-ajout-annonce') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="content">
                        <label for="">
                            <span class="navy-span">Photo :</span>
                            <input type="file" class="btn-blue small" name="photo">
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Titre :</span>
                            <input type="text" class="btn-blue small" name="titre">
                        </label>
                    </div>

                    <div class="formulaire-collab__content">
                        <label for="contenu">
                            <span class="navy-span">Contenu :</span>
                            <div>
                                <textarea class="small-text" name="contenu" id="contenu" cols="45" rows="10"></textarea>
                            </div>
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Date parution :</span>
                            <input type="datetime-local" class="btn-blue small" name="date_parution">
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Date début :</span>
                            <input type="datetime-local" class="btn-blue small" name="date_debut">
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Date fin :</span>
                            <input type="datetime-local" class="btn-blue small" name="date_fin">
                        </label>
                    </div>


                    <div class="boutons modify-top">
                        <div>
                            <button type="submit" class="btn bleu-clair">AJOUTER</button>
                        </div>
                </form>
                <div class="btn bleu-foncé">
                    <a href="{{ route('annonces-du-jour') }}" class="btn__middle-btn">ANNULER</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('annonces-du-jour') }}';
                }
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}'
            });
        @endif
    </script>
</main>
