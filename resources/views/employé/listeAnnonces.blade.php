@include('banner.headerEmployé')

<body>
    <main class="list-annonces">
        <section class="banner-blue">
            <div class="boxNavAnnonces">
                <nav id="navigation-annonces">
                    <div class="content-nav-box">
                        <ul class="content-nav">
                            <li>
                                <a href="#" class="text-decoration">
                                    Annonces du jour
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-decoration">
                                    Annonces à venir
                                    <div class="white-trait"></div>
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

        <section class="annonces">
            <div class="div">

                <div class="list-content__blocks big">

                    <div class="card-box">
                        <figure class="card-box__image">
                            <img src="{{ asset('assets/images/annonces/image-annonce.jpg') }}" alt="">
                        </figure>

                        <div class="card-box__paragraph">
                            <div class="paragraph-title">
                                <h4 class="title-card">Lorem ipsum dolor sit amet </h4>
                            </div>

                            <div class="paragraph-content">
                                <p class="paragraph-content__text">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat reiciendis, ducimus tempora illum mollitia esse
                                    repudiandae similique Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore dolores nam harum temporibus
                                </p> <br>
                                <p class="paragraph-content__text">Date de parution prévue : 02/03/2023</p>
                                <p class="paragraph-content__text">Date début : 02/03/2023</p>
                                <p class="paragraph-content__text">Date fin : 02/03/2023</p>
                            </div>
                        </div>

                    </div>

                    <div class="card-box">
                        <figure class="card-box__image">
                            <img src="{{ asset('assets/images/annonces/image-annonce.jpg') }}" alt="">
                        </figure>

                        <div class="card-box__paragraph">
                            <div class="paragraph-title">
                                <h4 class="title-card">Lorem ipsum dolor sit amet </h4>
                            </div>

                            <div class="paragraph-content">
                                <p class="paragraph-content__text">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat reiciendis, ducimus tempora illum mollitia esse
                                    repudiandae similique Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore dolores nam harum temporibus
                                </p> <br>
                                <p class="paragraph-content__text">Date de parution prévue : 02/03/2023</p>
                                <p class="paragraph-content__text">Date fin : 02/03/2023</p>

                            </div>
                        </div>

                    </div>

                    <div class="card-box">
                        <figure class="card-box__image">
                            <img src="{{ asset('assets/images/annonces/image-annonce.jpg') }}" alt="">
                        </figure>

                        <div class="card-box__paragraph">
                            <div class="paragraph-title">
                                <h4 class="title-card">Lorem ipsum dolor sit amet </h4>
                            </div>

                            <div class="paragraph-content">
                                <p class="paragraph-content__text">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat reiciendis, ducimus tempora illum mollitia esse
                                    repudiandae similique Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore dolores nam harum temporibus
                                </p> <br>
                                <p class="paragraph-content__text">Date de parution prévue : 02/03/2023</p>
                                <p class="paragraph-content__text">Date fin : 02/03/2023</p>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

    </main>
</body>
