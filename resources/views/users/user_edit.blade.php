@extends('layouts.users_app')

@section('title', ' | ユーザー情報更新')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $user->company }}の登録内容編集</h1>
            <hr>
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'put', 'files' => true]) !!}
            	<div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
            		{!! Form::label('email', 'Eメール', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('email')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
            		{!! Form::label('zip', '郵便番号', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-3">
                        {!! Form::text('zip', null, ['class'=>'form-control', 'placeholder'=>'※ハイフンあり']) !!}
                        <span class="help-block">{{$errors->first('zip')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('address'))) has-error @endif">
            		{!! Form::label('address', '住所', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-8">
                        {!! Form::textarea('address', old('address'), ['class' => 'form-control', 'rows' => '4']) !!}
                        <span class="help-block">{{$errors->first('address')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('tel'))) has-error @endif">
            		{!! Form::label('tel', '電話番号', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('tel', old('tel'), ['class'=>'form-control', 'placeholder'=>'※ハイフンあり']) !!}
                        <span class="help-block">{{$errors->first('tel')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('section'))) has-error @endif">
            		{!! Form::label('section', '部署名', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('section', old('section'), ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('section')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            		{!! Form::label('name', '担当者名', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('name')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('catch_copy'))) has-error @endif">
            		{!! Form::label('catch_copy', 'メインコピー', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('catch_copy', old('catch_copy'), ['class'=>'form-control', 'placeholder'=>'※20文字以内']) !!}
                        <span class="help-block">{{$errors->first('catch_copy')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('main_image'))) has-error @endif">
            		{!! Form::label('main_image', 'メイン画像', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-9">
                        {!! Form::file('main_image') !!}
                        <span class="help-block">{{$errors->first('main_image')}}</span>
                        <span class="help-block">※左右幅1600px以上の画像を登録</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('logo_image'))) has-error @endif">
            		{!! Form::label('logo_image', '会社ロゴ', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-9">
                        {!! Form::file('logo_image') !!}
                        <span class="help-block">{{$errors->first('logo_image')}}</span>
                        <span class="help-block">※左右幅250px以下の画像を登録</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('company_copy'))) has-error @endif">
            		{!! Form::label('company_copy', '会社紹介用コピー', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-8">
                        {!! Form::text('company_copy', old('company_copy'), ['class'=>'form-control', 'placeholder'=>'※100文字以内']) !!}
                        <span class="help-block">{{$errors->first('company_copy')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('company_summary'))) has-error @endif">
            		{!! Form::label('company_summary', '会社紹介文', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-8">
                        {!! Form::textarea('company_summary', old('company_summary'), ['class' => 'form-control', 'rows' => '4']) !!}
                        <span class="help-block">{{$errors->first('company_summary')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('establishment'))) has-error @endif">
            		{!! Form::label('establishment', '会社設立', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-4">
                        {!! Form::text('establishment', old('establishment'), ['class'=>'form-control', 'placeholder'=>'※']) !!}
                        <span class="help-block">{{$errors->first('establishment')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('capitalstock'))) has-error @endif">
            		{!! Form::label('capitalstock', '資本金', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-4">
                        {!! Form::text('capitalstock', old('capitalstock'), ['class'=>'form-control', 'placeholder'=>'※']) !!}
                        <span class="help-block">{{$errors->first('capitalstock')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('number'))) has-error @endif">
            		{!! Form::label('number', '従業員数', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-4">
                        {!! Form::text('number', old('number'), ['class'=>'form-control', 'placeholder'=>'※']) !!}
                        <span class="help-block">{{$errors->first('number')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('president'))) has-error @endif">
            		{!! Form::label('president', '代表者名', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-4">
                        {!! Form::text('president', old('president'), ['class'=>'form-control', 'placeholder'=>'※']) !!}
                        <span class="help-block">{{$errors->first('president')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('site_url'))) has-error @endif">
            		{!! Form::label('site_url', '企業サイトURL', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('site_url', old('site_url'), ['class'=>'form-control', 'placeholder'=>'※']) !!}
                        <span class="help-block">{{$errors->first('site_url')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('privacy_url'))) has-error @endif">
            		{!! Form::label('site_url', '個人情報保護ページURL', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
                        {!! Form::text('privacy_url', old('privacy_url'), ['class'=>'form-control', 'placeholder'=>'※']) !!}
                        <span class="help-block">{{$errors->first('privacy_url')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('service_copy'))) has-error @endif">
            		{!! Form::label('service_copy', '事業紹介用コピー', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-8">
                        {!! Form::text('service_copy', old('service_copy'), ['class'=>'form-control', 'placeholder'=>'※100文字以内']) !!}
                        <span class="help-block">{{$errors->first('service_copy')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('service_summary'))) has-error @endif">
            		{!! Form::label('service_summary', '事業紹介文', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-8">
                        {!! Form::textarea('service_summary', old('service_summary'), ['class' => 'form-control', 'rows' => '4']) !!}
                        <span class="help-block">{{$errors->first('service_summary')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('copyright'))) has-error @endif">
            		{!! Form::label('copyright', 'copyright表記', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-8">
                        {!! Form::text('copyright', old('copyright'), ['class'=>'form-control', 'placeholder'=>'※基本半角英語']) !!}
                        <span class="help-block">{{$errors->first('copyright')}}</span>
            		</div>
            	</div>
                {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                {!! link_to_route('user.show', '戻る', ['id' => $user->id], ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection