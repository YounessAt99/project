<x-guest-layout>
    <div class="container mx-auto">
    
        <div class="container mx-auto">
            <div class="text-center pt-3">
                <div>
                    <div class="text-start w-full max-w-4xl -mt-14 -ms-28 mb-5">
                        <a href="/register/step/1" class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="text-gray-700 hover:text-gray-900" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                            </svg>
                        </a>
                    </div>
                    <h3 class="text-xl">
                        <span class="text-indigo-600">Un peu plus d'informations sur </span>{{$data['animal_name']}}
                    </h3>
                </div>

                <form method="POST" action="{{ route('register.step', ['step'=>2]) }}" class="mt-6">
                    @csrf
                    <div class="flex justify-center">
                        <div class="w-full max-w-sm">
                            <h5 class="pt-4 text-indigo-600">Quel est son âge ?</h5>
                            <select class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" name="animal_age" value="{{ old('animal_age') }}" required>
                                <option value="" selected></option>
                                @foreach ($data['ages'] as $age)
                                    <option value="{{ $age->id }}">{{ $age->age }}</option>
                                @endforeach
                            </select>
                            @error('animal_age')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="flex justify-center pt-4">
                        <div class="w-full max-w-sm">
                            <h5 class="text-indigo-600">Quel est le sexe de animal name ?</h5>
                            <div class="flex items-center justify-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio text-indigo-600" name="sexe" value="male" required>
                                    <span class="ml-2">Mâle</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio text-indigo-600" name="sexe" value="femelle" required>
                                    <span class="ml-2">Femelle</span>
                                </label>
                            </div>
                            @error('sexe')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="flex justify-center pt-3 py-2">
                        <div class="w-full max-w-sm">
                            <h5 class="pt-3 text-indigo-600">Quelle est sa race ?</h5>
                            <select class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" name="animal_breed" value="{{ old('animal_breed') }}" required>
                                <option value="hhh" selected></option>
                                @foreach ($data['breeds'] as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->name }}</option>
                                @endforeach
                            </select>
                            @error('animal_breed')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="flex justify-center pt-5">
                        <div class="w-full max-w-xs">
                            <button type="submit" style="background-color: #4A36F1" class="w-full text-white  py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600">JE CONTINUE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-guest-layout>
