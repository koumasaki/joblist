@extends('layouts.admin_app')


@section('title', ' | Dashboard(管理者TOPページ)')

@section('content')
    @if (Auth::check())
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            Dashboard
            <small>管理者TOPページ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">登録ユーザー一覧</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>会社名</th>
                                    <th>表示URL</th>
                                    <th>担当者名</th>
                                    <th>登録アドレス</th>
                                    <th class="text-center">登録削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->company }}</td>
                                    <td>{{ $user->display_url }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        {!! Form::open(['route' => ['user.delete', $user->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('signup.get') }}" class="btn btn-primary">新規ユーザー登録</a>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    @endif
@endsection