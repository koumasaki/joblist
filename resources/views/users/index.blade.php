@extends('layouts.users_app')

@section('title', ' | TOPページ')


@section('content')
    @if (Auth::check())
    <div class="row">
        <div class="col-md-12">
            <h1>公開中の募集要項</h1>
            <hr>
            @if($count_jobs > 0)
            <table class="table mb50 table-view">
                <thead>
                    <tr>
                        <th>募集職種名</th>
                        <th>雇用形態</th>
                        <th>勤務地</th>
                        <th>公開設定</th>
                        <th>操作</th>
                        <th>件数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <tr class="gray">
                        <td rowspan="2">{{ $job->job_name }}</td>
                        <td><?php 
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
                        ?></td>
                        <td><?php 
                                    if (mb_strlen($job->place) < 20) {
                                        $jobplace = $job->place;
                                        echo $job->place;
                                    } else {
                                        $jobplace = mb_substr( $job->place, 0, 20);
                                        echo $jobplace. '...';
                                    }
                                     ?></td>
                        <td rowspan="2">@if($job->release === 'release')<?php echo '公開'; ?>@else<?php echo '未公開'; ?>@endif</td>
                        <td rowspan="2">
                            {!! link_to_route('job.edit', '編集', ['id' => $job->id], ['class'=>'btn btn-primary btn-xs']) !!}
                            {!! Form::open(['route' => ['job.getCopy', $job->id], 'method' => 'post']) !!}
                                {!! Form::submit('複製', ['class' => 'btn btn-success btn-xs']) !!}
                            {!! Form::close() !!}
                            {!! Form::open(['route' => ['job.delete', $job->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td rowspan="2">{{ $job->entries()->count() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">備考：{{ $job->memo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="mb40">募集要項は登録されていません。</p>
            @endif

            <h1>本日受付のエントリー</h1>
            <hr>
            @if( count($entries) > 0 )
            <div class="table-responsive">
                <table class="table mb50 table-view">
                    <thead>
                        <tr>
                            <th>氏名</th>
                            <th>進捗状況</th>
                            <th>応募日</th>
                            <th>性別</th>
                            <th>生年月日</th>
                            <th>メールアドレス</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $entry)
                        <tr class="gray">
                            <td rowspan="2" class="table-name"><a href="{{ route('entry.show', ['id' => $entry->id]) }}">{{ $entry->name }}</a></td>
                            <td rowspan="2" >{{ $entry->status }}</td>
                            <td>{{ $entry->created_at->format('Y年m月d日') }}</td>
                            <td>{{ $entry->gender }}</td>
                            <td>{{ $entry->birthday }}</td>
                            <td><a href="mailto:{{ $entry->mail }}">{{ $entry->mail }}</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="fs13">
                                <strong class="red">応募職種：</strong>{{ $entry->job_name }}　<strong class="red">勤務地：</strong><?php 
                                    if (mb_strlen($entry->job_place) < 20) {
                                        $place = $entry->job_place;
                                        echo $entry->job_place;
                                    } else {
                                        $place = mb_substr( $entry->job_place, 0, 20);
                                        echo $place. '...';
                                    }
                                     ?>
                            </td>
                            <td>{!! Form::model($entry, ['route' => ['entry.update', $entry->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                                    <div class="form-inline">進捗更新：
                                    {!! Form::select('status', ['' => '-選択-', '未対応' => '未対応', '書類選考' => '書類選考', '一次面接呼出' => '一次面接呼出', '二次面接呼出' => '二次面接呼出', '最終面接呼出' => '最終面接呼出', '内定' => '内定', '不合格' => '不合格'], old('status'), ['class'=>'form-control']) !!}
                                    {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="mb40">エントリーデータは登録されていません。</p>
            @endif
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center mb20">
                <h1>TOPログイン</h1>
                <hr>
            </div>
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                    {!! Form::label('email', 'Eメール:') !!}
                    {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
                    <span class="help-block">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('password'))) has-error @endif">
                    {!! Form::label('password', 'パスワード:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                    <span class="help-block">{{$errors->first('password')}}</span>
                </div>
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block mt40']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    @endif
@endsection