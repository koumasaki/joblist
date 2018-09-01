@extends('layouts.users_app')

@section('title', ' | 送信用メールテンプレート一覧')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>送信用メールテンプレート一覧</h1>
            <hr>
            @if($count_mailtemplates > 0)
            <table class="table mb20 table-striped">
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
                            {!! link_to_route('mailtemplate.edit', '編集', ['id' => $mailtemplate->id], ['class'=>'btn btn-primary btn-xs']) !!}
                            {!! Form::open(['route' => ['mailtemplate.delete', $mailtemplate->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="mb40">メールテンプレートは登録されていません。</p>
            @endif
            <p class="mb50">{!! link_to_route('mailtemplate.create', '送信用メールテンプレート新規作成', '', ['class' => 'btn btn-success']) !!}</p>
        </div>
    </div>
@endsection