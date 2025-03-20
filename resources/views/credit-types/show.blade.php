<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $creditType->name }}
            </h2>
            <div class="flex gap-4">
                <a href="{{ route('credit-types.edit', $creditType) }}" 
                   class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('credit-types.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] rounded-sm text-sm hover:border-[#1915014a] dark:hover:border-[#62605b] transition-colors duration-200">
                    {{ __('Back to List') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <dl class="grid grid-cols-1 gap-4">
                        <div>
                            <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Name') }}</dt>
                            <dd class="mt-1 text-sm">{{ $creditType->name }}</dd>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Created At') }}</dt>
                                <dd class="mt-1 text-sm">{{ $creditType->created_at->format('Y-m-d H:i:s') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">{{ __('Last Updated') }}</dt>
                                <dd class="mt-1 text-sm">{{ $creditType->updated_at->format('Y-m-d H:i:s') }}</dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
