@if (
    @gs('socialite_credentials')->linkedin->status ||
        @gs('socialite_credentials')->facebook->status == Status::ENABLE ||
        @gs('socialite_credentials')->google->status == Status::ENABLE)
    <div class="d-flex flex-wrap social-btn-group">
        <div class="flex-grow-1">
            @if (@gs('socialite_credentials')->google->status == Status::ENABLE)
                <div class="continue-google">
                    <a href="{{ route('user.social.login', 'google') }}" class="btn w-100 social-login-btn">
                        <span class="google-icon">
                            <img src="{{ asset($activeTemplateTrue . 'images/google.svg') }}" alt="Google">
                        </span> @lang('Google')
                    </a>
                </div>
            @endif
        </div>
        <div class="flex-grow-1">
            @if (@gs('socialite_credentials')->facebook->status == Status::ENABLE)
                <div class="continue-facebook">
                    <a href="{{ route('user.social.login', 'facebook') }}" class="btn w-100 social-login-btn">
                        <span class="facebook-icon">
                            <img src="{{ asset($activeTemplateTrue . 'images/facebook.svg') }}" alt="Facebook">
                        </span> @lang('Facebook')
                    </a>
                </div>
            @endif
        </div>
        <div class="flex-grow-1">
            @if (@gs('socialite_credentials')->linkedin->status == Status::ENABLE)
                <div class="continue-facebook">
                    <a href="{{ route('user.social.login', 'linkedin') }}" class="btn w-100 social-login-btn">
                        <span class="facebook-icon">
                            <img src="{{ asset($activeTemplateTrue . 'images/linkdin.svg') }}" alt="Linkedin">
                        </span> @lang('Linkedin')
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="text-center  pt-4 pb-3">
        <span>@lang('OR')</span>
    </div>
@endif
