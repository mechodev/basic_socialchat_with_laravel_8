@extends('welcome')

@section('title', 'Login')

@section('style')
    <style>
        form {
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

    </style>

@endsection

@section('content')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">

            </x-slot>

            <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div>
                    <div class="imgcontainer">
                        <img src="img_avatar2.png" alt="Avatar" class="avatar">
                    </div>

                    <div class="container">
                        <label for="email"><b>Email</b></label>
                        <input type="email" placeholder="Enter Email" name="email" required autofocus>

                        <label for="password"><b>Password</b></label>
                        <input type="password" name="password" required autocomplete="current-password"
                            placeholder="Enter Password">

                        <button type="submit">Login</button>
                        <label>
                            <input type="checkbox" checked="checked" name="remember"><span> Remember me </span>
                        </label>
                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <span class="psw">Not <a href="{{ route('register') }}">Register?</a></span>
                    </div>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

@endsection
