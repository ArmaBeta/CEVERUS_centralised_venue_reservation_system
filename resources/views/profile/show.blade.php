<x-app-layout>
    <x-slot name="header">
        <div class="header-container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        </div>
    </x-slot>

    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="wrapper">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="form-section">
                    @livewire('profile.update-profile-information-form')
                </div>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <x-section-border />
                <div class="form-section mt-10">
                    @livewire('profile.update-password-form')
                </div>
            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />
                <div class="form-section mt-10">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Open Sans", sans-serif;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            color: #f5f5dc;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }

        .header-container h2 {
            margin: 0;
        }

        .btn-primary {
            background: #2c3e50;
            color: #f5f5dc;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary:hover {
            background: #f5f5dc;
            color: #2c3e50;
        }

        body {
            background-color: #1b2452;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
        }

        .wrapper {
            width: 1100px;
            border-radius: 8px;
            padding: 40px;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background-color: #f5f5dc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .input-field {
            margin-bottom: 20px;
        }

        .input-field label {
            display: block;
            font-size: 1rem;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .input-field input {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
            padding: 10px;
            transition: border-color 0.3s;
        }

        .input-field input:focus {
            border-color: #2c3e50;
        }

        .wrapper a {
            color: #2c3e50;
            text-decoration: none;
        }

        .wrapper a:hover {
            text-decoration: underline;
        }

        button {
            background: #2c3e50;
            color: #f5f5dc;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        button:hover {
            color: #2c3e50;
            border-color: #2c3e50;
            background: #f5f5dc;
        }

        .register {
            text-align: center;
            margin-top: 30px;
            color: #2c3e50;
        }

        .register a {
            color: #2c3e50;
            text-decoration: underline;
        }

        .register a:hover {
            color: #1a1a2e;
        }

        x-section-border {
            margin: 30px 0;
            border: 1px solid #ccc;
        }
    </style>
</x-app-layout>
