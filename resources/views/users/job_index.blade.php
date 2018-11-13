@extends('layouts.users_app')

@section('title', ' | 求人案件一覧')

@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            求人案件一覧
            <small>求人案件管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">求人案件一覧</li>
        </ol>
    </section>

    <section class="content container-fluid">
@include('commons.user_search_job')

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">求人案件一覧</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($count_jobs > 0)
                        <p>登録件数：{{ $jobs -> total() }}件（{{ $jobs -> currentPage() }}/{{ $jobs -> lastPage() }}ページ）</p>
@include('commons.user_all_jobs')
                        @else
                        <p>求人案件は登録されていません。</p>
                        @endif
                        {!! $jobs->render() !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('job.create') }}" class="btn btn-success">求人案件新規作成</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection