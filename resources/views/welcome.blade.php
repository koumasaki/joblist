@extends('layouts.users_app')

@section('title', ' | TOPページ')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>TOPページ</h1>
            <hr>
            <p>便宜的にTOPページを表示。本当は必要ない。</p>
            <ul>
                @foreach($jobs as $job)
                <li><a href="{{ $job->user->display_url }}/job_{{ $job->id }}">{{ $job->job_name }}</a>（<a href="{{ $job->user->display_url }}/">{{ $job->user->company }}</a>）</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection