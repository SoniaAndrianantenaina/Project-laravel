@section('title', 'Accueil-admin')
@include('banner.header')
<main class='page-accueil'>

    <section class='block-accueil'>

        <figure class='block-accueil__bg-img'>
            <img src='{{ asset('assets/images/accueil/accueil.jpg') }}' alt=''>
        </figure>

        <div class='block-ajoutCol__paragraphe'>
            <div class='block-ajoutCol__text'>
                <h2 class='block-ajoutCol subtitle-collab'>Ressources humaines</h2>
                <h3 class='block-ajoutCol cause-collab'>
                    Au sein d'une entreprise la gestion des Ressources humaines couvre de multiples aspects tous très
                    importants pour le bon
                    fonctionnement de la société.
                </h3>
            </div>
        </div>

    </section>

    <section class='block-annonces'>

        <div class='block-annonces__item'>
            <div class='block-annonces__item__title'>
                <h2 class='title-h2'>
                    ANNONCES
                </h2>
                <div class="trait"></div>
            </div>
            
            <p style="color: #1859A3; margin-bottom:10px;">Du jour : </p>
            <div class="list-content__blocks big" style="padding: 0;">
                @foreach ($annonceDuJour as $annonce)
                    <div class="card-box">
                        <figure class="card-box__image">
                            @if (Str::startsWith($annonce->photo, 'public/'))
                                <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $annonce->photo)) }}"
                                    alt="Image 1" loading="lazy">
                            @else
                                <img src="{{ asset($annonce->photo) }}" alt="Image 1" loading="lazy">
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

            <div style="margin-bottom: 45px"></div>

            <p style="color: #1859A3; margin-bottom:10px;">A venir : </p>
            <div class="list-content__blocks big" style="padding: 0;">
                @foreach ($annoncesAvenir as $annonce)
                    <div class="card-box">
                        <figure class="card-box__image">
                            @if (Str::startsWith($annonce->photo, 'public/'))
                                <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $annonce->photo)) }}"
                                    alt="Image 1" loading="lazy">
                            @else
                                <img src="{{ asset($annonce->photo) }}" alt="Image 1" loading="lazy">
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

                <a href="{{ route('annonces-du-jour') }}" class="bouton-annonces">
                    Voir tout
                </a>
            </div>
            
        </div>
    </section>

    <section class="statistiques">
        <div class='block-annonces__item__title'>
            <a class="text-decoration" style="color: #1859A3;" href="{{ route('statistiques') }}">
                <h2 class='title-h2'>
                    STATISTIQUES
                </h2>
            </a>

            <div class="trait"></div>
        </div>
    </section>

</main>
