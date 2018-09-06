@extends('layouts.app')

@section('title', $user->company )

@section('content')
<div id="cate_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
    </div>
</div>

<div class="container mb40 mt60">
@include('commons.search_form')
</div>
<div class="container mb30" id="recruit">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if( count($jobs) > 0 )
            @foreach ($jobs as $job)
            <?php $user = $job->user; ?>
                @include('jobs.job_all')
            @endforeach
            @else
            <p class="mb40">検索条件に合う募集要項は見つかりませんでした。<br>検索条件を変えて再度、検索していただくか、<a href="{{ route('company.show', ['id' => $user->display_url]) }}">TOPページ</a>にお戻りください。</p>
            @endif
        </div>
    </div>
</div>
@endsection