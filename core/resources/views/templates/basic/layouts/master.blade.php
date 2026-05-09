@extends($activeTemplate . 'layouts.app')
@section('panel')
    @include($activeTemplate . 'partials.auth_header')

    @include($activeTemplate . 'partials.breadcrumb')

    <div class="dashboard-section pt-120 pb-120 bg--section">
        @yield('content')
    </div>

    @include($activeTemplate . 'partials.footer')
@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/css/select2.min.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/global/js/select2.min.js') }}"></script>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            $('.showFilterBtn').on('click', function() {
                $('.responsive-filter-card').slideToggle();
            });

            Array.from(document.querySelectorAll('table')).forEach(table => {
                let heading = table.querySelectorAll('thead tr th');
                Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
                    Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                        colum.setAttribute('data-label', heading[i].innerText)
                    });
                });
            });

            ///customize confirmation modal
            window.addEventListener('DOMContentLoaded', function(e) {
                let confirmationModal = $('#confirmationModal');
                if (confirmationModal.length > 0) {
                    $(confirmationModal).addClass('custom--modal');
                    $(confirmationModal).find('.close').remove();
                    $(confirmationModal).addClass('p-4');
                    $(confirmationModal).find('.modal-body').addClass('p-4');
                    $(confirmationModal).find('.modal-header').append(`
                    <span type="button" data-bs-dismiss="modal">
                        <i class="las la-times"></i>
                    </span>
                    `);
                    $(confirmationModal).find('.btn--primary').addClass('btn--base').removeClass(
                        'btn--primary');
                }
            });
        })(jQuery)
    </script>
@endpush
