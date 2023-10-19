@include('banner.header')

<main class="ajout-annonce">
    <div class="border-center">

        <div class="border-center__navy-blue">
            <div class="border-center__title">
                <h2>MODIFIER CONTENU</h2>
            </div>

            <div class="border-center__contenu">
                <form action="{{ route('valider-modif-annonce') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="content">
                        <div>
                            <figure class="left-image">
                                @if (Str::startsWith($annonce->photo, 'public/'))
                                    <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $annonce->photo)) }}"
                                        alt="Image 1">
                                @else
                                    <img src="{{ asset($annonce->photo) }}" alt="Image 1">
                                @endif
                            </figure>
                        </div>

                        <div class="p-bottom">
                            <label for="file" class="label-file">Modifier l'image</label>
                            <input type="file" id="file" class="input-file" name="file">
                        </div>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Titre :</span>
                            <input type="text" class="btn-blue small" name="titre" value="{{ $annonce->titre }}">
                        </label>
                    </div>

                    <div class="formulaire-collab__content">
                        <label for="">
                            <span class="navy-span">Contenu :</span>
                            <div>
                                <textarea class="small-text" name="contenu" id="" cols="45" rows="10">{{ $annonce->contenu }}</textarea>
                            </div>
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Date parution :</span>
                            <input type="datetime-local" class="btn-blue small" name="date_parution"
                                value="{{ \Carbon\Carbon::parse($annonce->date_parution)->format('Y-m-d\TH:i') }}">
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Date début :</span>
                            <input type="datetime-local" class="btn-blue small" name="date_debut"
                                value="{{ \Carbon\Carbon::parse($annonce->date_debut)->format('Y-m-d\TH:i') }}">
                        </label>
                    </div>

                    <div class="content">
                        <label for="">
                            <span class="navy-span">Date fin :</span>
                            <input type="datetime-local" class="btn-blue small" name="date_fin"
                                value="{{ \Carbon\Carbon::parse($annonce->date_fin)->format('Y-m-d\TH:i') }}">
                        </label>
                    </div>


                    <div class="boutons modify-top">
                        <div>
                            <button type="submit" class="btn bleu-clair">MODIFIER</button>
                        </div>

                        <div class="btn bleu-foncé">
                            <a href="{{ route('annonces-du-jour') }}" class="btn__middle-btn">ANNULER</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</main>
