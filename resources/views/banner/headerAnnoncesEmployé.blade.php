<section class="banner-blue">
    <div class="boxNavAnnonces">
        <nav id="navigation-annonces">
            <div class="content-nav-box">
                <ul class="content-nav">
                    <li class="@if (Request::is('annonces-du-jour-employé')) current @endif">
                        <a href="{{ route('annonces-du-jour-employé') }}" id="dayAnnouncement" class="text-decoration">
                            Annonces du jour
                        </a>
                    </li>
                    <li class="@if (Request::is('annonces-à-venir-employé')) current @endif">
                        <a href="{{ route('annonces-à-venir-employé') }}" id="upcomingAnnouncement" class="text-decoration">
                            Annonces à venir
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
