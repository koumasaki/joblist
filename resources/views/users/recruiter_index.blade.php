@extends('layouts.users_app')

@section('title', ' | 担当者情報')

@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            担当者情報
            <small>ユーザー登録管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">担当者情報</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">担当者情報</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($count_recruiters > 0)
                        <table class="table mb10 table-striped">
                            <thead>
                                <tr>
                                    <th>担当者名</th>
                                    <th>部署・所属</th>
                                    <th>住所</th>
                                    <th>電話番号</th>
                                    <th>メールアドレス</th>
                                    <th>編集</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recruiters as $recruiter)
                                <tr>
                                    <td class="table-name">{{ $recruiter->name }}</td>
                                    <td>{{ $recruiter->section }}</td>
                                    <td>{{ $recruiter->zip }}<br>
                                    {{ $recruiter->address }}</td>
                                    <td>{{ $recruiter->tel }}</td>
                                    <td>{{ $recruiter->email }}</td>
                                    <td>
                                        <div class="pull-left mr5">
                                            {!! link_to_route('recruiter.edit', '編集', ['id' => $recruiter->id], ['class'=>'btn btn-primary btn-xs']) !!}
                                        </div>
                                        <div class="pull-left">
                                            {!! Form::open(['route' => ['recruiter.delete', $recruiter->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="mb40">担当者情報は登録されていません。</p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! link_to_route('recruiter.create', '担当者情報新規作成', '', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection