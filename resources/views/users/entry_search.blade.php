@extends('layouts.users_app')

@section('title', ' | 検索結果（エントリー）')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            検索結果（エントリー）
            <small>エントリー管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('entry.index') }}">エントリー一覧</a></li>
            <li class="active">検索結果（エントリー）</li>
        </ol>
    </section>

    <section class="content container-fluid">
@include('commons.user_search_entry')

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">検索結果一覧（エントリー）</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($entries) > 0 )
                        <p>該当人数：{{ $entries -> total() }}件（{{ $entries -> currentPage() }}/{{ $entries -> lastPage() }}ページ）</p>
@include('commons.user_all_entries')
                        @else
                        <p>検索条件に該当するエントリーデータは登録されていません。</p>
                        @endif
                        {!! $entries->appends(['name'=>$name,'status'=>$status])->render() !!}
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