<x-client-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Carte pour les détails de l'animal -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between">
                <div class="flex items-center mb-6">
                    @if($animal->breed_type_id == 1)
                        <img src="{{ asset('images/cat_on.png') }}" alt="{{ $animal->name }}" class="w-32 h-32 object-cover rounded-lg shadow-md">
                    @else
                        <img src="{{ asset('images/dog_on.png') }}" alt="{{ $animal->name }}" class="w-32 h-32 object-cover rounded-lg shadow-md">
                    @endif

                    <div class="ml-6">
                        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
                            @if($animal->sexe === 'male')
                                <i class="fas fa-mars text-indigo-600 mr-2"></i>
                            @else
                                <i class="fas fa-venus text-pink-600 mr-2"></i>
                            @endif
                            {{ $animal->name }}
                        </h1>
                        <p class="text-gray-600 capitalize"><i class="fas fa-genderless text-gray-500 mr-2"></i>Sexe: {{ $animal->sexe }}</p>
                    </div>
                </div>
                <div>
                    <a href="{{ route('contrat.show', ['id' => $animal->id]) }}" 
                       class="flex items-center p-2 rounded-lg 
                              {{ $animal->contract->status == 'active' ? 'bg-green-600 text-white' : 'bg-indigo-600 text-white' }} 
                              hover:bg-indigo-700 duration-300 transition-colors">
                        <i class="{{ $animal->contract->status == 'active' ? 'fas fa-check-circle' : 'fas fa-file-contract' }} mr-2"></i>
                        Contrat
                    </a>
                </div>
                
                

            </div>

            <!-- Informations supplémentaires -->
            <div class="grid grid-cols-3 gap-6 p-6">
                <div class="flex items-center">
                    <i class="fas fa-birthday-cake text-indigo-500 mr-2"></i>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Âge</h2>
                        <p class="text-gray-600">{{ $animal->age->age }} an(s)</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <i class="fas fa-paw text-indigo-500 mr-2"></i>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Race</h2>
                        <p class="text-gray-600">{{ $animal->breed->name }}</p>
                    </div>
                </div>

                <div class="flex items-center">
                    <i class="fas fa-dog text-indigo-500 mr-2"></i>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Type de Race</h2>
                        <p class="text-gray-600">{{ $animal->breedType->name }}</p>
                    </div>
                </div>

            </div>

        </div>
        
    </div>
</x-client-layout>
