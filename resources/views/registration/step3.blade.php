<x-guest-layout>
    <div class="container mx-auto">
    
        <div class="text-center">

            <div class="text-start w-full max-w-4xl">
                <a href="/register/step/2" class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="text-gray-700 hover:text-gray-900" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-indigo-600">
                {{$data['animal_name']}} et moi habitons...
            </h3>
            <p class="mt-2">Dites-nous où vous résidez avec {{$data['animal_name']}}</p>
        </div>
    
        {{-- Input --}}
        <div class="text-center pt-2">
            @if ($data['animal_type'] == 1)
                <img src="{{ asset('images/address-cat.png') }}" class="mx-auto max-w-full" />
            @else
                <img src="{{ asset('images/address-dog.png') }}" class="mx-auto max-w-full" />
            @endif
        </div>
    
        <form method="POST" action="{{ route('register.step', ['step'=>3] ) }}" class="mt-6">
            @csrf
            <div class="container mx-auto">
                <div class="text-center pb-3">
                    <h3 class="py-4 text-lg font-semibold text-indigo-600">Adresse ?</h3>
                    <div class="flex justify-center">
                        <div class="w-full max-w-lg">
                            <input type="text" id="addressInput" name="address"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                required />
                            @error('address')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-5 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        JE CONTINUE
                    </button>
                </div>
            </div>
        </form>
    </div>
    

</x-guest-layout>
