<x-client-layout>
    <!-- Main Content -->
    <div class="flex-1">
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h3 class="text-2xl font-semibold text-indigo-600">Bienvenue, {{ $user->name }} !</h3>
            <p class="mt-2 text-gray-600">Voici un aperçu de votre compte et des informations de vos animaux.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Stat Card 1 -->
            <div class="bg-white shadow rounded-lg p-6">
                <h4 class="text-xl font-semibold text-indigo-600">Mes Animaux</h4>
                <p class="text-gray-600 mt-2">Vous avez actuellement {{$animalsCount}} animale assurés.</p>
            </div>

            <!-- Stat Card 2 -->
            <div class="bg-white shadow rounded-lg p-6">
                <h4 class="text-xl font-semibold text-indigo-600">Mes Contrats</h4>
                <p class="text-gray-600 mt-2">Le dernier contrat "{{$contracts->formcard->name}}" est actif jusqu'au {{\Carbon\Carbon::parse($contracts->end_date)->locale('fr')->isoFormat('D MMMM YYYY')}}.</p>
            </div>

            <!-- Stat Card 3 -->
            <div class="bg-white shadow rounded-lg p-6">
                <h4 class="text-xl font-semibold text-indigo-600">Mes Paiements</h4>
                <p class="text-gray-600 mt-2">Le dernier paiement {{$contracts->payment->amount}} MAD.</p>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h4 class="text-2xl font-bold text-indigo-600 flex items-center">
                <i class="fas fa-paw mr-2"></i> Mon Pets
            </h4>
            <ul class="mt-4 divide-y divide-gray-200">
                @foreach ($animals as $animal)
                <li class="flex justify-between items-center py-3">
                    <!-- Animal Name and Details -->
                    <div>
                        <span class="font-medium text-gray-800">{{$animal->name}}</span>
                        <span class="text-gray-500">- {{$animal->sexe}}</span>
                    </div>

                    <!-- Contract Button -->
                    <a href="{{ route('contrat.show', ['id' => $animal->id]) }}" 
                    class="flex items-center px-4 py-2 rounded-lg 
                            {{ $animal->contract->status == 'active' ? 'bg-green-600 text-white' : 'bg-indigo-600 text-white' }} 
                            hover:bg-opacity-90 transition-colors duration-300">
                        <i class="{{ $animal->contract->status == 'active' ? 'fas fa-check-circle' : 'fas fa-file-contract' }} mr-2"></i>
                        Contrat
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

    </div>
</x-client-layout>
