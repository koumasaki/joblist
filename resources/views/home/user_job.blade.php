@extends('layouts.app')

@section('title', $job->job_name. ' | '. $user->company )

@section('content')
<div id="main_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
        <h2 id="copy">キャッチコピーが入ります（20文字まで）</h2>
    </div>
</div>

<div class="container mb50">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $job->job_name }}</h1>
            <hr>
            @if(!is_null($job->job_image))
            <div class="row">
                <div class="col-sm-8">
                    <p class="mb40">{!! nl2br(e($job->detail)) !!}</p>
                </div>
                <div class="col-sm-4 mb40">
                    <div class="job_img">
                        <div class="inner_img">
                            <div class="img_f"><img src="{{ asset('images/job_image/'. $job->job_image) }}"></div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p class="mb40">{!! nl2br(e($job->detail)) !!}</p>
            @endif
            <table class="table-wide mb30">
                <tbody>
                    <tr>
                        <th>対象となる方</th>
                        <td>{!! nl2br(e($job->qualification)) !!}</td>
                    </tr>
                    <tr>
                        <th>給与</th>
                        <td>{!! nl2br(e($job->salary)) !!}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center"><a href="">エントリーする</a></div>
        </div>
    </div>
</div>
@endsection