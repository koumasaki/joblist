@extends('layouts.users_app')

@section('title', ' | Dashboard(管理画面TOPページ)')


@section('content')
    @if (Auth::check())
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            Dashboard
            <small>管理画面TOPページ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">公開中の募集要項</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($jobs) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>募集職種</th>
                                    <th>雇用形態</th>
                                    <th>勤務地</th>
                                    <th class="text-center" style="width: 80px">応募件数</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->job_name }}</td>
                                    <td><?php 
                                        switch($job->job_status) {
                                            case 'FULL_TIME':
                                                echo '正社員';
                                                break;
                                            case 'CONTRACTOR':
                                                echo '契約社員';
                                                break;
                                            case 'PART_TIME':
                                                echo 'パート・アルバイト';
                                                break;
                                            case 'TEMPORARY':
                                                echo '派遣社員';
                                                break;
                                            case 'COMMISSION':
                                                echo '嘱託';
                                                break;
                                            case 'OTHER':
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
                                    <td class="text-center"><a href="{{ route('refine.index', ['id' => $job->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-user"></i> {{ $job->entries()->count() }}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>公開中の募集要項は登録されていません。</p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('job.index') }}" class="btn btn-primary">求人案件一覧</a>
                    </div>
                </div><!-- /.box -->
            </div>
            
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h2 class="box-title">本日受付のエントリー</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        @if( count($entries) > 0 )
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>氏名</th>
                                    <th>性別</th>
                                    <th>生年月日</th>
                                    <th>応募職種</th>
                                    <th>進捗状況</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entries as $entry)
                                <tr>
                                    <td><a href="{{ route('entry.show', ['id' => $entry->id]) }}">{{ $entry->name }}</a></td>
                                    <td>{{ $entry->gender }}</td>
                                    <td>{{ $entry->birthday }}</td>
                                    <td>{{ $entry->job_name }}</td>
                                    <td>{{ $entry->status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p style="padding: 10px;">エントリーデータは登録されていません。</p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('entry.index') }}" class="btn btn-primary">エントリー一覧</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    @endif
@endsection