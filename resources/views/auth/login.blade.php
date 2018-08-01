@extends('layouts.admin_app')

@section('title', ' Sign up')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="text-center mb20">
                <h1>ログイン</h1>
                <hr>
            </div>
            {!! Form::open(['route' => 'login.post']) !!}
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
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block mt40']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection