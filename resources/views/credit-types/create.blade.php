<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Credit Type') }}
            </h2>
            <a href="{{ route('credit-types.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] text-sm hover:border-[#1915014a] dark:hover:border-[#62605b] transition-colors duration-200">
                {{ __('Back to List') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <form method="POST" action="{{ route('credit-types.store') }}" class="space-y-6 max-w-xl">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" 
                                         name="name" 
                                         type="text" 
                                         class="mt-1 block w-full" 
                                         :value="old('name')" 
                                         required 
                                         autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                                {{ __('Create Credit Type') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
