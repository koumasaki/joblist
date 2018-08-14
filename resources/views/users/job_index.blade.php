@extends('layouts.users_app')

@section('title', ' | 募集要項一覧')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>募集要項一覧</h1>
            <hr>
            @if($count_jobs > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>募集職種名</th>
                        <th>公開設定</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                    <?php $user = $job->user; ?>
                    <tr>
                        <td>{{ $job->job_name }}</td>
                        <td>@if($job->release === 'release')<?php echo '公開'; ?>@else<?php echo '未公開'; ?>@endif</td>
                        <td>
                            {!! link_to_route('job.edit', '編集', ['id' => $job->id], ['class'=>'btn btn-primary btn-xs']) !!}
                            {!! Form::open(['route' => ['job.delete', $job->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
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