@extends('layouts.users_app')

@section('title', ' | '. $job->job_name. 'のエントリー一覧')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            エントリー一覧
            <small>エントリー管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('entry.index') }}">エントリー一覧</a></li>
            <li class="active">エントリー一覧（{{ $job->job_name }}）</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">エントリー一覧（{{ $job->job_name }}）</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($entries) > 0 )
                        <p>登録人数：{{ $entries -> total() }}件（{{ $entries -> currentPage() }}/{{ $entries -> lastPage() }}ページ）</p>
@include('commons.user_all_entries')
                        @else
                        <p>{{ $job->job_name }}のエントリーデータは登録されていません。</p>
                        @endif
                        {!! $entries->render() !!}
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
@endsection