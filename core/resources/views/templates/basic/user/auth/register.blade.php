@extends($activeTemplate . 'layouts.frontend')
@section('panel')
    @if (gs('registration'))
        <div class="account-section pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="account-wrapper bg--section mw-100">
                            <div class="account-logo text-center">
                                <a href="{{ route('home') }}">
                                    <img src="{{ getImage(getFilePath('logo_icon') . '/logo.png') }}">
                                </a>
                                <h4 class="text-center mt-2">@lang('Sign Up')</h4>
                            </div>
                            @include($activeTemplate . 'partials.social_login')
                            <form action="{{ route('user.register') }}" method="POST" class="verify-gcaptcha disableSubmission account-form">
                                @csrf
                                <div class="row">
                                    @if (session()->get('reference') != null)
                                        <div class="col-12">
                                            <div class="form-group cmn--form--group">
                                                <label for="referenceBy" class="cmn--label text--white">@lang('Reference by')</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="las la-user"></i>
                                                    </span>
                                                    <input type="text" name="referBy" id="referenceBy"
                                                        class="form-control cmn--form--control bg--section" value="{{ session()->get('reference') }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="cmn--form--group form-group col-md-6">
                                        <label class="cmn--label text--white">@lang('First Name')</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="las la-user-circle"></i>
                                            </span>
                                            <input type="text" class="form-control cmn--form--control checkUser" name="firstname"
                                                value="{{ old('firstname') }}" required>
                                        </div>
                                    </div>
                                    <div class="cmn--form--group form-group col-md-6">
                                        <label class="cmn--label text--white">@lang('Last Name')</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="las la-user-tie"></i>
                                            </span>
                                            <input type="text" class="form-control cmn--form--control checkUser" name="lastname"
                                                value="{{ old('lastname') }}" required>
                                        </div>
                                    </div>
                                    <div class="cmn--form--group form-group col-md-12">
                                        <label class="cmn--label text--white">@lang('Email Address')</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="las la-envelope"></i>
                                            </span>
                                            <input type="email" class="form-control cmn--form--control checkUser" name="email"
                                                value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 cmn--form--group form-group">
                                        <label class="cmn--label text--white">@lang('Password')</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="las la-key"></i>
                                            </span>
                                            <input type="password"
                                                class="form-control cmn--form--control @if (gs('secure_password')) secure-password @endif"
                                                name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 cmn--form--group form-group">
                                        <label class="cmn--label text--white">@lang('Confirm Password')</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="las la-key"></i>
                                            </span>
                                            <input type="password" class="form-control cmn--form--control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <x-captcha hasIcon="true" />
                                </div>
                                @if (gs('agree'))
                                    @php
                                        $policyPages = getContent('policy_pages.element', false);
                                    @endphp
                                    <div class="form-group">
                                        <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                                        <label for="agree">@lang('I agree with')</label>
                                        <span>
                                            @foreach ($policyPages as $policy)
                                                <a class="text--base" href="{{ route('policy.pages', @$policy->slug) }}" target="_blank">
                                                    {{ __($policy->data_values->title) }}
                                                </a>
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <button type="submit" id="recaptcha" class="cmn--btn btn-block">
                                        @lang('Register')
                                    </button>
                                </div>
                                <p class="mb-0">@lang('Already have an account?')
                                    <a class="text--base" href="{{ route('user.login') }}">@lang('Login')</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade custom--modal" id="existModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                        <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </span>
                    </div>
                    <div class="modal-body py-4">
                        <h6 class="text-center">@lang('You already have an account please Login ')</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
                        <a href="{{ route('user.login') }}" class="btn btn--base btn--sm">@lang('Login')</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include($activeTemplate . 'partials.registration_disabled')
    @endif
@endsection

@if (gs('registration'))
    @if (gs('secure_password'))
        @push('script-lib')
            <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
        @endpush
    @endif
@endif

@if (gs('registration'))
    @push('script')
        <script>
            (function($) {
                "use strict";

                $('.checkUser').on('focusout', function(e) {
                    var url = '{{ route('user.checkUser') }}';
                    var value = $(this).val();
                    var token = '{{ csrf_token() }}';

                    var data = {
                        email: value,
                        _token: token
                    }

                    $.post(url, data, function(response) {
                        if (response.data != false) {
                            $('#existModalCenter').modal('show');
                        }
                    });
                });
            })(jQuery);
        </script>
    @endpush
@endif
