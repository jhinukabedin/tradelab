@extends($activeTemplate . 'layouts.frontend')
@php
    $bannerContent = getContent('banner.content', true);
    $bannerElements = getContent('banner.element', limit: 4);
@endphp
@section('content')
    <section class="banner-section bg--overlay bg_img"
        data-background="{{ frontendImage('banner', @$bannerContent->data_values->background_image, '1000x560') }}">
        <div class="container">
            <div class="banner-wrapper">
                <div class="banner-content mt-xl-5">
                    <h2 class="banner-title">{{ __(@$bannerContent->data_values->heading) }}</h2>
                    <p class="banner-text">{{ __(@$bannerContent->data_values->sub_heading) }}</p>
                    <a href="{{ @$bannerContent->data_values->button_url }}" class="cmn--btn">
                        {{ __(@$bannerContent->data_values->button_name) }}
                    </a>
                </div>
                <div class="banner-thumb">
                    <img src="{{ frontendImage('banner', @$bannerContent->data_values->hero_image, '1000x870') }}">
                    <div class="banner-anime-thumbs">
                        @foreach ($bannerElements as $bannerElement)
                            <div class="banner-anime banner-anime{{ $loop->iteration }}">
                                <img src="{{ frontendImage('banner', @$bannerElement->data_values->background_image, '70x185') }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif
@endsection
