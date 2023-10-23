<section class="banner-blue">
    <div class="boxNavAnnonces">
        <nav id="navigation-annonces">
            <div class="content-nav-box">
                <ul class="content-nav">
                    <li class="@if (Request::is('annonces-du-jour')) current @endif">
                        <a href="{{ route('annonces-du-jour') }}" id="dayAnnouncement" class="text-decoration">
                            Annonces du jour
                        </a>
                    </li>
                    <li class="@if (Request::is('annonces-à-venir')) current @endif">
                        <a href="{{ route('annonces-à-venir') }}" id="upcomingAnnouncement" class="text-decoration">
                            Annonces à venir
                        </a>
                    </li>
                    <li>
                        @if (auth()->guard('web')->check())
                            <a href="{{ route('ajout-annonce') }}" class="text-decoration">
                                Ajouter une annonce
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
