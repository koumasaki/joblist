@extends('layouts.users_app')

@section('title', ' | 募集要項一覧')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>募集要項一覧</h1>
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
                        <td>{{ $job->place }}</td>
                        <td rowspan="2">@if($job->release === 'release')<?php echo '公開'; ?>@else<?php echo '未公開'; ?>@endif</td>
                        <td rowspan="2">
                            {!! link_to_route('job.edit', '編集', ['id' => $job->id], ['class'=>'btn btn-primary btn-xs']) !!}
                            {!! Form::open(['route' => ['job.delete', $job->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td rowspan="2">{{ $job->entries()->count() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">memo</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="mb40">募集要項は登録されていません。</p>
            @endif
        </div>
    </div>
@endsection