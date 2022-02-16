<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4">
                        <div class="page-title-content">
                            <h3>Security</h3>
                            <p class="mb-2">Welcome to Intez Security page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Settings </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Security</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="settings-menu">
                <a href="{{ route('Account_profile') }}">Profile</a>
                <a href="{{ route('Account_security') }}">Security</a>
                <a href="{{ route('Account_activity') }}">Activity</a>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mx-auto">
                                Two factor authentication
                            </h4>
                            <p class="mr-6" style="width: 75%">{{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="verify-content ">
                                <div class="d-flex align-items-center">
                                    <span class="me-3 icon-circle bg-primary text-white"><i class="ri-smartphone-line"></i></span>
                                    <div class="primary-number">
                                        @if ($this->enabled)
                                            <p class="mb-0"> {{ __('You have enabled two factor authentication.') }}</p>
                                        @else
                                            <p class="mb-0"> {{ __('You have not enabled two factor authentication.') }}</p>
                                        @endif
                                        <span class="text-success">Required</span>
                                    </div>
                                </div>
                                @if (!$this->enabled)
                                    <button class=" btn btn-primary" wire:then="enableTwoFactorAuthentication" wire:loading.attr="disabled">Enable</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($this->enabled)
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($showingQrCode)
                                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                                        <p class="font-semibold">
                                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application.') }}
                                        </p>
                                    </div>

                                    <div class="mt-4">
                                        {!! $this->user->twoFactorQrCodeSvg() !!}
                                    </div>
                                @endif

                                @if ($showingRecoveryCodes)
                                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                                        <p class="font-semibold">
                                            {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                                        </p>
                                    </div>

                                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                                        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                            <div>{{ $code }}</div>
                                        @endforeach
                                    </div>
                                @endif
                @endif

                <div class="mt-5">
                    @if ($this->enabled)
                        @if ($showingRecoveryCodes)
                            <button class=" btn btn-primary" wire:then="regenerateRecoveryCodes" wire:loading.attr="disabled">
                                {{ __('Regenerate Recovery Codes') }}
                            </button>
                        @else
                            <button class=" btn btn-primary" wire:then="showRecoveryCodes" wire:loading.attr="disabled">
                                {{ __('Show Recovery Codes') }}
                            </button>
                        @endif
                        <button class=" btn btn-primary" wire:then="showRecoveryCodes" wire:loading.attr="disabled">
                            {{ __('Disable') }}
                        </button>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
