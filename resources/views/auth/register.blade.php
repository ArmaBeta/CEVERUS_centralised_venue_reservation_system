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
            background-color: #1b2452;
            /* Navy color */
        }

        .container {
            max-width: 1000px;
            background-color: #f5f5dc;
            /* Beige color */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 25px;
            padding-left: 70px;
            padding-right: 70px;
            text-align: center;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #2c3e50;
            /* Navy color */
        }

        .status-message {
            font-size: 1rem;
            color: #27ae60;
            /* Green color for status message */
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
            color: #2c3e50;
            /* Navy color */
            margin-bottom: 5px;
        }

        .input-field input {
            width: 300px;

            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-field input:focus {
            border-color: #2c3e50;
            /* Navy color */
        }

        .terms-and-privacy {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            color: #2c3e50;
            /* Navy color */
        }

        .terms-and-privacy label {
            display: flex;
            align-items: center;
        }

        .terms-and-privacy input {
            margin-right: 10px;
        }

        button {
            background-color: #2c3e50;
            /* Navy color */
            color: #f5f5dc;
            /* Beige color */
            font-size: 1rem;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1a252f;
            /* Darker navy color */
        }

        .text-gray-600 {
            color: #2c3e50;
            /* Navy color */
        }

        .text-green-600 {
            color: #27ae60;
            /* Green color for status message */
        }

        .text-red-500 {
            color: #e74c3c;
            /* Red color for error messages */
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .underline {
            text-decoration: underline;
        }

        .hover\:text-gray-900:hover {
            color: #1a252f;
            /* Darker navy color */
        }

        .focus\:outline-none:focus {
            outline: none;
        }

        .focus\:ring-2:focus {
            box-shadow: 0 0 0 2px #2c3e50;
            /* Navy color */
        }

        .focus\:ring-offset-2:focus {
            outline-offset: 2px;
        }

        .focus\:ring-indigo-500:focus {
            box-shadow: 0 0 0 2px #2c3e50;
            /* Navy color */
        }
    </style>

    <div class="container">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h2>{{ __('Register') }}</h2>

        <x-validation-errors class="text-red-500 mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-field">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name">
            </div>

            <div class="input-field">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required
                    autocomplete="username">
            </div>

            <div class="input-field">
                <label for="phone">{{ __('Phone') }}</label>
                <input id="phone" type="text" name="phone" :value="old('phone')" required autofocus
                    autocomplete="phone">
            </div>

            <div class="input-field">
                <input id="usertype" type="hidden" name="usertype" value="user" required autofocus
                    autocomplete="usertype">
            </div>

            <div class="input-field">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div class="input-field">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password">
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="terms-and-privacy">
                    <label for="terms">
                        <input type="checkbox" name="terms" id="terms" required>
                        <span>{!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' =>
                                '<a target="_blank" href="' .
                                route('terms.show') .
                                '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                __('Terms of Service') .
                                '</a>',
                            'privacy_policy' =>
                                '<a target="_blank" href="' .
                                route('policy.show') .
                                '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                __('Privacy Policy') .
                                '</a>',
                        ]) !!}</span>
                    </label>
                </div>
            @endif

            <button type="submit">
                {{ __('Register') }}
            </button>

            <div class="mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
