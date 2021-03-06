<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>管理者ログイン</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/base.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/skin-blue.min.css') }}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo"><a href="/admin/login"><b>管理者</b>Login</a></div>
    <div class="login-box-body">
        <p class="login-box-msg">管理者ログイン</p>

        {!! Form::open(['route' => 'admin_login.post']) !!}
            <div class="form-group has-feedback @if(!empty($errors->first('email'))) has-error @endif">
                {!! Form::label('email', 'Eメール:') !!}
                {!! Form::text('email', old('email'), ['class'=>'form-control form-lg', 'placeholder'=> 'Email']) !!}
                <span class="help-block">{{$errors->first('email')}}</span>
            </div>
            <div class="form-group has-feedback @if(!empty($errors->first('password'))) has-error @endif">
                {!! Form::label('password', 'パスワード:') !!}
                {!! Form::password('password', ['class'=>'form-control form-lg', 'placeholder'=> 'password']) !!}
                <span class="help-block">{{$errors->first('password')}}</span>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::submit('管理者ログイン', ['class' => 'btn btn-primary btn-flat btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        <br>
        <p class="mb0"><a href="/login">&raquo; ユーザーログイン</a></p>
    </div>
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ secure_asset('js/adminlte.min.js') }}"></script>
</body>
</html>