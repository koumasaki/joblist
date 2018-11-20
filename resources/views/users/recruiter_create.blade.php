@extends('layouts.users_app')

@section('title', ' | 担当者情報新規登録')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            担当者情報新規登録
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
                    <h2 class="box-title">担当者情報新規登録録</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['route' => 'recruiter.post', 'class' => 'form-horizontal']) !!}
                        <table class="table-form mb30">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                                    <th><label for="name" class="control-label">担当者名<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('name', old('name'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('name')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('section'))) has-error @endif">
                                    <th><label for="section" class="control-label">部署・所属</label></th>
                                    <td>
                                        {!! Form::text('section', old('section'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('section')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
                                    <th><label for="zip" class="control-label">郵便番号<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('zip', null, ['class'=>'form-control form-sm', 'placeholder'=>'※000-0000 ハイフンあり', 'onKeyUp'=>"AjaxZip3.zip2addr(this,'','address','address');"]) !!}
                                        <span class="help-block">{{$errors->first('zip')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                                    <th><label for="address" class="control-label">住所<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('address', old('address'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                                        <span class="fs13">（例）530-0003 ※ハイフンあり・半角数字</span>
                                        <span class="help-block">{{$errors->first('address')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('tel'))) has-error @endif">
                                    <th><label for="tel" class="control-label">電話番号<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('tel', old('tel'), ['class'=>'form-control form-md', 'placeholder'=>'※00-0000-0000 ハイフンあり']) !!}
                                        <span class="fs13">（例）06-0000-0000 ※ハイフンあり・半角数字</span>
                                        <span class="help-block">{{$errors->first('tel')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                                    <th><label for="email" class="control-label">Eメール<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('email', old('email'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('email')}}</span>
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