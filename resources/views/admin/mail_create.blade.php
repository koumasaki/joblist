@extends('layouts.admin_app')


@section('title', ' | メールテンプレート新規登録')

@section('content')
    @if (Auth::check())
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            メールテンプレート新規登録
            <small>メールテンプレート</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">メールテンプレート新規登録</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['route' => 'mailorigin.post', 'class' => 'form-horizontal']) !!}
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
                        {!! Form::submit('登録', ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    @endif
@endsection