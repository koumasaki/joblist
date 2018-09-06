@extends('layouts.users_app')

@section('title', ' | エントリー情報')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>エントリー情報</h1>
            <hr>
            <table class="table-wide mb40">
                <tbody>
                    <tr>
                        <th>進捗状況</th>
                        <td>{{ $entry->status }}
                            <hr>
                            {!! Form::model($entry, ['route' => ['entry.update', $entry->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                                <div class="form-inline">
                                {!! Form::select('status', ['' => '-選択-', '書類選考' => '書類選考', '一次面接呼出' => '一次面接呼出', '二次面接呼出' => '二次面接呼出', '最終面接呼出' => '最終面接呼出', '内定' => '内定', '不合格' => '不合格'], old('status'), ['class'=>'form-control']) !!}
                                {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td>{{ $entry->name }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $entry->gender }}</td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td>{{ $entry->birthday }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $entry->tel }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><a href="mailto:{{ $entry->mail }}">{{ $entry->mail }}</a></td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>〒{{ $zip }}<br>{{ $entry->address }}</td>
                    </tr>
                    <tr>
                        <th>職務経歴</th>
                        <td>{!! nl2br(e($entry->carreer)) !!}</td>
                    </tr>
                    <tr>
                        <th>保有資格</th>
                        <td>{!! nl2br(e($entry->qualification)) !!}</td>
                    </tr>
                    <tr>
                        <th>自己PR</th>
                        <td>{!! nl2br(e($entry->myself)) !!}</td>
                    </tr>
                </tbody>
            </table>
            {!! Form::open(['route' => ['entry.delete', $entry->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                <a href="{{ route('entry.index') }}" class="btn btn-primary">一覧に戻る</a>
                <a href="{{ route('mail.create', ['id' => $entry->id]) }}" class="btn btn-success">メールを送る</a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection