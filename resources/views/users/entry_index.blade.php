@extends('layouts.users_app')

@section('title', ' | エントリー一覧')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            エントリー一覧
            <small>エントリー管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">エントリー一覧</li>
        </ol>
    </section>

    <section class="content container-fluid">
@include('commons.user_search_entry')

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">エントリー一覧</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($count_entries > 0)
                        <p>登録人数：{{ $entries -> total() }}件（{{ $entries -> currentPage() }}/{{ $entries -> lastPage() }}ページ）</p>
@include('commons.user_all_entries')
                        @else
                        <p>エントリーデータは登録されていません。</p>
                        @endif
                        {!! $entries->render() !!}
                    </div>
                    <!-- /.box-body -->
                    @if($count_entries > 0)
                    <div class="box-footer">
                        <a href="{{ action('EntriesController@downloadCSV') }}" class="btn btn-primary">csv出力</a>
                    </div>
                    @endif
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection