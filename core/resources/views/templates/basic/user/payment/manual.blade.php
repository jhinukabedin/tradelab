@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card custom--card">
                    <div class="card-header card-header-bg">
                        <h5 class="card-title">{{ __($pageTitle) }}</h5>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('user.deposit.manual.update') }}" class="disableSubmission" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="alert alert-primary">
                                <p class="mb-0"><i class="las la-info-circle"></i> @lang('You are requesting')
                                    <b>{{ showAmount($data['amount']) }}</b> @lang('to deposit.') @lang('Please pay')
                                    <b>{{ showAmount($data['final_amount'], currencyFormat: false) . ' ' . $data['method_currency'] }}
                                    </b> @lang('for successful payment.')
                                </p>
                            </div>
                            <p class="my-4">
                                @php
                                    echo $data->gateway->description;
                                @endphp
                            </p>
                            <x-viser-form identifier="id" identifierValue="{{ $gateway->form_id }}" />
                            <div class="form-group">
                                <button type="submit" class="cmn--btn btn-block">@lang('Pay Now')</button>
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
        "use strict";
        (function($) {
            $('.form-control').addClass('cmn--form--control')
        })(jQuery);
    </script>
@endpush
