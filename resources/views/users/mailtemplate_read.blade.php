@extends('layouts.users_app')

@section('title', ' | メールテンプレート新規登録')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            メールテンプレート新規登録
            <small>ユーザー登録管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('mailtemplate.index') }}">送信用メールテンプレート</a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">メールテンプレート新規登録</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row mb15">
                            {!! Form::open(['route' => ['mailtemplate.read'], 'class' => 'form-horizontal']) !!}
                                <div class="col-xs-4 mb5">
                                    <select class="form-control form-lg" id="mail_id" name="mail_id">
                                        <option value=''>-- テンプレートを選択 --</option>
                                    @foreach($mailorigins as $mailorigin)
                                        <option value={{ $mailorigin->id }}>{{ $mailorigin->title }}</option>
                                    @endforeach
                                    </select>                        
                                </div>
                                <div class="col-xs-3 mb5">
                                    {!! Form::submit('読み込む', ['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        {!! Form::open(['route' => 'mailtemplate.post', 'class' => 'form-horizontal']) !!}
                        <table class="table-form mb20">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                                    <th><label for="title" class="control-label">タイトル<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        @if(!empty($mail_title))
                                        {!! Form::text('title', $mail_title , ['class'=>'form-control form-md']) !!}
                                        @else
                                        {!! Form::text('title', old('title'), ['class'=>'form-control form-md']) !!}
                                        @endif
                                        <span class="help-block">{{$errors->first('title')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                                    <th><label for="body" class="control-label">メール本文<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        @if(!empty($mail_body))
                                        {!! Form::textarea('body', $mail_body , ['class' => 'form-control form-lg', 'rows' => '10']) !!}
                                        @else
                                        {!! Form::textarea('body', old('body'), ['class' => 'form-control form-lg', 'rows' => '10']) !!}
                                        @endif
                                        <span class="help-block">{{$errors->first('body')}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('登録', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection