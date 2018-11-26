@extends('layouts.users_app')

@section('title', ' | 新規メール作成')

@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            新規メール作成
            <small>エントリー管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="/user/entries">エントリー一覧</a></li>
            <li class="active">新規メール作成</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">新規メール作成</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if( count($mailtemplates) > 0 )
                        <div class="row mb15">
                            {!! Form::open(['route' => ['mail.read', $entry->id], 'class' => 'form-horizontal']) !!}
                                <div class="col-sm-5 mb5">
                                    <select class="form-control form-lg" id="template_id" name="template_id">
                                        <option value=''>-- テンプレートを選択 --</option>
                                    @foreach($mailtemplates as $mailtemplate)
                                        <option value={{ $mailtemplate->id }}>{{ $mailtemplate->title }}</option>
                                    @endforeach
                                    </select>                        
                                </div>
                                <div class="col-sm-3 mb5">
                                    {!! Form::submit('読み込む', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        @endif
                        {!! Form::open(['route' => ['mail.store', $entry->id], 'class' => 'form-horizontal']) !!}
                        <input type="hidden" id="entry_id" name="entry_id" value="{{ $entry->id }}">
                        <table class="table-wide mb20">
                            <tbody>
                                <tr>
                                    <th>応募者</th>
                                    <td>{{ $entry->name }}<input type="hidden" id="to_name" name="to_name" value="{{ $entry->name }}"></td>
                                </tr>
                                <tr>
                                    <th>宛先</th>
                                    <td>{{ $entry->mail }}<input type="hidden" id="to_mail" name="to_mail" value="{{ $entry->mail }}"></td>
                                </tr>
                            </tbody>
                        </table>
        
                        <table class="table-form mb30">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                                    <th>{!! Form::label('title', 'タイトル', ['class'=>'control-label']) !!}</th>
                                    <td>
                                        @if(!empty($template))
                                        {!! Form::text('title', $template->title , ['class'=>'form-control form-md']) !!}
                                        @else
                                        {!! Form::text('title', old('title'), ['class'=>'form-control form-md']) !!}
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
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('送信する', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection