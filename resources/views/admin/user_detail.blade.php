@extends('layouts.admin_app')

@section('title', ' | 登録情報')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>の登録内容</h1>
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
                            <th>Eメール</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>担当者名</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {!! link_to_route('user.edit', '会社登録情報を編集', ['id' => $user->id], ['class'=>'btn btn-primary']) !!}
        </div>
    </div>
@endsection