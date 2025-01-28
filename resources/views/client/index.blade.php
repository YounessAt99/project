<x-client-layout>
    <div class="mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Liste des Animaux</h1>

            <a href="{{url('register/step/1')}}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:bg-indigo-500 focus:ring focus:ring-indigo-300">
                Ajouter un Nouvel Animal
            </a>
        </div>

        <!-- Table Responsive -->
        <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 min-w-[800px] text-sm text-gray-600">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
                        <th class="border border-gray-300 px-4 py-3 text-left">Image</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Nom</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Sexe</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Âge</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Race</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Type de Race</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Date fine de contrat</th>
                        <th class="border border-gray-300 px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animals as $animal)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border border-gray-300 px-4 py-3">
                                @if($animal->image)
                                    <img src="{{ asset('storage/' . $animal->image) }}" alt="{{ $animal->name }}" class="w-16 h-16 object-cover rounded-lg">
                                @else
                                    <span class="text-gray-500 italic">Aucune image</span>
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->name }}</td>
                            <td class="border border-gray-300 px-4 py-3 capitalize">{{ $animal->sexe }}</td>
            
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->age->age }} an(s)</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->breed->name }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{ $animal->breedType->name }}</td>
                            <td class="border border-gray-300 px-4 py-3">{{\Carbon\Carbon::parse($animal->contract->date_end)->locale('fr')->isoFormat('D MMMM YYYY')}}</td>
                            <td class="border border-gray-300 px-4 py-3 text-center">
                                <a href="{{route('show',['id'=>$animal->id])}}" class="text-blue-600 hover:text-blue-400 underline">Afficher</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-client-layout>
