<section class="banner-blue">
    <div class="container">
        <div class="boxNavAnnonces">
            <nav id="navigation-annonces">
                <div class="content-nav-box left-modified">
                    <ul class="content-nav">
                        <li class="@if(Request::is('solde-conge')) current @endif">
                            <a href="{{ route('solde-conge') }}" class="text-decoration">
                                SOLDE
                            </a>
                        </li>
                        <li class="@if(Request::is('liste-demande-conge')) current @endif">
                            <a href="{{ route('liste-demande-conge') }}" class="text-decoration">
                                DEMANDES
                            </a>
                        </li>
                    </ul>

                    <div class="create-request">
                        <div class="create-request__text">
                            <a href="{{ route('demander-congé') }}">
                                <p>+ Créer une demande</p>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>

