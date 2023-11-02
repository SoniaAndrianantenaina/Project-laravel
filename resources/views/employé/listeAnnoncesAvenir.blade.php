@include('banner.headerEmployé')

<body>
    <main class="list-annonces">
        @include('banner.headerAnnoncesEmployé')
        <section class="annonces">
            <div class="list-content__blocks big" id="annonces-container">
                @foreach ($annonces as $annonce)
                    <div class="card-box">
                        <figure class="card-box__image">
                            @if (Str::startsWith($annonce->photo, 'public/'))
                                <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $annonce->photo)) }}"
                                    alt="Image 1">
                            @else
                                <img src="{{ asset($annonce->photo) }}" alt="Image 1">
                            @endif
                        </figure>

                        <div class="card-box__paragraph">
                            <div class="paragraph-title">
                                <h4 class="title-card">{{ $annonce->titre }}</h4>
                            </div>

                            <div class="paragraph-content">
                                <p class="paragraph-content__text">{{ $annonce->contenu }}</p> <br>
                                <p class="paragraph-content__text">
                                    Date début :
                                    {{ \Carbon\Carbon::parse($annonce->date_debut)->locale('fr_FR')->isoFormat('LL [à] LT') }}
                                </p>
                                <p class="paragraph-content__text">
                                    Date fin :
                                    {{ \Carbon\Carbon::parse($annonce->date_fin)->locale('fr_FR')->isoFormat('LL [à] LT') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

</body>
