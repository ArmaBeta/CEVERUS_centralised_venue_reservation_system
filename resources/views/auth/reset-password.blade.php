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
    </style>

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="wrapper">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <h2>Reset Password</h2>

                <x-validation-errors class="mb-4 text-red-500" />

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div style="text-align: left;">
                    <label for="email">Email</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" id="email" placeholder="Enter your email..."
                        :value="old('email', $request - > email)" required autofocus autocomplete="username">
                </div>
                </br>
                <div style="text-align: left;">
                    <label for="password">Password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Enter your password..." required
                        autocomplete="new-password">
                </div>
                <br />
                <div style="text-align: left;">
                    <label for="password_confirmation">Confirm Password</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm your password..." required autocomplete="new-password">
                </div>
                <br />
                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</x-guest-layout>
