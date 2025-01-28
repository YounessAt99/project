<x-client-layout>
    <div class="">
        <div class="mb-10 grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- col 1 --}}
            <div class="bg-white border rounded-lg shadow flex p-6">
                <!-- Image Section -->
                <div class="flex-shrink-0">
                    <div class="w-24 h-24 rounded-full bg-indigo-100 flex items-center justify-center overflow-hidden">
                        @if ($animal->type_race_id == 1)
                            <img src="{{asset('images/cat_on.png')}}" alt="Cat Image" class="w-full h-full object-cover rounded-full border border-white" />
                        @else
                            <img src="{{asset('images/dog_on.png')}}" alt="Dog Image" class="w-full h-full object-cover rounded-full border border-white" />
                        @endif
                    </div>
                </div>
        
                <!-- Info Section -->
                <div class="ml-6 flex-grow">
                    <h5 class="text-xl font-semibold flex items-center">
                        <i class="fas fa-paw text-indigo-600 mr-2"></i>
                        {{$animal->name}}
                        @if($animal->sexe === 'male')
                            <i class="fas fa-mars text-indigo-600 ml-2"></i>
                        @else
                            <i class="fas fa-venus text-pink-600 ml-2"></i>
                        @endif
                    </h5>
                    <p class="text-gray-600 mt-2 flex items-center">
                        @if ($animal->type_race_id == 1)
                            <i class="fas fa-cat text-indigo-600 mr-2"></i>
                        @else
                            <i class="fas fa-dog text-indigo-600 mr-2"></i>
                        @endif
                        {{$animal->breed->name}}
                    </p>
                    
                    <p class="text-gray-600 flex items-center">
                        <i class="fas fa-birthday-cake text-indigo-600 mr-2"></i>
                        {{$animal->age->age}} an(s)
                    </p>
                </div>
                
            </div>
        
            {{-- col 2 --}}
            <div class="bg-white border rounded-lg shadow flex flex-col justify-center items-center p-6">
                <h5 class="text-xl font-semibold text-indigo-600">Montant</h5>
                <p class="text-gray-700 text-lg mt-2">{{ number_format($animal->contract->payment->amount, 2, ',', ' ') }} MAD</p>
                <div class="mt-4">
                    <span 
                        class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                        {{ $animal->contract->status === 'active' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                        {{ ucfirst($animal->contract->status) }}
                    </span>
                </div>
            </div>
        
            {{-- col 3 --}}
            <div class="bg-white border rounded-lg shadow p-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 flex items-center justify-center bg-indigo-100 rounded-full">
                            <i class="fas fa-file-alt text-3xl text-indigo-600"></i>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-xl font-semibold text-indigo-600">
                            Ma formule : {{ $animal->contract->formcard->name }}
                        </h5>
                        <p class="text-red-600 font-medium mt-1">
                             {{ $animal->contract->policy_number }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 border-t pt-4 text-sm text-gray-600">
                    <p>Période : 
                        {{ \Carbon\Carbon::parse($animal->contract->payment->payment_date)->locale('fr')->isoFormat('D MMMM YYYY') }} 
                        - 
                        {{ \Carbon\Carbon::parse($animal->contract->end_date)->locale('fr')->isoFormat('D MMMM YYYY') }}
                    </p>
                </div>
            </div>
            
        </div>
        
        {{-- Mes garanties de base --}}
        <div class="mb-10 container border-t pt-4">
            <!-- Title Section -->
            <div class="flex justify-between items-center">
                <h4 class="text-xl font-bold text-indigo-600 font-nunito">Mes garanties de base</h4>
            </div>
            <!-- Guarantee Items -->
            <div class="pt-4 grid grid-cols-5  gap-6">
                @foreach ($basicGuarantee as $item)
                    <div class="bg-white border rounded-lg shadow hover:shadow-lg transition-shadow duration-300 h-full">
                        <div class="text-center mt-4">
                            <img class="w-1/3 mx-auto" src="{{ asset($item['logo']) }}" alt="Guarantee Logo">
                        </div>
                        <div class="p-4 text-center">
                            <p class="text-lg font-semibold text-gray-700">{{ $item['title'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        
        {{-- Mes options --}}
        <div class="mb-10 text-center">
            <div class="flex justify-between items-center">
                <h4 class="text-xl font-bold text-indigo-600 font-nunito">Mes options</h4>
            </div>
            <div class="pt-3">
                <div class="grid grid-cols-5 gap-6">
                    @foreach ($guarantees as $item)
                        <div class="bg-gray-100 p-4 border rounded-lg transition-opacity duration-300 
                            @if (!$animal->hasGuarantee($item)) opacity-50  @endif shadow-lg">
                            <div class="space-y-2 text-center">
                                <div class="mb-4">
                                    <img src="{{ asset($item->logo) }}" class="w-1/2 mx-auto" alt="Guarantee Logo" />
                                </div>
                                <p class="font-semibold text-lg text-left">{{ $item->title }}</p>
                            </div>
                            <p class="text-gray-500 text-sm text-left">{{ $item->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Mes garanties --}}
        <div class="mb-10 border-t pt-4">
            <!-- Title Section -->
            <div class="flex justify-between items-center">
                <h4 class="text-xl font-bold text-indigo-600 font-nunito">Mes plafonds</h4>
            </div>

            <!-- Guarantee Items -->
            <div class="pt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Medical Fees -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300 flex flex-col items-center p-6">
                    <img src="{{ asset('/images/frais.png') }}" alt="Medical Fees Icon" class="w-1/2 mb-4">
                    <p class="text-center text-gray-600 font-semibold mb-2">Frais médicaux et chirurgicaux</p>
                    <p class="text-xl font-bold text-indigo-600">{{ $animal->contract->formcard->insurance }}</p>
                </div>

                <!-- Annual Limit -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300 flex flex-col items-center p-6">
                    <img src="{{ asset('/images/plafond.png') }}" alt="Annual Limit Icon" class="w-1/2 mb-4">
                    <p class="text-center text-gray-600 font-semibold mb-2">Plafond annuel en dirham</p>
                    <p class="text-xl font-bold text-indigo-600">{{ $animal->contract->formcard->annual_limit }} DH</p>
                </div>

                <!-- Prevention -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow duration-300 flex flex-col items-center p-6">
                    <img src="{{ asset('/images/prevention.png') }}" alt="Prevention Icon" class="w-1/2 mb-4">
                    <p class="text-center text-gray-600 font-semibold mb-2">Prévention</p>
                    <p class="text-xl font-bold text-indigo-600">{{ $animal->contract->formcard->advantage }}</p>
                </div>
            </div>
        </div>

        {{-- Franchise --}}
        {{-- <div class="border-t mt-4">
            <h4 class="text-indigo-600 font-nunito text-xl">Mes franchises <span class="text-black"> et </span> jours de carence</h4>
            
            <div class="pt-4">
                <div class="space-y-4">

                    <!-- Franchise par année d'assurance -->
                    <div class="border shadow p-4 flex justify-between items-center w-full">
                        <div>
                            <b>Franchise par année d'assurance</b>
                            <p class="text-gray-600 text-sm">Somme annuelle restante à votre charge pour l'ensemble des actes de soin prodigués à votre animal.</p>
                        </div>
                        <div class="flex items-center">
                            <h4 class="text-indigo-600">0DH</h4>
                        </div>
                    </div>

                    <!-- Franchise par acte -->
                    <div class="border shadow p-4 flex justify-between items-center w-full">
                        <div>
                            <b>Franchise par acte</b>
                            <p class="text-gray-600 text-sm">Somme restant à votre charge lors d'un acte de soin prodigué à votre animal.</p>
                        </div>
                        <div class="flex items-center">
                            <h4 class="text-indigo-600">0DH</h4>
                        </div>
                    </div>

                    <!-- Jours de carence -->
                    <div class="border shadow p-4 flex justify-between items-center w-full">
                        <div>
                            <b>Jours de carence</b>
                            <p class="text-gray-600 text-sm">Jours pendant lesquels la garantie ne s'applique pas à partir du début du contrat. Une attestation de bonne santé doit être fournie pour un délai de carence de 7 ou 15 jours et pour les cas de reprise (animal déjà couvert avant son arrivée chez Asheel).</p>
                        </div>
                        <div class="flex items-center">
                            <h4 class="text-indigo-600">60 jours</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

    </div>













</x-client-layout>
