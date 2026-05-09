@php
    $blogContent = getContent('blog.content', true);
    $blogElements = getContent('blog.element', limit: 3);
@endphp
<section class="blog-section bg--section pt-120 pb-120">
    <div class="container">
        <div class="section__header">
            <h3 class="title">{{ __(@$blogContent->data_values->heading) }}</h3>
            <p> {{ __(@$blogContent->data_values->sub_heading) }} </p>
        </div>
        <div class="row justify-content-center">
            @foreach ($blogElements as $blogElement)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="post__item h-100">
                        <div class="post__thumb">
                            <a href="{{ @$blogElement->slug ? route('blog.details', @$blogElement->slug) : '' }}">
                                <img src="{{ frontendImage('blog', 'thumb_' . @$blogElement->data_values->image, '430x210') }}">
                            </a>
                        </div>
                        <div class="post__content">
                            <h6 class="post__title">
                                <a href="{{ route('blog.details', @$blogElement->slug) }}">
                                    {{ __(@$blogElement->data_values->title) }}
                                </a>
                            </h6>
                            <div class="meta__date">
                                <div class="meta__item">
                                    <i class="las la-calendar"></i>
                                    {{ showDateTime($blogElement->created_at, 'd M Y') }}
                                </div>
                            </div>
                            <div class="blog-short-desc">
                                <a href="{{ @$blogElement->slug ? route('blog.details', @$blogElement->slug) : '' }}">
                                    {{ strLimit(__(strip_tags(@$blogElement->data_values->description)), 120) }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
