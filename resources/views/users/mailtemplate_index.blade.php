@extends('layouts.users_app')

@section('title', ' | 送信用メールテンプレート')

@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            送信用メールテンプレート
            <small>ユーザー登録管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">送信用メールテンプレート</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">送信用メールテンプレート</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($count_mailtemplates > 0)
                        <table class="table mb10 table-striped">
                            <thead>
                                <tr>
                                    <th>タイトル</th>
                                    <th>本文（一部）</th>
                                    <th>編集</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mailtemplates as $mailtemplate)
                                <tr>
                                    <td class="table-name">{{ $mailtemplate->title }}</td>
                                    <td><?php 
                                        if (mb_strlen($mailtemplate->body) < 80) {
                                            $body = $mailtemplate->body;
                                            echo $body;
                                        } else {
                                            $body = mb_substr( $mailtemplate->body, 0, 80);
                                            echo $body. '...';
                                        }
                                         ?></td>
                                    <td>
                                        <div class="pull-left mr5">
                                            {!! link_to_route('mailtemplate.edit', '編集', ['id' => $mailtemplate->id], ['class'=>'btn btn-primary btn-xs']) !!}
                                        </div>
                                        <div class="pull-left">
                                            {!! Form::open(['route' => ['mailtemplate.delete', $mailtemplate->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="mb40">メールテンプレートは登録されていません。</p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! link_to_route('mailtemplate.create', '送信用メールテンプレート新規作成', '', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection