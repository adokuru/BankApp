<x-app-layout>

    <div class="w-full p-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        My account
                    </h6>

                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        User Information
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Username
                                </label>
                                <input  value="{{ $account->user->username }}" required name="username" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="lucky.jesse" spellcheck="false" data-ms-editor="true">
                                <editor-squiggler>
                                    <style>
                                        @media print {
                                            .ms-editor-squiggles-container {
                                                display: none !important;
                                            }
                                        }

                                        .ms-editor-squiggles-container {
                                            all: initial;
                                        }

                                    </style>
                                    <div class="ms-editor-squiggles-container"></div>
                                </editor-squiggler>
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Email address
                                </label>
                                <input  value="{{ $account->user->email }}" required name="email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="jesse@example.com">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    First Name
                                </label>
                                <input  value="{{ $account->user->first_name }}" required name="first_name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Lucky" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Last Name
                                </label>
                                <input value="{{ $account->user->last_name }}" required name="last_name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Jesse" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 border-blueGray-300">

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Contact Information
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Address
                                </label>
                                <input required value="{{ $account->user->address    }}" name="address" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" spellcheck="false" data-ms-editor="true">
                                <editor-squiggler>
                                    <style>
                                        @media print {
                                            .ms-editor-squiggles-container {
                                                display: none !important;
                                            }
                                        }

                                        .ms-editor-squiggles-container {
                                            all: initial;
                                        }

                                    </style>
                                    <div class="ms-editor-squiggles-container"></div>
                                </editor-squiggler>
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    City
                                </label>
                                <input required value="{{ $account->user->city }}" name="city" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="New York">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Country
                                </label>
                                <input  value="{{ $account->user->id }}" type="hidden" name="id">
                                <input required value="{{ $account->user->country }}" name="country" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="United States" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Postal Code
                                </label>
                                <input required value="{{ $account->user->postal_code }}" name="postal_code" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Postal Code" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                                    Phone Number
                                </label>
                                <input required value="{{ $account->user->phone }}" name="phone" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Jesse" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                    </div>

                    <br />
                    <button type="submit" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                        Update
                    </button>
                    <a href="{{ route('admin.account.delete', $account->id) }}" onclick="return confirm('Are you sure?')" class="bg-red-900 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="button">
                        Delete Account
                    </a>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
