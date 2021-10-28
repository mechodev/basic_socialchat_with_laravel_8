@extends('layouts.app')

@section('title', 'Forum')


@section('style')

    <style>
        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        /* Darker chat container */
        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        /* Clear floats */
        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Style images */
        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        /* Style the right image */
        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        /* Style time text */
        .time-right {
            float: right;
            color: #aaa;
        }

        /* Style time text */
        .time-left {
            float: left;
            color: #999;
        }

    </style>

@endsection



@section('content')

    @foreach ($allDiscussions as $discussion)
        <div class="container">
            <div class="publication__title">
                <img src="https://cdn-icons-png.flaticon.com/128/1077/1077114.png" alt="User"
                    style="width:auto; max-height:50px">
                <span>{{ $discussion->user->firstname }} {{ $discussion->user->lastname }}</span>
            </div>
            <p>{{ $discussion->contenu }}</p>
            <span class="time-right">{{ date_format($discussion->created_at, 'd-m-Y H:i:s') }}</span>
        </div>
    @endforeach


    <form method="POST" action="{{ route('forum') }}">
        @csrf
        <div style="width: 100%">
            <div style="display: flex; flex-direction:column; width:100%">
                <textarea name="contenu" id="" cols="5" rows="2"></textarea>
            </div>
            <div style="width: 100%">
                <button style="width: 100%; display:flex; justify-content:center; margin:10px 0" type="submit">
                    <strong>Ajoutez un message</strong>
                </button>
            </div>
        </div>
    </form>


@endsection
