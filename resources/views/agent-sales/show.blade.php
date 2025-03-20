<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Agent Sale') }}
            </h2>
            <div class="flex gap-4">
                @if (Auth::check() && Auth::user()->isAdmin())
                    <a href="{{ route('agent-sales.edit', $agentSale) }}"
                        class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                        {{ __('Edit') }}
                    </a>
                @endif
                <a href="{{ route('agent-sales.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] rounded-sm text-sm hover:border-[#1915014a] dark:hover:border-[#62605b] transition-colors duration-200">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Basic Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium">{{ __('Basic Information') }}</h3>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('PNR Number') }}:</span>
                                <span class="ml-2">{{ $agentSale->pnr_number }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Passenger Name') }}:</span>
                                <span class="ml-2">{{ $agentSale->pax_name }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Amount') }}:</span>
                                <span class="ml-2">{{ $agentSale->amount }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Time Limit') }}:</span>
                                <span class="ml-2">{{ $agentSale->time_limit }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Comment') }}:</span>
                                <p class="mt-1">{{ $agentSale->comment }}</p>
                            </div>
                        </div>

                        <!-- Related Information -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium">{{ __('Related Information') }}</h3>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Credit Type') }}:</span>
                                <span class="ml-2">{{ $agentSale->creditType?->name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Airline') }}:</span>
                                <span class="ml-2">{{ $agentSale->airline?->name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('GDS') }}:</span>
                                <span class="ml-2">{{ $agentSale->gds?->name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('PCC') }}:</span>
                                <span class="ml-2">{{ $agentSale->pcc?->name ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Visa Type') }}:</span>
                                <span class="ml-2">{{ $agentSale->visaType?->types ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('User') }}:</span>
                                <span class="ml-2">{{ $agentSale->user?->name ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <!-- Timestamps -->
                        <div class="md:col-span-2 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Created at') }}:</span>
                                    <span class="ml-2">{{ $agentSale->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div>
                                    <span class="text-[#706f6c] dark:text-[#A1A09A]">{{ __('Last updated') }}:</span>
                                    <span class="ml-2">{{ $agentSale->updated_at->format('Y-m-d') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
