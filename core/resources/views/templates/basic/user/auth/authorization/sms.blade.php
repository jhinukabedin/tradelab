@extends($activeTemplate . 'layouts.app')
@section('panel')
    <div class="account-section pt-120 pb-120">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="verification-code-wrapper bg--section">
                    <div class="verification-area">
                        <div class="account-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ getImage(getFilePath('logo_icon') . '/logo.png') }}">
                            </a>
                        </div>
                        <h5 class="pb-3 text-center border-bottom mb-3">@lang('Verify Mobile Number')</h5>
                        <form action="{{ route('user.verify.mobile') }}" method="POST" class="submit-form disableSubmission">
                            @csrf
                            <p class="verification-text mt-3">
                                @lang('A 6 digit verification code sent to your mobile number') :
                                +{{ showMobileNumber(auth()->user()->mobile) }}
                            </p>
                            @include($activeTemplate . 'partials.verification_code')
                            <div class="mb-3">
                                <button type="submit" class="cmn--btn btn-block">@lang('Submit')</button>
                            </div>
                            <div class="form-group">
                                <p>
                                    @lang('If you don\'t get any code'),
                                    <span class="countdown-wrapper">
                                        @lang('try again after')
                                        <span id="countdown" class="fw-bold">--</span>
                                        @lang('seconds')
                                    </span>
                                    <a href="{{ route('user.send.verify.code', 'sms') }}" class="try-again-link d-none">
                                        @lang('Try again')
                                    </a>
                                </p>
                                <a href="{{ route('user.logout') }}">@lang('Logout')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        var distance = Number("{{ @$user->ver_code_send_at->addMinutes(2)->timestamp - time() }}");
        var x = setInterval(function() {
            distance--;
            document.getElementById("countdown").innerHTML = distance;
            if (distance <= 0) {
                clearInterval(x);
                document.querySelector('.countdown-wrapper').classList.add('d-none');
                document.querySelector('.try-again-link').classList.remove('d-none');
            }
        }, 1000);
    </script>
@endpush

@push('style')
    <style>
        .verification-code input {
            color: #ffffff !important;
        }

        .verification-code-wrapper {
            width: unset;
            border: unset;
            max-width: 550px;
            padding: 45px;
            border-radius: 10px;
        }

        .verification-code input {
            letter-spacing: 60px !important;
            padding-left: 35px !important;
        }
    </style>
@endpush
