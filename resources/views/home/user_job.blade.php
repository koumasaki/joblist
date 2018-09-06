@extends('layouts.app')

@section('title', $job->job_name. ' | '. $user->company )

@section('content')
<div id="cate_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
    </div>
</div>

<div class="container mb50">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $job->job_name }}<span class="status"><?php 
                switch($job->job_status) {
                    case 'regular':
                        echo '正社員';
                        break;
                    case 'contractor':
                        echo '契約社員';
                        break;
                    case 'parttime':
                        echo 'パート';
                        break;
                    case 'arbite':
                        echo 'アルバイト';
                        break;
                    case 'temp':
                        echo '派遣社員';
                        break;
                    case 'commission':
                        echo '嘱託';
                        break;
                    case 'others':
                        echo 'その他';
                        break;
                }
                ?></span></h1>
            <hr>
            @if(!is_null($job->job_image))
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="job_copy_detail">{{ $job->job_copy }}</h4>
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
            <h4 class="job_copy_detail">{{ $job->job_copy }}</h4>
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
                    <tr>
                        <th>諸手当</th>
                        <td>{!! nl2br(e($job->allowance)) !!}</td>
                    </tr>
                    <tr>
                        <th>勤務地</th>
                        <td>{!! nl2br(e($job->place)) !!}</td>
                    </tr>
                    <tr>
                        <th>勤務時間</th>
                        <td>{!! nl2br(e($job->time)) !!}</td>
                    </tr>
                    <tr>
                        <th>昇給・賞与</th>
                        <td>{!! nl2br(e($job->bonus)) !!}</td>
                    </tr>
                    <tr>
                        <th>待遇・福利厚生</th>
                        <td>{!! nl2br(e($job->benefit)) !!}</td>
                    </tr>
                    @if(!is_null($job->add_title))
                    <tr>
                        <th>{{ $job->add_title }}</th>
                        <td>{!! nl2br(e($job->add_body)) !!}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <h3>応募方法</h3>
            <table class="table-wide mb30">
                <tbody>
                    <tr>
                        <th>連絡先</th>
                        <td>{{ $user->company }}<br>
                            {{ $user->zip }} {{ $user->address }}<br>
                            TEL：{{ $user->tel }}@if(!is_null($user->section))／{{$user->section}}@endif</td>
                    </tr>
                    <tr>
                        <th>応募方法</th>
                        <td>{!! nl2br(e($job->entry_method)) !!}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">@if($job->simple_form === 'simple')
            <a href="{{ route('light.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}" class="btn btn-danger btn-lg">エントリーする</a>
            @else<a href="{{ route('entry.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}" class="btn btn-danger btn-lg">エントリーする</a>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection