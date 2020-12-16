<html lang="fr">
    <body>
        <h1 style="align-items: center"> Détails du jeu </h1>

        <!-- Statistique du jeu -->
        <div class="container">
            @if(count($jeu ->commentaires) > 0)
                <div class="row">
                    <div class="col">
                        <p>{{$jeu->moyenne}}/5</p>
                    </div>
                    <div class="col">
                        <p>La meilleur note : {{$jeu->commentaires->max()->note}}</p>
                    </div>
                    <div class="col">
                        <p>La pire note : {{$jeu->commentaires->min()->note}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Nombre de commentaires en rapport avec ce jeu : {{count($jeu->commentaires)}}</p>
                    </div>
                    <div class="col">
                        <p> Nombre total de commentaires : {{\App\Models\Commentaire::all()->count()}}</p>
                    </div>
                    <div class="col">
                        <p>Ce jeu est classé : {{$jeu->classement}} / {{count($jeux)}}</p>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col">
                        <p>Pas de moyenne</p>
                    </div>
                    <div class="col">
                        <p>La meilleur note : Pas de notes</p>
                    </div>
                    <div class="col">
                        <p>La pire note : Pas de notes</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Nombre de commentaires en rapport avec ce jeu : Aucun commentaires</p>
                    </div>
                    <div class="col">
                        <p> Nombre total de commentaires : {{\App\Models\Commentaire::all()->count()}}</p>
                    </div>
                    <div class="col">
                        <p>Ce jeu est classé : {{$jeu->classement}} / {{count($jeux)}}</p>
                    </div>
                </div>
            @endif
        </div>


        <!-- Détails du jeux -->
        <ul>
            <li>
                <p>  {{$jeu -> url_media}} </p>
                <p> <strong> Titre du jeux </strong>: {{$jeu -> nom}} </p>
                <p> <strong> La (les) mécanique(s) </strong>
                @foreach($jeu -> mecaniques as $mecanique)
                    {{$mecanique->nom}}
                @endforeach
                </p>
                <p> <strong> Descriptions </strong>: {{$jeu -> nom}} </p>
                <p> <strong> Thème </strong>: {{$jeu -> theme -> nom}} </p>
                <p> <strong> Catégorie </strong>: {{$jeu -> categorie}} </p>
                <p> <strong> Langue </strong>: {{$jeu -> langue}} </p>
                <p> <strong> Éditeur </strong>: {{$jeu -> editeur -> nom}} </p>
                <p> <strong> Nombre de joueurs </strong>: {{$jeu -> nombre_joueurs}} </p>
                <p> <strong> Durée </strong>: {{$jeu -> duree}} </p>
            </li>
        </ul>

        <a href="{{route('regle.show', ['id' => $jeu->id])}}"><button>Voir les regles</button></a>
        <a href="{{route('jeux.index')}}"><button>Retour a la liste</button></a>

        <!-- Section ajout de commentaire -->
        @auth
            <div>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h3>Ajouter un commentaire :</h3>
                <form action="{{route('commentaire_ajout')}}" method="POST">
                    {!! csrf_field() !!}
                    <div>
                        <label for="commentaire">Commentaire :</label>
                        <input type="text" id="commentaire" name="commentaire" value="{{ old('commentaire') }}">
                    </div>

                    <div>
                        <label for="note">Note :</label>
                        <input type="number" id="note" name="note" value="{{ old('note') }}">
                    </div>

                    <div class="button">
                        <button type="submit">envoyer</button>
                    </div>
                </form>
            </div>
        @endauth
    </body>
</html>
