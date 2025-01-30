<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asheel - Assurance Animaux</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="flex">
        <div class="w-64 bg-indigo-600 text-white min-h-screen p-4">
            <div class="flex justify-center mb-5">
                <img src="{{asset('images/profile.png')}}" class="w-1/2" alt="">
            </div>
            
            <ul>
                <li class="mb-4">
                    <a href="{{ url('dashboard') }}" class="text-white hover:text-indigo-200 
                        {{ request()->is('dashboard') ? 'bg-indigo-500' : '' }} flex items-center p-2 rounded">
                        <i class="fas fa-home mr-2"></i> Accueil
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ url('index') }}" class="text-white hover:text-indigo-200 
                        {{ request()->is('index') ? 'bg-indigo-500' : '' }} flex items-center p-2 rounded">
                        <i class="fas fa-paw mr-2"></i> Mes Animaux
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ url('contrat/index') }}" class="text-white hover:text-indigo-200 
                        {{ request()->is('contrat/index') ? 'bg-indigo-500' : '' }} flex items-center p-2 rounded">
                        <i class="fas fa-file-alt mr-2"></i> Mes Contrats
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white hover:text-indigo-200 flex items-center p-2 rounded">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
