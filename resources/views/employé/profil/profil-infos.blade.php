<div class="div-grey__profil">
    <div class="center-content">

        <div>
            <figure class="div-grey__picture">
                @if (Str::startsWith($profil->photo, 'public/'))
                    <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $profil->photo)) }}" alt="Image 1">
                @else
                    <img src="{{ asset($profil->photo) }}" alt="Image 1">
                @endif
            </figure>
        </div>

        <div class="div-grey__infos">
            <div class="div-grey__infos__center">
                <h6>{{ $profil->prenom }}</h6>
                <h6>{{ $profil->nom }}</h6>
                <h6 class="uppercase black"> {{ $profil->deptposte->dept->nom }}</h6>
                <h6>{{ $profil->deptposte->poste->nom }}</h6>
            </div>
        </div>
    </div>

    <div class="left-text">
        <div class="div-grey__infos__left">
            <h6>Matricule : 00{{ $profil->idEmploye }}</h6>
            <h6>0{{ $profil->contact }}</h6>

            <div class="trait-lg"></div>

            <div>
                <h3 class="title-h3-navy uppercase">Contrat</h3>
                <h6 class="title-h6">Contrat : {{ $profil->typecontrat->type }}</h6>
            </div>

            <div class="trait-lg"></div>

            <div>
                @if ($profil->degre = 1)
                    <h3 class="title-h3-navy uppercase">Manager</h3>
                    @foreach ($manager as $man)
                        <div class="bck-data">
                            <div class="bck-data__picture">
                                @if (Str::startsWith($man->photo, 'public/'))
                                    <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $man->photo)) }}"
                                        alt="Image 1">
                                @else
                                    <img src="{{ asset($man->photo) }}" alt="Image 1">
                                @endif
                            </div>

                            <div class="bck-data__text">
                                <h6 class="title-h6 black">{{ $man->nomEmploye }} {{ $man->prenom }}</h6>
                                <h6 class="title-h6">{{ $man->nomPoste }}</h6>
                            </div>
                        </div>
                        
                        <div class="mb-12"></div>
                    @endforeach
                @endif
            </div>

            <div>
                <div class="title-h3-navy uppercase">
                    <h3>Relations directes</h3>
                </div>

                @foreach ($relation as $rel)
                    <div class="bck-data">
                        <div class="bck-data__picture">
                            @if (Str::startsWith($rel->photo, 'public/'))
                                    <img src="{{ asset('storage/' . Str::replaceFirst('public/', '', $rel->photo)) }}"
                                        alt="Image 1">
                                @else
                                    <img src="{{ asset($rel->photo) }}" alt="Image 1">
                                @endif
                        </div>

                        <div class="bck-data__text">
                            <h6 class="title-h6 black">{{ $rel->nomEmploye }} {{ $rel->prenom }}</h6>
                            <h6 class="title-h6">{{ $rel->nomPoste }}</h6>
                        </div>
                    </div>

                    <div class="mb-12"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
