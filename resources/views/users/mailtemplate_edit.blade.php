@extends('layouts.users_app')

@section('title', ' | メールテンプレート編集')

@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            メールテンプレート編集
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
                    <h2 class="box-title">メールテンプレート（{{ $mailtemplate->title }}）の編集</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($mailtemplate, ['route' => ['mailtemplate.update', $mailtemplate->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                    	<div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                    		{!! Form::label('title', 'タイトル', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-8">
                                {!! Form::text('title', old('title'), ['class'=>'form-control form-md']) !!}
                                <span class="help-block">{{$errors->first('title')}}</span>
                    		</div>
                    	</div>
                    	<div class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                    		{!! Form::label('body', 'メール本文', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-9">
                                {!! Form::textarea('body', old('body'), ['class' => 'form-control form-lg', 'rows' => '10']) !!}
                                <span class="help-block">{{$errors->first('body')}}</span>
                    		</div>
                    	</div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-left mr5">{!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}</div>
                        <div class="pull-left mr5"><a href="{{ route('mailtemplate.index') }}" class="btn btn-danger">一覧に戻る</a></div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection