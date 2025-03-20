<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $pcc->name }} ({{ $pcc->code }})
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('pccs.edit', $pcc) }}"
                    class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('pccs.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] rounded-sm text-sm hover:border-[#1915014a] dark:hover:border-[#62605b] transition-colors duration-200">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- PCC Details -->
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <h3 class="text-lg font-medium mb-4">{{ __('PCC Details') }}</h3>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Code') }}</dt>
                            <dd class="mt-1 text-sm">{{ $pcc->code }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Name') }}</dt>
                            <dd class="mt-1 text-sm">{{ $pcc->user->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Created At') }}</dt>
                            <dd class="mt-1 text-sm">{{ $pcc->created_at->format('Y-m-d H:i:s') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Last Updated') }}</dt>
                            <dd class="mt-1 text-sm">{{ $pcc->updated_at->format('Y-m-d H:i:s') }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Related Agent Sales -->
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <h3 class="text-lg font-medium mb-4">{{ __('Related Agent Sales') }}</h3>

                    @if ($pcc->agentSales->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                                <thead class="bg-[#FDFDFC] dark:bg-[#161615]">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                            PNR</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                            Passenger</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                            Amount</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                            Time Limit</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white dark:bg-[#161615] divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                                    @foreach ($pcc->agentSales as $sale)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->pnr_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->pax_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->amount }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->time_limit }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <a href="{{ route('agent-sales.show', $sale) }}"
                                                    class="text-[#f53003] dark:text-[#FF4433] hover:underline underline-offset-4">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">
                            {{ __('No agent sales found for this PCC.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
