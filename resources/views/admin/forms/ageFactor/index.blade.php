<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Age Factor') }}
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
                                    <th class="py-2 px-4 border-b">Value</th>
                                    <th class="py-2 px-4 border-b">Expected Life</th>
                                    <th class="py-2 px-4 border-b">Age</th>
                                    <th class="py-2 px-4 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ageFactors as $age)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $age->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $age->value }}</td>
                                        <td class="py-2 px-4 border-b">{{ $age->expectedLife->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $age->age->age }} an(s)</td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="" class="bg-blue-500 text-white px-2 py-1 rounded text-sm">View</a>
                                            <a href="" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$ageFactors->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
