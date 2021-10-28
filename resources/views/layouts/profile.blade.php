@extends('layouts.app')

@section('title', 'Profile')

@section('style')

    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
        }

        .profile_container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: red;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            margin-top: 5px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }

    </style>
@endsection

@section('content')
    <div class="profile_container">
        <div class="card">
            <img src="https://cdn-icons-png.flaticon.com/128/1077/1077114.png" alt="User"
                style="width:auto; max-height:100px">
            <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
            <h5>Contact:{{ $user->contact }}</h5>
            <h5>Adresse email:{{ $user->email }}</h5>
            <h5>Date de naissance: {{ $user->date_de_naissance }}</h5>
            <p class="title">CEO & Founder, Example</p>
            <p>Harvard University</p>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
