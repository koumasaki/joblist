@extends('layouts.users_app')

@section('title', ' | 登録情報更新')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $user->company }}の登録内容編集</h1>
            <hr>
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'put', 'files' => true]) !!}
            	<div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
            		{!! Form::label('email', 'Eメール', ['class'=>'col-sm-2 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('email')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
            		{!! Form::label('zip', '郵便番号', ['class'=>'col-sm-2 control-label']) !!}
            		<div class="col-sm-3">
                        {!! Form::text('zip', null, ['class'=>'form-control', 'placeholder'=>'※ハイフンあり']) !!}
                        <span class="help-block">{{$errors->first('zip')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            		{!! Form::label('name', '担当者', ['class'=>'col-sm-2 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('name')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('main_image'))) has-error @endif">
            		{!! Form::label('main_image', 'メイン画像', ['class'=>'col-sm-2 control-label']) !!}
            		<div class="col-sm-10">
                        {!! Form::file('main_image') !!}
                        <span class="help-block">{{$errors->first('main_image')}}</span>
                        <span class="help-block">左右幅1600px以上の画像を登録</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('logo_image'))) has-error @endif">
            		{!! Form::label('logo_image', '会社ロゴ', ['class'=>'col-sm-2 control-label']) !!}
            		<div class="col-sm-10">
                        {!! Form::file('logo_image') !!}
                        <span class="help-block">{{$errors->first('logo_image')}}</span>
                        <span class="help-block">左右幅250px以下の画像を登録</span>
            		</div>
            	</div>

                {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                {!! link_to_route('user.show', '戻る', ['id' => $user->id], ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection