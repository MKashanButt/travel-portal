<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Agent Sale') }}
            </h2>
            <a href="{{ route('agent-sales.index') }}"
                class="inline-flex items-center px-4 py-2 border border-[#19140035] dark:border-[#3E3E3A] text-sm hover:border-[#1915014a] dark:hover:border-[#62605b] transition-colors duration-200">
                {{ __('Back to List') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-[#161615] overflow-hidden shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]">
                <div class="p-6 text-gray-900 dark:text-[#EDEDEC]">
                    <form method="POST" action="{{ route('agent-sales.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Credit Type -->
                            <div>
                                <x-input-label for="credit_type_id" :value="__('Credit Type')" />
                                <x-select-input id="credit_type_id" name="credit_type_id">
                                    <option value="">Select Credit Type</option>
                                    @foreach ($creditTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('credit_type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('credit_type_id')" class="mt-2" />
                            </div>

                            <!-- Airline -->
                            <div>
                                <x-input-label for="airline_id" :value="__('Airline')" />
                                <x-select-input id="airline_id" name="airline_id">
                                    <option value="">Select Airline</option>
                                    @foreach ($airlines as $airline)
                                        <option value="{{ $airline->id }}"
                                            {{ old('airline_id') == $airline->id ? 'selected' : '' }}>
                                            {{ $airline->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('airline_id')" class="mt-2" />
                            </div>

                            <!-- GDS -->
                            <div>
                                <x-input-label for="gds_id" :value="__('GDS')" />
                                <x-select-input id="gds_id" name="gds_id">
                                    <option value="">Select GDS</option>
                                    @foreach ($gdsList as $gds)
                                        <option value="{{ $gds->id }}"
                                            {{ old('gds_id') == $gds->id ? 'selected' : '' }}>
                                            {{ $gds->name }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('gds_id')" class="mt-2" />
                            </div>

                            <!-- PCC -->
                            <div>
                                <x-input-label for="pcc_id" :value="__('PCC')" />
                                <x-select-input id="pcc_id" name="pcc_id">
                                    <option value="">Select PCC</option>
                                    @foreach ($pccs as $pcc)
                                        <option value="{{ $pcc->id }}"
                                            {{ old('pcc_id') == $pcc->id ? 'selected' : '' }}>
                                            {{ $pcc->code }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('pcc_id')" class="mt-2" />
                            </div>

                            <!-- PNR Number -->
                            <div>
                                <x-input-label for="pnr_number" :value="__('PNR Number')" />
                                <x-text-input id="pnr_number" name="pnr_number" type="text" class="mt-1 block w-full"
                                    :value="old('pnr_number')" required />
                                <x-input-error :messages="$errors->get('pnr_number')" class="mt-2" />
                            </div>

                            <!-- Passenger Name -->
                            <div>
                                <x-input-label for="pax_name" :value="__('Passenger Name')" />
                                <x-text-input id="pax_name" name="pax_name" type="text" class="mt-1 block w-full"
                                    :value="old('pax_name')" required />
                                <x-input-error :messages="$errors->get('pax_name')" class="mt-2" />
                            </div>

                            <!-- Amount -->
                            <div>
                                <x-input-label for="amount" :value="__('Amount')" />
                                <x-text-input id="amount" name="amount" type="text" class="mt-1 block w-full"
                                    :value="old('amount')" required />
                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                            </div>

                            <!-- Time Limit -->
                            <div>
                                <x-input-label for="time_limit" :value="__('Time Limit')" />
                                <x-text-input id="time_limit" name="time_limit" type="time" class="mt-1 block w-full"
                                    :value="old('time_limit')" required />
                                <x-input-error :messages="$errors->get('time_limit')" class="mt-2" />
                            </div>

                            <!-- Visa Type -->
                            <div>
                                <x-input-label for="visa_type_id" :value="__('Visa Type')" />
                                <x-select-input id="visa_type_id" name="visa_type_id">
                                    <option value="">Select Visa Type</option>
                                    @foreach ($visaTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ old('visa_type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->types }}
                                        </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('visa_type_id')" class="mt-2" />
                            </div>

                            <!-- Comment -->
                            <div class="md:col-span-2">
                                <x-input-label for="comment" :value="__('Comment')" />
                                <x-textarea-input id="comment" name="comment"
                                    rows="3">{{ old('comment') }}</x-textarea-input>
                                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] border border-transparent text-sm text-white dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white transition-colors duration-200">
                                {{ __('Create Sale') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
