@extends('layouts.users_app')

@section('title', ' | エントリー詳細データ')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            エントリー詳細データ
            <small>エントリー管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('entry.index') }}">エントリー一覧</a></li>
            <li class="active">エントリー詳細データ</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">エントリー詳細データ</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table-wide mb10">
                            <tbody>
                                <tr>
                                    <th>進捗状況</th>
                                    <td>{{ $entry->status }}
                                        @if(\Route::current() -> getName() == 'entry.show')
                                        <hr>
                                        {!! Form::model($entry, ['route' => ['entry.update', $entry->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                                            <div class="form-inline">
                                            {!! Form::select('status', ['' => '-選択-', '書類選考' => '書類選考', '一次面接呼出' => '一次面接呼出', '二次面接呼出' => '二次面接呼出', '最終面接呼出' => '最終面接呼出', '内定' => '内定', '不合格' => '不合格'], old('status'), ['class'=>'form-control']) !!}
                                            {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                        @endif
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
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-left mr5">
                            {!! Form::open(['route' => ['entry.delete', $entry->id], 'method' => 'delete', 'onsubmit' => 'return submitChk()']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="pull-left mr5">
                            <a href="{{ route('entry.index') }}" class="btn btn-primary">一覧に戻る</a>
                        </div>
                        <div class="pull-left">
                            <a href="{{ route('mail.create', ['id' => $entry->id]) }}" class="btn btn-success">新規メール作成</a>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">メール送信</h2>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($mailtemplates) > 0 )
                        <div class="row mb15">
                            {!! Form::open(['route' => ['mail_template.read', $entry->id], 'class' => 'form-horizontal']) !!}
                                <div class="col-sm-7 mb5 form_right">
                                    <select class="form-control form-lg" id="template_id" name="template_id">
                                        <option value=''>-- テンプレートを選択 --</option>
                                    @foreach($mailtemplates as $mailtemplate)
                                        <option value={{ $mailtemplate->id }}>{{ $mailtemplate->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 mb5">
                                    {!! Form::submit('読み込む', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        @endif
                        {!! Form::open(['route' => ['mail.store', $entry->id], 'class' => 'form-horizontal']) !!}
                        <input type="hidden" id="entry_id" name="entry_id" value="{{ $entry->id }}">
                        <input type="hidden" id="to_name" name="to_name" value="{{ $entry->name }}">
                        <input type="hidden" id="to_mail" name="to_mail" value="{{ $entry->mail }}">
                        <table class="table-form mb10">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                                    <th>{!! Form::label('title', 'タイトル', ['class'=>'control-label']) !!}</th>
                                    <td>
                                        @if(!empty($template))
                                        {!! Form::text('title', $template->title , ['class'=>'form-control form-lg']) !!}
                                        @else
                                        {!! Form::text('title', old('title'), ['class'=>'form-control form-lg']) !!}
                                        @endif
                                        <span class="help-block-ent">{{$errors->first('title')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                                    <th>{!! Form::label('body', '本文', ['class'=>'control-label']) !!}</th>
                                    <td>
                                        <p>{{ $entry->name }} 様</p>
                                        @if(!empty($template))
                                        {!! Form::textarea('body', $template->body , ['class' => 'form-control form-lg', 'rows' => '15']) !!}
                                        @else
                                        {!! Form::textarea('body', old('body') , ['class' => 'form-control form-lg', 'rows' => '15']) !!}
                                        @endif
                                        <span class="help-block-ent">{{$errors->first('body')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('sender'))) has-error @endif">
                                    <th>{!! Form::label('sender', '署名', ['class'=>'control-label']) !!}</th>
                                    <td>
                                        @if( count($recruiters) > 0 )
                                        <select class="form-control form-md" id="sender" name="sender">
                                            <option value=''>{{ $user->name }}／{{ $user->email }}</option>
                                            @foreach($recruiters as $recruiter)
                                                <option value={{ $recruiter->id }}>{{ $recruiter->name }}／{{ $recruiter->email }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        {{ $user->name }}／{{ $user->email }}<br>
                                        <span class="fs13">※担当者を変更する場合は、先に担当者情報を追加してください。</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('送信する', ['class'=>'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">送信済みメール一覧</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($sendmails) > 0 )
                        <table class="table mb20 table-striped">
                            <thead>
                                <tr>
                                    <th>送信日</th>
                                    <th>タイトル</th>
                                    <th>本文（一部）</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sendmails as $sendmail)
                                <tr>
                                    <td class="fs13">{{ $sendmail->created_at->format('Y年m月d日') }}</td>
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