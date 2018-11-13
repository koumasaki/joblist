@extends('layouts.users_app')

@section('title', ' | 担当者情報編集')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            担当者情報編集
            <small>ユーザー登録管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{ route('recruiter.index') }}">担当者情報</a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">担当者情報（{{ $recruiter->name }}）編集</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($recruiter, ['route' => ['recruiter.update', $recruiter->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                    	<div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                    		{!! Form::label('name', '担当者名', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-3">
                                {!! Form::text('name', old('name'), ['class'=>'form-control form-lg']) !!}
                                <span class="help-block">{{$errors->first('name')}}</span>
                    		</div>
                    	</div>
                    	<div class="form-group @if(!empty($errors->first('section'))) has-error @endif">
                    		{!! Form::label('section', '部署・所属', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-3">
                                {!! Form::text('section', old('section'), ['class'=>'form-control form-lg']) !!}
                                <span class="help-block">{{$errors->first('section')}}</span>
                    		</div>
                    	</div>
                    	<div class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
                    		{!! Form::label('zip', '郵便番号', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-2">
                                {!! Form::text('zip', null, ['class'=>'form-control form-lg', 'placeholder'=>'※ハイフンあり', 'onKeyUp'=>"AjaxZip3.zip2addr(this,'','address','address');"]) !!}
                                <span class="help-block">{{$errors->first('zip')}}</span>
                    		</div>
                    	</div>
                    	<div class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                    		{!! Form::label('address', '住所', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-5">
                                {!! Form::textarea('address', old('address'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                                <span class="help-block">{{$errors->first('address')}}</span>
                    		</div>
                    	</div>
                    	<div class="form-group @if(!empty($errors->first('tel'))) has-error @endif">
                    		{!! Form::label('tel', '電話番号', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-3">
                                {!! Form::text('tel', old('tel'), ['class'=>'form-control form-lg', 'placeholder'=>'※ハイフンあり']) !!}
                                <span class="help-block">{{$errors->first('tel')}}</span>
                    		</div>
                    	</div>
                    	<div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                    		{!! Form::label('email', 'メールアドレス', ['class'=>'col-sm-3 control-label']) !!}
                    		<div class="col-sm-5">
                                {!! Form::text('email', old('email'), ['class'=>'form-control form-lg']) !!}
                                <span class="help-block">{{$errors->first('email')}}</span>
                    		</div>
                    	</div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-left mr5">{!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}</div>
                        <div class="pull-left mr5"><a href="{{ route('recruiter.index') }}" class="btn btn-danger">一覧に戻る</a></div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection