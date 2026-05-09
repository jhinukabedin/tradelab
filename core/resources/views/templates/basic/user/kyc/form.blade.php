@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card custom--card">
                    <div class="card-body">
                        <form action="{{ route('user.kyc.submit') }}" method="post" enctype="multipart/form-data"
                            class="disableSubmission">
                            @csrf
                            <x-viser-form identifier="act" identifierValue="kyc" />
                            <div class="form-group">
                                <button type="submit" class="btn cmn--btn w-100">@lang('Submit')</button>
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
        (function($) {
            "use strict";
            $('.select2').select2();

            window.addEventListener('DOMContentLoaded', () => {
                Array.from(document.querySelectorAll(`input[type=checkbox]`)).forEach((checkbox, i) => {
                    if (checkbox.hasAttribute('id')) {
                        let id = checkbox.getAttribute('id') + '_' + i;
                        checkbox.setAttribute('id', id);
                        checkbox.nextSibling.nextElementSibling.setAttribute('for', id);
                    }
                })
            });

            $('.form-control').addClass("cmn--form--control").removeClass('form--control');
        })(jQuery)
    </script>
@endpush
