@extends($activeTemplate . 'layouts.app')
@section('panel')
    <div class="account-section pt-120 pb-120">
        <div class="container">
            <div class="account-wrapper bg--section">
                <div class="account-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ getImage(getFilePath('logo_icon') . '/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="mb-4">
                    <p>
                        @lang('Your account is verified successfully. Now you can change your password. Please enter a strong password and don\'t share it with anyone.')
                    </p>
                </div>
                <form method="POST" action="{{ route('user.password.update') }}" class="disableSubmission">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label class="form-label">@lang('Password')</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="las la-key"></i>
                            </span>
                            <input type="password"
                                class="form-control cmn--form--control @if (gs('secure_password')) secure-password @endif"
                                name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">@lang('Confirm Password')</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="las la-key"></i>
                            </span>
                            <input type="password" class="form-control cmn--form--control" name="password_confirmation"
                                required>
                        </div>
                    </div>
                    <button type="submit" class="cmn--btn btn-block"> @lang('Submit')</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@if (gs('secure_password'))
    @push('script-lib')
        <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
@endif
