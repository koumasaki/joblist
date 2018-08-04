@extends('layouts.admin_app')

@section('title', 'Sign up')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center mb20">
                <h1>新規登録</h1>
                <hr>
            </div>
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group @if(!empty($errors->first('company'))) has-error @endif">
                    {!! Form::label('company', '会社名:') !!}
                    {!! Form::text('company', old('company'), ['class'=>'form-control']) !!}
                    <span class="help-block">{{$errors->first('company')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('display_url'))) has-error @endif">
                    {!! Form::label('display_url', '表示用URL:') !!}
                    {!! Form::text('display_url', old('display_url'), ['class'=>'form-control', 'placeholder'=>'※半角英数字で入力']) !!}
                    <span class="help-block">{{$errors->first('display_url')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                    {!! Form::label('email', 'Eメール:') !!}
                    {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
                    <span class="help-block">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('password'))) has-error @endif">
                    {!! Form::label('password', 'パスワード:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                    <span class="help-block">{{$errors->first('password')}}</span>
                </div>
                <div class="form-group @if(!empty($errors->first('password_confirmation'))) has-error @endif">
                    {!! Form::label('password_confirmation', 'パスワード(確認):') !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                </div>
                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block mt40']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection