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



                <form action="{{ route('admin.account.addcredit') }}" method="POST">
                    @csrf

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="name" :value="__('Account Number')" />
                                <x-input type="text" placeholder="{{ __('Account Number') }}" id="name" value="{{ old('name', $account->account_number) }}" required readonly />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="amount" :value="__('Amount')" />
                                <x-input type="text" name="amount" id="amount" placeholder="{{ __('amount') }}" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="description" :value="__('Description')" />
                                <x-input type="text" name="description" id="description" placeholder="{{ __('description') }}" />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="created_at" :value="__('Date Credited')" />
                                <x-input type="date" name="created_at" id="created_at" placeholder="{{ __('4/4/2022') }}" />
                            </div>
                        </div>
                        <x-input type="hidden" name="account_id" id="amount" placeholder="{{ __('amount') }}" value="{{ $account->id }}" />
                        <x-divider class="mt-6" />

                        <div class="mt-6">
                            <x-button>
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
