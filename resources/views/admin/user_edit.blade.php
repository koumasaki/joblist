@extends('layouts.admin_app')

@section('title', ' | 登録情報更新')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $user->company }}の登録内容編集</h1>
            <hr>
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put']) !!}
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
                            <th>{!! Form::label('email', 'Eメール') !!}</td>
                            <td>
                                {!! Form::text('email', null, ['class'=>'form-control']) !!}
                                <span class="help-block">{{$errors->first('email')}}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>{!! Form::label('name', '会社名') !!}</td>
                            <td>
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                <span class="help-block">{{$errors->first('name')}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection