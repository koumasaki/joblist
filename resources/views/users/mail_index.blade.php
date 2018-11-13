@extends('layouts.users_app')

@section('title', ' | メール送信履歴')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            メール送信履歴
            <small>エントリー管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="/user/entries">Dashboard</a>エントリー一覧</li>
            <li class="active">メール送信履歴</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">送信済みメール一覧</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if($count_sendmails > 0)
                        <table class="table mb20 table-striped">
                            <thead>
                                <tr>
                                    <th>送信者名</th>
                                    <th>送信日</th>
                                    <th>タイトル</th>
                                    <th>本文（一部）</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sendmails as $sendmail)
                                <tr>
                                    <td class="table-name">{{ $sendmail->to_name }}</td>
                                    <td>{{ $sendmail->created_at->format('Y年m月d日') }}</td>
                                    <td>{{ $sendmail->title }}</td>
                                    <td><?php 
                                        if (mb_strlen($sendmail->body) < 30) {
                                            $body = $sendmail->body;
                                            echo $body;
                                        } else {
                                            $body = mb_substr( $sendmail->body, 0, 30);
                                            echo $body. '...';
                                        }
                                         ?></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>送信済みメールは登録されていません。</p>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection