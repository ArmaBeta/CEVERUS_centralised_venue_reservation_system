<x-guest-layout>

    <head>
        <title>CEVERUS</title>
    </head>

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
            padding: 0 10px;
            background-color: #1b2452;
            /* Navy color */
        }

        .wrapper {
            width: 400px;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background-color: #f5f5dc;
            /* Beige color */
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
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
            width: 330px;

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

        .forget {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 25px 0 35px 0;
            color: #2c3e50;
            /* Navy color */
        }

        #remember {
            accent-color: #2c3e50;
            /* Navy color */
        }

        .forget label {
            display: flex;
            align-items: center;
        }

        .forget label p {
            margin-left: 8px;
        }

        .wrapper a {
            color: #2c3e50;
            /* Navy color */
            text-decoration: none;
        }

        .wrapper a:hover {
            text-decoration: underline;
        }

        button {
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
            margin-top: 30px;
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

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="wrapper">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2>

                <x-validation-errors class="mb-4 text-red-500" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div style="text-align: left;">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" id="email" placeholder="Enter your email..."
                        :value="old('email')" required autofocus autocomplete="username">
                </div>

                <div style="text-align: left;">
                    <label for="email">Password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Enter your password..." required
                        autocomplete="current-password">
                </div>

                <div class="forget">
                    <label for="remember_me" class="flex items-center">
                        <input type="checkbox" id="remember_me" name="remember">
                        <p>Remember me</p>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit">Log In</button>

                <div class="register">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
