<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Breed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">Name</th>
                                    <th class="py-2 px-4 border-b">Expected Life</th>
                                    <th class="py-2 px-4 border-b">Breed Type</th>
                                    <th class="py-2 px-4 border-b">Breed Factor</th>
                                    <th class="py-2 px-4 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($breeds as $breed)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $breed->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $breed->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $breed->expected->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $breed->breedTyp->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $breed->breed_factor }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="" class="bg-blue-500 text-white px-2 py-1 rounded text-sm">View</a>
                                            <a href="" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$breeds->links()}}
                </div>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
