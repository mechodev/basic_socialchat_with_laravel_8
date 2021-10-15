@extends('layouts.app')

@section('title', 'Commentaires')

@section('style')


    <style>
        form {
            display: flex;
            justify-content: center;
        }

        span {
            color: #04AA6D;
        }

    </style>


@endsection

@section('content')

    <div class="publication__item">
        <div class="publication__title">
            <span>{{ $publication->user->firstname }} {{ $publication->user->lastname }}</span>
        </div>
        <p class="publication__desc">
            {{ $publication->contenu }}
        </p>
        <a class="publication__addComment" href="{{ route('comment', ['id' => $publication->id]) }}">Ajouter un
            commentaire</a>
    </div>

    <div style="padding: 5px">

        <form method="POST" action="{{ route('commentaire', ['id' => $publication->id]) }}">
            @csrf
            <div style="width: 50%">
                <div style="display: flex; flex-direction:column; width:100%">
                    <textarea name="contenu" placeholder="Ajouter un commentaire" id="" cols="5" rows="2"></textarea>
                </div>
                <div style="width: 100%">
                    <button style="width: 100%; display:flex; justify-content:center; margin:10px 0" type="submit">
                        <strong>Commenter</strong>
                    </button>
                </div>
            </div>
        </form>
    </div>

    @foreach ($commentaires as $comment)
        <div class="publication__item">
                <div class="publication__title">
                    <span>{{ $comment->user->firstname }} {{ $comment->user->lastname }}</span>
                </div>
                <p class="publication__desc">
                    {{ $comment->contenu }}
                </p>
        </div>
    @endforeach

@endsection
