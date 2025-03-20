<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <x-stats-card title="Total Sales" :value="$stats['total_sales']">
                    <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Agent sales recorded</p>
                </x-stats-card>

                <x-stats-card title="Airlines" :value="$stats['total_airlines']">
                    <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Active airlines</p>
                </x-stats-card>

                <x-stats-card title="GDS" :value="$stats['total_gds']">
                    <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Global distribution systems</p>
                </x-stats-card>

                <x-stats-card title="PCCs" :value="$stats['total_pccs']">
                    <p class="mt-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">Pseudo city codes</p>
                </x-stats-card>
            </div>

            <!-- Recent Sales -->
            <div class="bg-white dark:bg-[#161615] border border-[#19140035] dark:border-[#3E3E3A]">
                <div class="px-6 py-4 border-b border-[#19140035] dark:border-[#3E3E3A]">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Recent Sales</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#19140035] dark:divide-[#3E3E3A]">
                        <thead>
                            <tr class="bg-[#FDFDFC] dark:bg-[#161615]">
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    PNR</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Passenger</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Airline</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    GDS</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    PCC</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Amount</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#19140035] dark:divide-[#3E3E3A]">
                            @foreach ($recentSales as $sale)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sale->pnr_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sale->pax_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sale->airline->name ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sale->gds->name ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sale->pcc->name ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                        {{ $sale->amount }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-[#19140035] dark:border-[#3E3E3A]">
                    <a href="{{ route('agent-sales.index') }}"
                        class="text-[#13274F] dark:text-[#13274F] hover:underline text-sm">
                        View all sales
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
