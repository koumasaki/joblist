@extends('layouts.users_app')

@section('title', ' | ユーザー登録情報')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            ユーザー登録情報
            <small>ユーザー登録管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">ユーザー登録情報</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">{{ $user->company }}の登録内容</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table-wide mb10">
                            <tbody>
                                <tr>
                                    <th>会社名</td>
                                    <td>{{ $user->company }}</td>
                                </tr>
                                <tr>
                                    <th>表示URL</td>
                                    <td>{{ $user->display_url }}</td>
                                </tr>
                                <tr>
                                    <th>Eメール</td>
                                    <td>{{ $user->email }}<br>
                                    <span class="fs13 red">※Eメールを変更するとログイン用のメールも変更されます</span></td>
                                </tr>
                                <tr>
                                    <th>郵便番号</td>
                                    <td>{{ $user->zip }}</td>
                                </tr>
                                <tr>
                                    <th>住所</td>
                                    <td>{!! nl2br(e($user->address)) !!}</td>
                                </tr>
                                <tr>
                                    <th>電話番号</td>
                                    <td>{{ $user->tel }}</td>
                                </tr>
                                <tr>
                                    <th>担当者部署名</td>
                                    <td>{{ $user->section }}</td>
                                </tr>
                                <tr>
                                    <th>担当者名</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>メインキャッチコピー</td>
                                    <td>{{ $user->catch_copy }}</td>
                                </tr>
                                <tr>
                                    <th>メイン画像</td>
                                    <td>@if(is_null($user->main_image))<span class="red">画像が登録されていません</span>
                                    @else
                                    <div class="width50 img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
                                    @endif</td>
                                </tr>
                                <tr>
                                    <th>会社ロゴ</td>
                                    <td>@if(is_null($user->logo_image))<span class="red">画像が登録されていません</span>
                                    @else<img src="{{ asset('images/logo/'. $user->logo_image) }}">@endif</td>
                                </tr>
                                <tr>
                                    <th>会社紹介用コピー</td>
                                    <td>{{ $user->company_copy }}</td>
                                </tr>
                                <tr>
                                    <th>会社紹介文</td>
                                    <td>{!! nl2br(e($user->company_summary)) !!}</td>
                                </tr>
                                <tr>
                                    <th>設立（年月日）</td>
                                    <td>{{ $user->establishment }}</td>
                                </tr>
                                <tr>
                                    <th>資本金</td>
                                    <td>{{ $user->capitalstock }}</td>
                                </tr>
                                <tr>
                                    <th>従業員数</td>
                                    <td>{{ $user->number }}</td>
                                </tr>
                                <tr>
                                    <th>代表者名</td>
                                    <td>{{ $user->president }}</td>
                                </tr>
                                <tr>
                                    <th>事業紹介用コピー</td>
                                    <td>{{ $user->service_copy }}</td>
                                </tr>
                                <tr>
                                    <th>事業紹介文</td>
                                    <td>{!! nl2br(e($user->service_summary)) !!}</td>
                                </tr>
                                <tr>
                                    <th>コーポレートサイトURL</td>
                                    <td>{{ $user->site_url }}</td>
                                </tr>
                                <tr>
                                    <th>個人情報保護ページURL</td>
                                    <td>{{ $user->privacy_url }}</td>
                                </tr>
                                <tr>
                                    <th>copyright表記</td>
                                    <td>{{ $user->copyright }}</td>
                                </tr>
                                <tr>
                                    <th>リターゲティング用タグ</td>
                                    <td>@if(is_null($user->retarge_tag))設定なし
                                    @else
                                    設定あり
                                    @endif</td>
                                </tr>
                                <tr>
                                    <th>CV計測用タグ</td>
                                    <td>@if(is_null($user->cv_tag))設定なし
                                    @else
                                    設定あり
                                    @endif</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="pull-left mr5">
                            {!! link_to_route('user.edit', '登録情報を編集', ['id' => $user->id], ['class'=>'btn btn-primary']) !!}
                        </div>    
                        <div class="pull-left">
                            {!! link_to_route('company.show', '表示イメージを見る', ['id' => $user->display_url], ['class'=>'btn btn-success', 'target' => '_blank']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection