@php
    $faqContent = getContent('faq.content', true);
    $faqElements = getContent('faq.element');
@endphp
<div class="faqs-sectioin pt-120 pb-120">
    <div class="container">
        <div class="section__header">
            <h3 class="title">{{ __(@$faqContent->data_values->heading) }}</h3>
            <p>{{ __(@$faqContent->data_values->sub_heading) }}</p>
        </div>
        <div class="faq__wrapper">
            @foreach ($faqElements as $faqElement)
                <div class="faq__item @if ($loop->first) open active @endif">
                    <div class="faq__title">
                        <h6 class="title">{{ __(@$faqElement->data_values->question) }}</h6>
                        <span class="right__icon"></span>
                    </div>
                    <div class="faq__content">
                        <p>{{ __(@$faqElement->data_values->answers) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
