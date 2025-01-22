<x-guest-layout>

<div class="max-w-3xl mx-auto bg-white border-collapse border-2 border-indigo-400 rounded-lg shadow-lg p-6">
    <h3 class="text-center text-2xl font-bold text-indigo-600 mb-6">Premier Paiement</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Left Column -->
        <div>
            <div class="flex justify-between gap-4">
                <div class="w-1/2 flex">
                    <input type="radio" id="monthly" name="payment" class="hidden peer" onchange="updateValue()" />
                    <label for="monthly"
                        class="block w-full border-2 border-gray-300 bg-gray-50 rounded-lg p-4 text-center cursor-pointer peer-checked:border-indigo-500 peer-checked:bg-indigo-100">
                        <span class="font-medium text-gray-700">Paiement Mensuel</span>
                        <br><small class="text-gray-500">Plus flexible</small>
                    </label>
                </div>
                <div class="w-1/2 flex">
                    <input type="radio" id="yearly" name="payment" class="hidden peer" checked onchange="updateValue()" />
                    <label for="yearly"
                        class="block w-full border-2 border-gray-300 bg-gray-50 rounded-lg p-4 text-center cursor-pointer peer-checked:border-indigo-500 peer-checked:bg-indigo-100">
                        <span class="font-medium text-gray-700">Paiement Annuel</span>
                        <br><small class="text-gray-500">Plus tranquille</small>
                    </label>
                </div>
            </div>
            
            <p class="text-sm text-gray-600 mt-6">
                <span class="font-semibold">Ce premier paiement</span> d'un 
                <span class="font-semibold">montant de <span class="value">{{$data['mantant']}}</span>  DH</span> couvre la période du 
                <span class="font-semibold">{{$data['dateNow']}}</span> au <span class="font-semibold"> {{$data['dateYear']  }} </span>.
            </p>
            <p class="text-sm text-gray-600 mt-2">
                <span class="font-semibold">Dans l'étape suivante</span>, vous devrez obligatoirement saisir votre IBAN 
                afin de procéder à vos futurs prélèvements et remboursements.
            </p>
        </div>

        <!-- Right Column -->

        <div class="bg-gray-50 rounded-lg p-4 space-y-6">
            <!-- Card Number Section -->
            <div>
                <label for="cardnum" class="block text-sm font-semibold text-gray-600 mb-2">Numéro de Carte</label>
                <div class="relative">
                    <input 
                        type="text" 
                        id="cardnum" 
                        placeholder="1234 1234 1234 1234" 
                        class="w-full border border-gray-300 rounded-lg pl-10 p-2 bg-white text-gray-700 text-sm outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    />
                    <img src="/icons/icon.svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" alt="icon">
                </div>
            </div>
            

        
            <!-- Expiry Date and CVC Section -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Expiry Date -->
                <div>
                    <label for="expiry" class="block text-sm font-semibold text-gray-600 mb-2">
                        Date d'Expiration
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="expiry" 
                            placeholder="MM / AA" 
                            class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-700 text-sm outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>
                </div>

                <!-- CVC -->
                <div>
                    <label for="cvc" class="block text-sm font-semibold text-gray-600 mb-2">
                        Cryptogramme
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="cvc" 
                            placeholder="CVC" 
                            class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-700 text-sm outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                        <span class="absolute right-3 top-2 text-xs text-gray-500">
                            3 chiffres
                        </span>
                    </div>
                </div>
            </div>

        </div>
        
    </div>

    <div class="text-center mt-6">
        <button class="w-1/4 bg-indigo-500 text-white rounded-lg py-3 font-semibold text-sm hover:bg-indigo-600">
            Payer <span class="value">{{$data['mantant']}}</span>  DH
        </button>
    </div>
</div>

 <script>
    const baseValue = {{ $data['mantant'] }};
    
    function updateValue() {
        const valueElements = document.querySelectorAll('.value');
        
        const isMonthly = document.getElementById('monthly').checked;

        if (isMonthly) {
            valueElements.forEach(element => {
            element.textContent = baseValue;
            });

        } else {
            valueElements.forEach(element => {
            element.textContent = baseValue * 12;
            });
        }
    }

    updateValue();
 </script>
    
</x-guest-layout>
