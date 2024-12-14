@extends('layout.frontend.frontend')
@section('title')
    Blogs | Check IMEI Pro
@endsection
@section('content')
    <section class="blog-listing gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-12 m-15px-tb">
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-sm-4">
                                <div class="blog-grid">
                                    <div class="blog-img">
                                        <div class="date">
                                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</span>
                                            <label>{{ \Carbon\Carbon::parse($item->created_at)->format('M') }}</label>
                                        </div>
                                        <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}"
                                            style="width: 100%; display: block; height: 245px;">
                                            <img src="{{ asset($item->thumb) }}" title="{{ $item->title }}"
                                                alt="{{ $item->title }}" style="width: 100%; height: 100%;" />
                                        </a>
                                    </div>
                                    <div class="blog-info">
                                        <h5>
                                            <a
                                                href="{{ route('blog.detail', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                        </h5>
                                        {{-- <p class="blog-desc-short">
                                        {!! $item->description !!}</p> --}}
                                        <div class="btn-bar">
                                            <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}"
                                                class="px-btn-arrow">
                                                <span>Read More</span>
                                                <i class="arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $items->links() }}
    </div>
@endsection
