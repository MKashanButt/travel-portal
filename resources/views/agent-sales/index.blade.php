@php
    $isAdmin = Auth::check() && Auth::user()->isAdmin();
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Agent Sales') }}
            </h2>
            <a href="{{ route('agent-sales.create') }}"
                class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                {{ __('Add New Sale') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
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
                                    Comment</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Status</th>
                                @if ($isAdmin)
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                        Agent</th>
                                @endif
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-[#161615] divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                            @foreach ($agentSales as $sale)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->pnr_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->pax_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->amount }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->time_limit }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $sale->comment }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @switch(strtolower($sale->status))
                                            @case('processing')
                                                <x-warning-button>{{ $sale->status }}</x-warning-button>
                                            @break

                                            @case('issued')
                                                <x-success-button>{{ $sale->status }}</x-success-button>
                                            @break

                                            @default
                                                <x-primary-button>{{ $sale->status }}</x-primary-button>
                                        @endswitch
                                    </td>
                                    @if ($isAdmin)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @isset($sale->user->name)
                                                <x-secondary-button>
                                                    {{ $sale->user->name ?? '' }}
                                                </x-secondary-button>
                                            @endisset
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap text-sm space-x-3">
                                        <a href="{{ route('agent-sales.show', $sale) }}"
                                            class="dark:text-[#FF4433] hover:underline underline-offset-4">View</a>
                                        @if ($isAdmin)
                                            <a href="{{ route('agent-sales.edit', $sale) }}"
                                                class="text-green-500 dark:text-[#FF4433] hover:underline underline-offset-4">Edit</a>
                                            <form action="{{ route('agent-sales.destroy', $sale) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-[#f53003] dark:text-[#FF4433] hover:underline underline-offset-4"
                                                    onclick="return confirm('Are you sure you want to delete this sale?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $agentSales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
