<x-guest-layout>

    <head>
        <title>CEVERUS - Host Registration</title>
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
                background-color: #1b2452;
                /* Navy color */
            }

            .wrapper {
                width: 100%;
                max-width: 1000px;
                border-radius: 10px;
                padding: 20px;
                padding-left: 30px;
                padding-right: 30px;
                text-align: center;
                background-color: #f5f5dc;
                /* Beige color */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .header {
                margin-bottom: 30px;
            }

            .header h2 {
                font-size: 2rem;
                margin-bottom: 10px;
                color: #2c3e50;
                /* Navy color for text */
            }

            .header p {
                font-size: 1rem;
                color: #2c3e50;
                /* Navy color for text */
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

            .terms {
                margin: 20px 0;
                color: #2c3e50;
                /* Navy color */
                text-align: left;
            }

            .terms a {
                color: #2c3e50;
                /* Navy color */
                text-decoration: underline;
            }

            .terms a:hover {
                color: #1a1a2e;
                /* Darker navy color */
            }

            button {
                width: 100%;
                background: #2c3e50;
                /* Navy color */
                color: #f5f5dc;
                /* Beige color */
                font-weight: 600;
                border: none;
                padding: 12px 20px;
                cursor: pointer;
                border-radius: 3px;
                font-size: 16px;
                border: 2px solid transparent;
                transition: 0.3s ease;
            }

            button:hover {
                color: #2c3e50;
                /* Navy color */
                border-color: #2c3e50;
                /* Navy color */
                background: #f5f5dc;
                /* Beige color */
            }

            .register {
                text-align: center;
                margin-top: 20px;
                color: #2c3e50;
                /* Navy color */
            }

            .register a {
                color: #2c3e50;
                /* Navy color */
                text-decoration: underline;
            }

            .register a:hover {
                color: #1a1a2e;
                /* Darker navy color */
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <div class="header">
                <h2>Host Registration</h2>
                <p>Create your host account</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-validation-errors class="mb-4 text-red-500" />

                <div style="text-align: left;">
                    <label for="email">Name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="name" id="name" :value="old('name')" required autofocus
                        autocomplete="name">
                </div>
                <div style="text-align: left;">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" id="email" :value="old('email')" required
                        autocomplete="username">
                </div>

                <input type="hidden" name="usertype" id="usertype" value="host" required autofocus
                    autocomplete="usertype">
                <div style="text-align: left;">
                    <label for="email">Phone</label>
                </div>
                <div class="input-field">
                    <input type="text" name="phone" id="phone" :value="old('phone')" required autofocus
                        autocomplete="phone">
                </div>
                <div style="text-align: left;">
                    <label for="email">Password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" required autocomplete="new-password">
                </div>
                <div style="text-align: left;">
                    <label for="email">Confirm Passwords</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        autocomplete="new-password">
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="terms">
                        <label for="terms" class="flex items-center">
                            <input type="checkbox" name="terms" id="terms" required>
                            <span class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '">Terms of Service</a>',
                                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '">Privacy Policy</a>',
                                ]) !!}
                            </span>
                        </label>
                    </div>
                @endif

                <button type="submit">Register</button>

                <div class="register">
                    <p>Already registered? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </body>
</x-guest-layout>
