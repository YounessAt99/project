<x-client-layout>
    <div class="mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Liste des Contrats</h1>

            <a href="{{url('register/step/1')}}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-500 focus:ring focus:ring-indigo-300">
                Ajouter un Nouvel Contrat
            </a>
        </div>

        <!-- Table Responsive -->
        <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 min-w-[800px] text-sm text-gray-600">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                        <th class="border border-gray-300 px-4 py-3 text-left">numéro de police</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">date de Paiement</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Date de Fin de Contrat</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">formule</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Âge</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Race</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Statut du Contrat</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Mantant</th>
                        <th class="border border-gray-300 px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animals as $animal)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->contract->policy_number }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ \Carbon\Carbon::parse($animal->contract->payment->payment_date)->locale('fr')->isoFormat('D MMMM YYYY') }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ \Carbon\Carbon::parse($animal->contract->end_date)->locale('fr')->isoFormat('D MMMM YYYY') }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->contract->formcard->name }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->age->age }} an(s)</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->breed->name }}</td>
                            <td class="border border-gray-300 px-4 py-3 @if($animal->contract->status == 'active') text-green-600 font-semibold @else text-red-600 @endif">
                                {{ $animal->contract->status }}
                            </td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->contract->payment->amount }} MAD</td>
                            <td class="border border-gray-300 px-4 py-3 text-center">
                                <a href="{{ route('contrat.show', ['id' => $animal->id]) }}" class="text-blue-600 hover:text-blue-400 underline">Afficher</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-client-layout>
