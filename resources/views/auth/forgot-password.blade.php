<x-guest-layout>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            padding: 20px;
            background-color: #1b2452; /* Navy color */
        }

        .container {
            max-width: 400px;
            width: 100%;
            background-color: #f5f5dc; /* Beige color */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2c3e50; /* Navy color */
        }

        p {
            font-size: 1rem;
            color: #2c3e50; /* Navy color */
            margin-bottom: 20px;
        }

        .status-message {
            font-size: 1rem;
            color: #27ae60; /* Green color for status message */
            margin-bottom: 20px;
        }

        .input-field {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .input-field label {
            display: block;
            font-size: 1rem;
            color: #2c3e50; /* Navy color */
            margin-bottom: 5px;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-field input:focus {
            border-color: #2c3e50; /* Navy color */
        }

        button {
            background-color: #2c3e50; /* Navy color */
            color: #f5f5dc; /* Beige color */
            font-size: 1rem;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1a252f; /* Darker navy color */
        }

        .text-gray-600 {
            color: #2c3e50; /* Navy color */
        }

        .text-green-600 {
            color: #27ae60; /* Green color for status message */
        }

        .text-red-500 {
            color: #e74c3c; /* Red color for error messages */
        }
    </style>

    <div class="container">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h2>{{ __('Forgot Password') }}</h2>

        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>

        @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="text-red-500 mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="input-field">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            </div>

            <button type="submit">
                {{ __('Email Password Reset Link') }}
            </button>
        </form>
    </div>
</x-guest-layout>
