@extends('layouts.users_app')

@section('title', ' | 応募者へのメール作成')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>応募者へのメール作成</h1>
            <hr>
                <div class="row mb15">
                    {!! Form::open(['route' => ['mail.read', $entry->id], 'class' => 'form-horizontal']) !!}
                        <div class="col-sm-5 mb5">
                            <select class="form-control form-lg" id="template_id" name="template_id">
                                <option value=''>-- テンプレートを選択 --</option>
                            @foreach($mailtemplates as $mailtemplate)
                                <option value={{ $mailtemplate->id }}>{{ $mailtemplate->title }}</option>
                            @endforeach
                            </select>                        
                        </div>
                        <div class="col-sm-3 mb5">
                            {!! Form::submit('テンプレートを読み込む', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                {!! Form::open(['route' => ['mail.store', $entry->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" id="entry_id" name="entry_id" value="{{ $entry->id }}">
                <table class="table-wide mb20">
                    <tbody>
                        <tr>
                            <th>応募者</th>
                            <td>{{ $entry->name }}<input type="hidden" id="to_name" name="to_name" value="{{ $entry->name }}"></td>
                        </tr>
                        <tr>
                            <th>宛先</th>
                            <td>{{ $entry->mail }}<input type="hidden" id="to_mail" name="to_mail" value="{{ $entry->mail }}"></td>
                        </tr>
                    </tbody>
                </table>

                <table class="table-form mb30">
                    <tbody>
                        <tr class="form-group @if(!empty($errors->first('title'))) has-error @endif">
                            <th>{!! Form::label('title', 'タイトル', ['class'=>'control-label']) !!}</th>
                            <td>
                                @if(!empty($template))
                                {!! Form::text('title', $template->title , ['class'=>'form-control form-md']) !!}
                                @else
                                {!! Form::text('title', old('title'), ['class'=>'form-control form-md']) !!}
                                @endif
                                <span class="help-block-ent">{{$errors->first('title')}}</span>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('body'))) has-error @endif">
                            <th>{!! Form::label('body', '本文', ['class'=>'control-label']) !!}</th>
                            <td>
                                <p>{{ $entry->name }} 様</p>
                                @if(!empty($template))
                                {!! Form::textarea('body', $template->body , ['class' => 'form-control form-lg', 'rows' => '15']) !!}
                                @else
                                {!! Form::textarea('body', old('body') , ['class' => 'form-control form-lg', 'rows' => '15']) !!}
                                @endif
                                <span class="help-block-ent">{{$errors->first('body')}}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {!! Form::submit('送信する', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection