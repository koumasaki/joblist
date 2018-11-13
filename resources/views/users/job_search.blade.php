@extends('layouts.users_app')

@section('title', ' | 検索結果（求人案件）')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            検索結果（求人案件）
            <small>求人案件管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('job.index') }}">求人案件一覧</a></li>
            <li class="active">検索結果（求人案件）</li>
        </ol>
    </section>

    <section class="content container-fluid">
@include('commons.user_search_job')

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">検索結果一覧（求人案件）</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($jobs) > 0 )
                        <p>該当件数：{{ $jobs -> total() }}件（{{ $jobs -> currentPage() }}/{{ $jobs -> lastPage() }}ページ）</p>
@include('commons.user_all_jobs')
                        @else
                        <p>検索条件に該当する求人案件は登録されていません。</p>
                        @endif
                        {!! $jobs->appends(['job_name'=>$job_name,'pref'=>$pref,'status'=>$status,'release'=>$release])->render() !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-left mr5"><a href="{{ route('job.create') }}" class="btn btn-success">求人案件新規作成</a></div>
                        <div class="pull-left"><a href="{{ route('job.index') }}" class="btn btn-primary">求人案件一覧</a></div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection