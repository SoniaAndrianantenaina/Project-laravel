@section('title', 'Modifier profil candidat')
@include('banner.header')

<main class="profil-candidat">
    <div class="bg-color-grey">
        <form action="{{ route('valider-modif-candidat') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container display">
                <div class="block-profil">
                    <figure class="block-profil__image">
                        @if (Str::startsWith($candidat->photo, 'public/'))
                            <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $candidat->photo)) }}"
                                alt="Image 1">
                        @else
                            <img src="{{ asset($candidat->photo) }}" alt="Image 1">
                        @endif
                    </figure>
                </div>

                <div class="p-bottom" style="margin-left:-170px;">
                    <label for="file" class="label-file">Modifier l'image</label>
                    <input type="file" id="file" class="input-file" name="file">
                </div>

                <div style="margin-left: 45px;">
                    <div class="block-profil__informations">
                        <div class="block-profil__informations__texte">
                            <div class="info request">Nom :</div>
                            <input type="text" class="btn-blue clair" name="nom" value="{{ $candidat->nom }}"
                                style="margin-top: -12px;width: 275px;height: 15px;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Prénoms :</div>
                            <input type="text" class="btn-blue clair" name="prenom" value="{{ $candidat->prenom }}"
                                style="margin-top: -12px;width: 275px;height: 15px;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">CV :</div>
                            <input type="file" id="file" class="input-file" name="CV" style="display:block; font-size:17px;color:#70A8E7;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Lettre de motivation :</div>
                            <input type="file" id="file" class="input-file" name="LM" style="display:block; font-size:17px;color:#70A8E7;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Genre :</div>
                            <select name="idGenre" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                @foreach ($genre as $g)
                                    <option value="{{ $g->idGenre }}">{{ $g->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Date de naissance :</div>
                            <input type="date" value="{{ $candidat->datenaissance }}" class="btn-blue clair"
                                name="datenaissance" style="margin-top: -12px;width: 275px;height: 15px;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Contact :</div>
                            <div class="info response">+261 <input type="number" value="{{ $candidat->contact }}"
                                    class="btn-blue clair" name="contact"
                                    style="margin-top: -12px;width: 275px;height: 15px;">
                            </div>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Adresse :</div>
                            <input type="text" value="{{ $candidat->adresse }}" class="btn-blue clair" name="adresse"
                                style="margin-top: -12px;width: 275px;height: 15px;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Email :</div>
                            <input type="text" value="{{ $candidat->email }}" class="btn-blue clair" name="email"
                                style="margin-top: -12px;width: 275px;height: 15px;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Statut marital :</div>
                            <select name="idStatutMarital" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                @foreach ($statut as $g)
                                    <option value="{{ $g->idStatutMarital }}">{{ $g->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Nombre enfants :</div>
                            <input type="text" value="{{ $candidat->nb_enfants }}" class="btn-blue clair"
                                name="nbre_enfants" style="margin-top: -12px;width: 275px;height: 15px;">
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Type Contrat :</div>
                            <select name="idTypeContrat" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                @foreach ($typecontrat as $tc)
                                    <option value="{{ $tc->idTypeContrat }}">{{ $tc->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Département :</div>
                            <select name="idDept" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                @foreach ($dept as $g)
                                    <option value="{{ $g->idDepartement }}">{{ $g->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Poste :</div>
                            <select name="idPoste" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                @foreach ($poste as $g)
                                    <option value="{{ $g->idPoste }}">{{ $g->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Statut :</div>
                            <select name="statut" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                <option value="0">En cours</option>
                                <option value="1">Confirmé</option>
                                <option value="2">Refusé</option>

                            </select>
                        </div>

                        <div class="block-profil__informations__texte">
                            <div class="info request">Statut :</div>
                            <select name="statut" id="" class="select"
                                style="width: 250px;height: 45px;margin-top: -15px;border: 1px solid #70A8E7;">
                                <option value="0" {{ $candidat->statut == 0 ? 'selected' : '' }}>En cours
                                </option>
                                <option value="1" {{ $candidat->statut == 1 ? 'selected' : '' }}>Confirmé
                                </option>
                                <option value="2" {{ $candidat->statut == 2 ? 'selected' : '' }}>Refusé</option>
                            </select>
                        </div>


                    </div>

                </div>
            </div>

            <div class="boutons modify-height">

                <div>
                    <button type="submit" class="btn bleu-clair">MODIFIER</button>
                </div>

                <div class="btn bleu-foncé">
                    <a href="{{ route('liste-candidats') }}" class="btn__middle-btn">ANNULER</a>
                </div>
            </div>
        </form>

    </div>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('liste-candidats') }}';
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
