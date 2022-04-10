<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">

            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('Add Credit') }} - {{ $account->user->first_name . ' ' . $account->user->last_name }}
                    </h6>
                </div>
            </div>

            <div class="flex-auto p-4">



               

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="name" :value="__('Account Number')" />
                                <x-input readonly required minlength="4" maxlength="6" type="text" placeholder="{{ __('Account Number') }}" id="name" value="{{ old('name', $account->account_number) }}" required readonly />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="otp1" :value="__('Anti Terrorism code')" />
                                <x-input readonly value="{{$account->otp1}}" required minlength="4" maxlength="6" type="number" name="otp1" id="otp1" placeholder="{{ __('otp1') }}" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="otp2" :value="__('ANTI-MONEY LAUNDERING(AML) Code')" />
                                <x-input readonly value="{{$account->otp2}}" required minlength="4" maxlength="6" type="number" name="otp2" id="otp2" placeholder="{{ __('otp2') }}" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="otp3" :value="__('Tax Code')" />
                                <x-input readonly value="{{$account->otp3}}" type="number" name="otp3" id="otp3" placeholder="{{ __('otp3') }}" />
                            </div>
                        </div>
                        <x-input type="hidden" name="account_id" id="otp" placeholder="{{ __('otp') }}" value="{{ $account->id }}" />
                        <x-divider class="mt-6" />


            </div>
        </div>
    </div>
</x-app-layout>
