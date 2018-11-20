@extends('layouts.admin_app')


@section('title', ' | 新規ユーザー登録')

@section('content')
    @if (Auth::check())
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            ユーザー管理
            <small>新規ユーザー登録</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">新規ユーザー登録</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h2 class="box-title">新規ユーザー登録</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(['route' => 'signup.post', 'class' => 'form-horizontal', 'files' => true]) !!}
                        <table class="table-form mb30">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('company'))) has-error @endif">
                                    <th><label for="company" class="control-label">会社名<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('company', old('company'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('company')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('display_url'))) has-error @endif">
                                    <th><label for="display_url" class="control-label">表示用URL<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('display_url', old('display_url'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('display_url')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('email'))) has-error @endif">
                                    <th><label for="email" class="control-label">Eメール<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('email', old('email'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('email')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('password'))) has-error @endif">
                                    <th><label for="password" class="control-label">パスワード<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::password('password', ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('password')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('password_confirmation'))) has-error @endif">
                                    <th><label for="password_confirmation" class="control-label">パスワード（確認用）<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::password('password_confirmation', ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
                                    <th><label for="zip" class="control-label">郵便番号<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('zip', old('zip'), ['class'=>'form-control form-xs', 'placeholder'=>'※000-0000 ハイフンあり']) !!}
                                        <span class="fs13">（例）530-0003 ※ハイフンあり・半角数字</span>
                                        <span class="help-block">{{$errors->first('zip')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                                    <th><label for="address" class="control-label">住所<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('address', old('address'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
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
                                <tr class="form-group @if(!empty($errors->first('section'))) has-error @endif">
                                    <th><label for="section" class="control-label">部署名</label></th>
                                    <td>
                                        {!! Form::text('section', old('section'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('section')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                                    <th><label for="name" class="control-label">担当者名<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('name', old('name'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('name')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('catch_copy'))) has-error @endif">
                                    <th><label for="catch_copy" class="control-label">メインコピー<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('catch_copy', old('catch_copy'), ['class'=>'form-control form-md', 'placeholder'=>'※20文字以内']) !!}
                                        <span class="help-block">{{$errors->first('catch_copy')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('main_image'))) has-error @endif">
                                    <th><label for="main_image" class="control-label">メイン画像<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::file('main_image') !!}
                                        <span class="fs13">※左右幅1600px以上の画像を登録</span>
                                        <span class="help-block">{{$errors->first('main_image')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('logo_image'))) has-error @endif">
                                    <th><label for="logo_image" class="control-label">会社ロゴ画像<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::file('logo_image') !!}
                                        <span class="fs13">※左右幅250px以下の画像を登録</span>
                                        <span class="help-block">{{$errors->first('logo_image')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('company_copy'))) has-error @endif">
                                    <th><label for="company_copy" class="control-label">会社紹介用コピー<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('company_copy', old('company_copy'), ['class'=>'form-control form-lg', 'placeholder'=>'※25文字以内']) !!}
                                        <span class="help-block">{{$errors->first('company_copy')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('company_summary'))) has-error @endif">
                                    <th><label for="company_summary" class="control-label">会社紹介文<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('company_summary', old('company_summary'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                                        <span class="help-block">{{$errors->first('company_summary')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('establishment'))) has-error @endif">
                                    <th><label for="establishment" class="control-label">設立年月日</label></th>
                                    <td>
                                        {!! Form::text('establishment', old('establishment'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('establishment')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('capitalstock'))) has-error @endif">
                                    <th><label for="capitalstock" class="control-label">資本金</label></th>
                                    <td>
                                        {!! Form::text('capitalstock', old('capitalstock'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('capitalstock')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('number'))) has-error @endif">
                                    <th><label for="number" class="control-label">従業員数</label></th>
                                    <td>
                                        {!! Form::text('number', old('number'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('number')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('president'))) has-error @endif">
                                    <th><label for="president" class="control-label">代表者名</label></th>
                                    <td>
                                        {!! Form::text('president', old('president'), ['class'=>'form-control form-sm']) !!}
                                        <span class="help-block">{{$errors->first('president')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('site_url'))) has-error @endif">
                                    <th><label for="site_url" class="control-label">企業サイトURL</label></th>
                                    <td>
                                        {!! Form::text('site_url', old('site_url'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('site_url')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('privacy_url'))) has-error @endif">
                                    <th><label for="privacy_url" class="control-label">個人情報保護ページURL</label></th>
                                    <td>
                                        {!! Form::text('privacy_url', old('privacy_url'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('privacy_url')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('service_copy'))) has-error @endif">
                                    <th><label for="service_copy" class="control-label">事業紹介用コピー<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('service_copy', old('service_copy'), ['class'=>'form-control form-lg', 'placeholder'=>'※25文字以内']) !!}
                                        <span class="help-block">{{$errors->first('service_copy')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('service_summary'))) has-error @endif">
                                    <th><label for="service_summary" class="control-label">事業紹介文<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('service_summary', old('service_summary'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                                        <span class="help-block">{{$errors->first('service_summary')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('copyright'))) has-error @endif">
                                    <th><label for="copyright" class="control-label">copyright表記<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('copyright', old('copyright'), ['class'=>'form-control form-md', 'placeholder'=>'※基本半角英数字']) !!}
                                        <span class="help-block">{{$errors->first('copyright')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('retarge_tag'))) has-error @endif">
                                    <th><label for="retarge_tag" class="control-label">リターゲティング用タグ</label></th>
                                    <td>
                                        {!! Form::textarea('retarge_tag', old('retarge_tag'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                                        <span class="help-block">{{$errors->first('retarge_tag')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('cv_tag'))) has-error @endif">
                                    <th><label for="cv_tag" class="control-label">CV計測用タグ</label></th>
                                    <td>
                                        {!! Form::textarea('cv_tag', old('cv_tag'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                                        <span class="help-block">{{$errors->first('cv_tag')}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('新規登録', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    @endif
@endsection