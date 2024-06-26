@extends('layout.frontend.frontend')
@section('title', 'IMIE Checker')

@section('content')
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img src="{{ asset($item->thumb) }}" alt="{{ $item->title }}" />
                        </div>
                        <div class="article-title">
                            <h2>{{ $item->title }}</h2>
                        </div>
                        <div class="article-content">
                            <p>
                                {!! $item->description !!}
                            </p>
                        </div>
                        <div class="nav tag-cloud">
                            @foreach ($tags as $tag)
                                <a href="#">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
