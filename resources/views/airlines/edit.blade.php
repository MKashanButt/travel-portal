<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Airline') }}
            </h2>
            <a href="{{ route('airlines.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] rounded-sm text-sm hover:border-[#1915014a] dark:hover:border-[#62605b] transition-colors duration-200">
                {{ __('Back to List') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <form method="POST" action="{{ route('airlines.update', $airline) }}" class="space-y-6 max-w-xl">
                        @csrf
                        @method('PUT')

                        <!-- Code -->
                        <div>
                            <x-input-label for="code" :value="__('Airline Code')" />
                            <x-text-input id="code" 
                                         name="code" 
                                         type="text" 
                                         class="mt-1 block w-full" 
                                         :value="old('code', $airline->code)" 
                                         required 
                                         autofocus />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ __('Enter the unique airline code (e.g., EK, QR, EY)') }}
                            </p>
                        </div>

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Airline Name')" />
                            <x-text-input id="name" 
                                         name="name" 
                                         type="text" 
                                         class="mt-1 block w-full" 
                                         :value="old('name', $airline->name)" 
                                         required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                {{ __('Enter the full airline name (e.g., Emirates, Qatar Airways, Etihad Airways)') }}
                            </p>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent rounded-sm text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                                {{ __('Update Airline') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
