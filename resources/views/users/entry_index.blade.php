@extends('layouts.users_app')

@section('title', ' | エントリー一覧')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>エントリー一覧</h1>
            <hr>
            @if($count_entries > 0)
            <div class="table-responsive">
                <table class="table mb50 table-view">
                    <thead>
                        <tr>
                            <th>氏名</th>
                            <th>進捗状況</th>
                            <th>応募日</th>
                            <th>性別</th>
                            <th>生年月日</th>
                            <th>メールアドレス</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $entry)
                        <tr class="gray">
                            <td rowspan="2" class="table-name"><a href="{{ route('entry.show', ['id' => $entry->id]) }}">{{ $entry->name }}</a></td>
                            <td rowspan="2" >{{ $entry->status }}</td>
                            <td>{{ $entry->created_at->format('Y年m月d日') }}</td>
                            <td>{{ $entry->gender }}</td>
                            <td>{{ $entry->birthday }}</td>
                            <td><a href="mailto:{{ $entry->mail }}">{{ $entry->mail }}</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="fs13">
                                <strong class="red">応募職種：</strong>{{ $entry->job_name }}　<strong class="red">勤務地：</strong>{{ $entry->job_place }}
                            </td>
                            <td>{!! Form::model($entry, ['route' => ['entry.update', $entry->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                                    <div class="form-inline">進捗更新：
                                    {!! Form::select('status', ['' => '-選択-', '未対応' => '未対応', '書類選考' => '書類選考', '一次面接呼出' => '一次面接呼出', '二次面接呼出' => '二次面接呼出', '最終面接呼出' => '最終面接呼出', '内定' => '内定', '不合格' => '不合格'], old('status'), ['class'=>'form-control']) !!}
                                    {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="mb40">エントリーデータは登録されていません。</p>
            @endif
        </div>
    </div>
@endsection