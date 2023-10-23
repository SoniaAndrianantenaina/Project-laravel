<section class="banner-blue">
    <div class="boxNavAnnonces">
        <nav id="navigation-annonces">
            <div class="content-nav-box">
                <ul class="content-nav">
                    <li class="@if (Request::is('annonces-du-jour', 'annonces-du-jour-employé')) current @endif">
                        @if (auth()->guard('web')->check())
                            <a href="{{ route('annonces-du-jour') }}" id="dayAnnouncement" class="text-decoration">
                                Annonces du jour
                            </a>
                            @else
                            <a href="{{ route('annonces-du-jour-employé') }}" id="dayAnnouncement" class="text-decoration">
                                Annonces du jour
                            </a>
                        @endif
                    </li>

                    <li class="@if (Request::is('annonces-à-venir', 'annonces-à-venir-employé')) current @endif">
                        @if (auth()->guard('web')->check())
                            <a href="{{ route('annonces-à-venir') }}" id="dayAnnouncement" class="text-decoration">
                                Annonces du jour
                            </a>
                            @else
                            <a href="{{ route('annonces-à-venir-employé') }}" id="dayAnnouncement" class="text-decoration">
                                Annonces du jour
                            </a>
                        @endif

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
