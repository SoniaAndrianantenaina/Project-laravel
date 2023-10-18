@include('banner.header')

<body>
    <main class="list-annonces">
        @include('banner.headerAnnonces')
        <section class="annonces">
            <div class="list-content__blocks big" id="annonces-container">
                @foreach ($annonces as $annonce)
                    <div class="card-box">
                        <figure class="card-box__image">
                            <img src="{{ asset($annonce->photo) }}" alt="">
                        </figure>

                        <div class="card-box__paragraph">
                            <div class="paragraph-title">
                                <h4 class="title-card">{{ $annonce->titre }}</h4>
                            </div>

                            <div class="paragraph-content">
                                <p class="paragraph-content__text">{{ $annonce->contenu }}</p> <br>
                                <p class="paragraph-content__text">Date de parution prévue :
                                    {{ $annonce->date_parution }}</p>
                                <p class="paragraph-content__text">Date début : {{ $annonce->date_debut }}</p>
                                <p class="paragraph-content__text">Date fin : {{ $annonce->date_fin }}</p>
                            </div>
                        </div>

                        <div class="boutons modify-top-1">
                            <div class="btn tiny-btn bleu-clair">
                                <a href="{{ route('modifier-annonce', ['id' => $annonce->id]) }}"
                                    class="btn__middle-btn">MODIFIER</a>
                            </div>

                            <div class="btn tiny-btn bleu-foncé">
                                <a href="{{ route('supprimer-annonce', ['idAnnonce' => $annonce->idAnnonce]) }}"
                                    class="btn__middle-btn">SUPPRIMER</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
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
    </script>
</body>
