@extends('layouts.users_app')

@section('title', ' | 登録情報')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $user->company }}の登録内容</h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>登録項目</th>
                            <th>登録内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>会社名</td>
                            <td>{{ $user->company }}</td>
                        </tr>
                        <tr>
                            <th>Eメール</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>担当者名</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>メイン画像</td>
                            <td>@if(is_null($user->main_image))<span class="red">画像が登録されていません</span>
                            @else<img src="{{ asset('images/main_image/'. $user->main_image) }}">@endif</td>
                        </tr>
                        <tr>
                            <th>会社ロゴ</td>
                            <td>@if(is_null($user->logo_image))<span class="red">画像が登録されていません</span>
                            @else<img src="{{ asset('images/logo/'. $user->logo_image) }}">@endif</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {!! link_to_route('user.edit', '会社登録情報を編集', ['id' => $user->id], ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
@endsection