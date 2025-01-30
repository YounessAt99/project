<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- dashboard --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Total Clients Card -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-2">Total Clients</h2>
                            <p class="text-3xl">{{ $totalClients }}</p>
                        </div>
                    
                        <!-- Total Contracts Card -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-2">Total Contracts</h2>
                            <p class="text-3xl">{{ $totalContracts }}</p>
                        </div>
                    
                        <!-- Total Payments Card -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-2">Total Payments</h2>
                            <p class="text-3xl">${{ number_format($totalPayments, 2) }}</p>
                        </div>
                    </div>
                    
                    <!-- Chart -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-4">Payments Over Time</h2>
                        <canvas id="paymentsChart" class="w-full h-64"></canvas>
                    </div>
                    
                    <script>
                        const ctx = document.getElementById('paymentsChart').getContext('2d');
                        const paymentsChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                                datasets: [{
                                    label: 'Payments',
                                    data: [500, 1000, 800, 1200, 1500, 900, 1300],
                                    borderColor: 'rgba(79, 70, 229, 1)',
                                    borderWidth: 2,
                                    fill: false
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
