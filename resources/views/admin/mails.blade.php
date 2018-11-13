@extends('layouts.admin_app')


@section('title', ' | メールテンプレート一覧')

@section('content')
    @if (Auth::check())
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            メールテンプレート一覧
            <small>メールテンプレート</small>
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
                        <h2 class="box-title">メールテンプレート一覧</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table mb10 table-striped">
                            <thead>
                                <tr>
                                    <th>タイトル</th>
                                    <th>本文（一部）</th>
                                    <th>編集</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mails as $mail)
                                <tr>
                                    <td class="table-name">{{ $mail->title }}</td>
                                    <td><?php 
                                        if (mb_strlen($mail->body) < 80) {
                                            $body = $mail->body;
                                            echo $body;
                                        } else {
                                            $body = mb_substr( $mail->body, 0, 80);
                                            echo $body. '...';
                                        }
                                         ?></td>
                                    <td>
                                        <div class="pull-left mr5">
                                            {!! link_to_route('mailorigin.edit', '編集', ['id' => $mail->id], ['class'=>'btn btn-primary btn-xs']) !!}
                                        </div>
                                        <div class="pull-left">
                                            {!! Form::open(['route' => ['mailorigin.delete', $mail->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{ route('mailorigin.create') }}" class="btn btn-primary">新規テンプレート登録</a>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    @endif
@endsection