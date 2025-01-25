<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen bg-gray-100 flex items-center justify-center">

    <div class="flex w-full h-full max-w-7xl rounded-lg shadow-lg overflow-hidden">
        <div class="w-1/2 flex items-center justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-2/3">
        </div>

        <!-- Section de droite (Formulaire) -->
        <div class="w-1/2 bg-white flex flex-col items-center justify-center p-8">
            <div class="w-full max-w-sm">
                <h2 class="text-3xl font-semibold text-gray-700 text-center mb-6">Se connecter</h2>

                <form action="{{ route('login') }}" method="POST" class="w-full space-y-6">
                    @csrf
                    <!-- Adresse email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Mot de passe -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Mot de passe')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Se souvenir de moi -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-blue-700 text-white font-bold py-3 rounded-md hover:bg-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-300">
                        Se connecter
                    </button>
                </form>

                <div class="mt-4 text-center">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                </div>

                <div class="mt-6 text-center">
                    <span class="text-xs text-gray-500">Pas encore de compte ?</span>
                    <a href="{{url('register/step/1')}}" class="text-blue-600 text-xs font-bold hover:text-blue-800 transition duration-200">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
