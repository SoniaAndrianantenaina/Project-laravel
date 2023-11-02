<section class="banner-blue">
    <div class="boxNavAnnonces">
        <nav id="navigation-annonces">
            <div class="content-nav-box">
                <ul class="content-nav">
                    <li class="@if (Request::is('annonces-du-jour', 'annonces-du-jour-employé')) current @endif">
                        <a href="{{ route('annonces-du-jour') }}" id="dayAnnouncement" class="text-decoration">
                            Annonces du jour
                        </a>
                    </li>

                    <li class="@if (Request::is('annonces-à-venir', 'annonces-à-venir-employé')) current @endif">
                        <a href="{{ route('annonces-à-venir') }}" id="dayAnnouncement" class="text-decoration">
                            Annonces à venir
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ajout-annonce') }}" class="text-decoration">
                            Ajouter une annonce
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
