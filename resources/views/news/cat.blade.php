@extends('layouts.main')

@section('content')

{{$cat}}

<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

        @forelse($allnews as $key => $news)
        <div class="post-preview">
            <a href="{{ route('news.show', ['id' => $key]) }}">
                <h2 class="post-title">
                    {{$news['title']}}
                </h2>
            </a>
            <p class="post-meta">Опубликовал
                <a href="#">{{$news['author']}}</a>
                в {{$news['created_at']}}
            </p>
        </div>
        <hr>

        @empty
        <h2>Новостей нет</h2>
        @endforelse

        <!-- Pager -->
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
    </div>
</div>

@endsection