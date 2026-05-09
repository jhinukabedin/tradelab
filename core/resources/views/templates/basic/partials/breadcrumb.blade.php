@php
    $breadcrumbContent = getContent('breadcrumb.content', true);
@endphp

<section class="hero-section bg--overlay bg_img bg_fixed"
    data-background="{{ frontendImage('breadcrumb', @$breadcrumbContent->data_values->background_image, '1200x600') }}">
    <div class="container">
        <div class="hero-content text-center">
            <h2 class="m-0">{{ __($pageTitle) }}</h2>
        </div>
    </div>
</section>
