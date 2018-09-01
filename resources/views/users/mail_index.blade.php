@extends('layouts.users_app')

@section('title', ' | メール送信履歴')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>送信済みメール一覧</h1>
            <hr>
            @if($count_sendmails > 0)
            <table class="table mb50 table-striped">
                <thead>
                    <tr>
                        <th>応募者名</th>
                        <th>送信日</th>
                        <th>タイトル</th>
                        <th>本文（一部）</th>
                        <th>操作</th>
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
                        <td>--</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="mb40">送信済みメールは登録されていません。</p>
            @endif
        </div>
    </div>
@endsection