@extends('layouts.users_app')

@section('title', ' | 送信メールテンプレート登録')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>送信メールテンプレートの新規登録</h1>
            <hr>
            {!! Form::open(['route' => 'mailtemplate.post', 'class' => 'form-horizontal']) !!}
            	<div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
            		{!! Form::label('title', 'タイトル', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-6">
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
                {!! Form::submit('登録', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection