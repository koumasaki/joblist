@extends('layouts.app')

@section('title',  'エントリー内容確認 | '. $user->company )

@section('content')
<div id="cate_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
    </div>
</div>

<div class="container mb50">
    <div class="row">
        <div class="col-xs-12">
            <div class="job_name">
                <h1>エントリー内容確認</h1>
            </div>
            <p class="mb30">入力内容をご確認いただき、誤りがないことをご確認のうえ、送信ボタンをクリックしてください。</p>
            {!! Form::open(['route' => ['entry.post', $user->display_url, $job->id], 'class' => 'form-horizontal']) !!}
                <table class="table-wide mb20">
                    <tbody>
                        <tr>
                            <th>希望職種</th>
                            <td>{{ $job->job_name }}<input type="hidden" id="job_name" name="job_name" value="{{ $job->job_name }}"></td>
                        </tr>
                        <tr>
                            <th>希望勤務地</th>
                            <td>{{ $job->place }}<input type="hidden" id="job_place" name="job_place" value="{{ $job->place }}"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-form mb40">
                    <tbody>
                        <tr>
                            <th>氏名</th>
                            <td>{{ $entry->name }}<input type="hidden" id="name" name="name" value="{{ $entry->name }}"></td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $entry->gender }}<input type="hidden" id="gender" name="gender" value="{{ $entry->gender }}"></td>
                        </tr>
                        <tr>
                            <th>生年月日</th>
                            <td>{{ $entry->year }}年{{ $entry->month }}月{{ $entry->day }}日
                            <input type="hidden" id="year" name="year" value="{{ $entry->year }}">
                            <input type="hidden" id="month" name="month" value="{{ $entry->month }}">
                            <input type="hidden" id="day" name="day" value="{{ $entry->day }}"></td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $entry->mail }}<input type="hidden" id="mail" name="mail" value="{{ $entry->mail }}"></td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{ $entry->tel }}<input type="hidden" id="tel" name="tel" value="{{ $entry->tel }}"></td>
                        </tr>
                        <tr>
                            <th>郵便番号（7桁）</th>
                            <td>{{ $entry->zip }}<input type="hidden" id="zip" name="zip" value="{{ $entry->zip }}"></td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>{{ $entry->address }}<input type="hidden" id="address" name="address" value="{{ $entry->address }}"></td>
                        </tr>
                        @if($entry->myself)
                        <tr>
                            <th>自己PR</th>
                            <td>{!! nl2br(e($entry->myself)) !!}<input type="hidden" id="myself" name="myself" value="{{ $entry->myself }}"></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-5 col-md-offset-2 text-center mb15">
                        {!! Form::submit('送信する', ['name' => 'action', 'class' => 'btn btn-primary btn-block btn-lg']) !!}
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 text-center mb15">
                        {!! Form::submit('戻る', ['name' => 'action', 'class' => 'btn btn-block btn-lg']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection