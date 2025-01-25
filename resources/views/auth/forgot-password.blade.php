<x-guest-layout>
    <div class="flex justify-center items-center">
        <div class="w-1/2">
            <div class="flex items-center justify-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-2/12">
            </div>
            <div class="mb-4 text-center text-sm text-gray-600">
                {{ __('Mot de passe oublié? Pas de problème. Il suffit de nous communiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d’en choisir un nouveau') }}
            </div>
        
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button>
                        {{ __('Email Réinitialisation du mot de passe') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

    </div>

</x-guest-layout>
