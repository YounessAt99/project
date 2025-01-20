<x-guest-layout>
    <div class="container mx-auto px-4">
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-center">
                {{ session('error') }}
            </div>
        @endif
    
        <div class="text-center">

            <div class="text-start w-full max-w-4xl">
                <a href="/register/step/3" class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="text-gray-700 hover:text-gray-900" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>

            <h3 class="text-lg font-semibold text-indigo-600 mt-4">Vous y êtes presque</h3>
            <p class="mt-2">Dites-nous en un peu plus sur vous</p>
        </div>
    
        <form method="POST" action="{{ route('register.step',['step'=>4]) }}" class="mt-6">
            @csrf
            <div class="max-w-4xl mx-auto">
                <div class="flex flex-wrap -mx-2">
                    {{-- First Name --}}
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <label for="first_name" class="block text-indigo-600 font-medium mb-1">Mon Prénom</label>
                        <input type="text" id="first_name" name="first_name" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600" 
                            value="{{ old('first_name') }}">
                        @error('first_name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Last Name --}}
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <label for="last_name" class="block text-indigo-600 font-medium mb-1">Mon Nom</label>
                        <input type="text" id="last_name" name="last_name" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600" 
                            value="{{ old('last_name') }}">
                        @error('last_name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="flex flex-wrap -mx-2">
                    {{-- Email --}}
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <label for="email" class="block text-indigo-600 font-medium mb-1">Mon Adresse Email</label>
                        <input type="email" id="email" name="email" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600" 
                            placeholder="E-mail" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- Phone --}}
                    <div class="w-full md:w-1/2 px-2 mb-4">
                        <label for="phone" class="block text-indigo-600 font-medium mb-1">Mon Numéro de téléphone</label>
                        <input type="tel" id="phone" name="phone" 
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-600" 
                            placeholder="+212" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                {{-- Accept Conditions --}}
                <div class="flex items-start mb-4">
                    <input name="check_accept" type="checkbox" id="checkbox" 
                        class="w-6 h-6 text-indigo-600 border-gray-300 rounded focus:ring-2 focus:ring-indigo-500">
                    <label for="checkbox" class="ml-2 text-sm">
                        J'accepte les <a target="_blank" href="" 
                        class="text-indigo-600 hover:underline">conditions générales d'utilisation</a> et que les données collectées ci-dessus soient utilisées par Gatasky pour me recontacter afin de finaliser ma souscription.
                    </label>
                    @error('check_accept')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="text-center mt-6">
                <button type="submit" id="submitBtn" disabled 
                    class="bg-indigo-600 text-white px-5 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    Découvrir les offres pour {{ $data['animal_name'] }}
                </button>
            </div>
        </form>
    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const checkbox = document.getElementById('checkbox');
                const submitBtn = document.getElementById('submitBtn');
    
                checkbox.addEventListener('change', function() {
                    submitBtn.disabled = !checkbox.checked;
                });
            });
        </script>
    </div>
    
    
</x-guest-layout>
