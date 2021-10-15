@extends('welcome')

@section('title', 'Register')

@section('style')

    <style>
        * {
            box-sizing: border-box
        }


        /* Add padding to containers */
        .container {
            padding: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=date],
        input[type=number],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,
        input[type=date]:focus,
        input[type=number]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

    </style>

@endsection

@section('content')

    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
               
            </x-slot>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}">

                @csrf
                <div>
                    <div class="container">
                        <h1 style="text-align: center; font-size:40px">Register</h1>
                        <p style="text-align: center; font-size:20px">Please fill in this form to create an account.</p>
                        <hr>

                        <label for="firstname"><b>Firstname</b></label>
                        <input type="text" placeholder="Enter Firstname" name="firstname" id="firstname" required>

                        <label for="lastname"><b>Lastname</b></label>
                        <input type="text" placeholder="Enter Lastname" name="lastname" id="lastname" required>

                        <label for="contact"><b>Contact</b></label>
                        <input type="number" placeholder="Enter Contact" name="contact" id="contact" required>

                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" required>


                        <label for="date_de_naissance"><b>Birthday</b></label>
                        <input type="date" placeholder="Enter Your Birthday date" name="date_de_naissance"
                            id="date_de_naissance" required>


                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required
                            autocomplete="new-password" id="password" required>

                        <label for="password_confirmation"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="password_confirmation" required
                            id="password_confirmation" required>
                        <hr>

                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                        <button type="submit" class="registerbtn">Register</button>
                    </div>

                    <div class="container signin">
                        <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
                    </div>
                </div>

            </form>



        </x-auth-card>
    </x-guest-layout>


@endsection
