@php
    $isAdmin = Auth::check() && Auth::user()->isAdmin();
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Agent Refund') }}
            </h2>
            <a href="{{ route('refund.create') }}"
                class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                {{ __('Add New Refund') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <table class="table">
                        <thead class="table-head">
                            <tr>
                                <th class="table-head-cell">
                                    PNR</th>
                                <th class="table-head-cell">
                                    Passenger</th>
                                <th class="table-head-cell">
                                    Amount</th>
                                <th class="table-head-cell">
                                    Comment</th>
                                @if ($isAdmin)
                                    <th class="table-head-cell">
                                        Agent</th>
                                    <th class="table-head-cell">
                                        Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach ($agentSales as $sale)
                                <tr>
                                    <td class="table-cell">{{ $sale->pnr_number }}</td>
                                    <td class="table-cell">{{ $sale->pax_name }}</td>
                                    <td class="table-cell">{{ $sale->amount }}</td>
                                    <td class="table-cell">{{ $sale->comment }}</td>
                                    @if ($isAdmin)
                                        <td class="table-cell">
                                            @isset($sale->user->name)
                                                <x-secondary-button>
                                                    {{ $sale->user->name ?? '' }}
                                                </x-secondary-button>
                                            @endisset
                                        </td>
                                    @endif
                                    @if ($isAdmin)
                                        <td class="table-cell space-x-3">
                                            <a href="{{ route('agent-sales.show', $sale) }}"
                                                class="dark:text-[#FF4433] hover:underline underline-offset-4">View</a>
                                            <form action="{{ route('refund.destroy', $sale) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-[#f53003] dark:text-[#FF4433] hover:underline underline-offset-4"
                                                    onclick="return confirm('Are you sure you want to delete this sale?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    @endif
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
