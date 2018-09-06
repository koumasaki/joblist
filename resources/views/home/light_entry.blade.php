@extends('layouts.app')

@section('title',  'エントリーフォーム | '. $user->company )

@section('content')
<div id="cate_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
    </div>
</div>

<div class="container mb50">
    <div class="row">
        <div class="col-md-12">
            <h1>エントリーフォーム</h1>
            <hr>
            @if (count($errors) > 0)
            <div class="alert alert-warning">入力内容に間違いがございます。<br>以下のメッセージをご確認のうえ、必要項目へのご入力をお願いします。</div>
            @endif
            {!! Form::open(['route' => ['light.confirm', $user->display_url, $job->id], 'class' => 'form-horizontal']) !!}
                <table class="table-wide mb20">
                    <tbody>
                        <tr>
                            <th>希望職種</th>
                            <td>{{ $job->job_name }}<input type="hidden" id="job_name" name="job_name" value="{{ $job->job_name }}"></td>
                        </tr>
                        <tr>
                            <th>希望勤務地</th>
                            <td>{{ $job->place }}<input type="hidden" id="job_place" name="job_place" value="{{ $job->place }}"></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table-form mb30">
                    <tbody>
                        <tr class="form-group @if(!empty($errors->first('name'))) has-error @endif">
                            <th>{!! Form::label('name', '氏名', ['class'=>'control-label']) !!}</th>
                            <td>
                                {!! Form::text('name', old('name'), ['class'=>'form-control form-sm']) !!}
                                <span class="help-block-ent">{{$errors->first('name')}}</span>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('gender'))) has-error @endif">
                            <th>{!! Form::label('gender', '性別', ['class'=>'control-label']) !!}</th>
                            <td>
                                <div class="form-inline">
                                    <div class="radio"><label>{!! Form::radio('gender', '男性') !!} 男性　</label></div>
                                    <div class="radio"><label>{!! Form::radio('gender', '女性') !!} 女性</label></div>
                                    <span class="help-block-ent">{{$errors->first('gender')}}</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('year')) or !empty($errors->first('month')) or !empty($errors->first('day'))) has-error @endif">
                            <th>{!! Form::label('year', '生年月日', ['class'=>'control-label']) !!}</th>
                            <td>
                    		    <div class="form-inline">
                                    <?php
                                        $year = date('Y')-15;
                                        $i = $year-55;
                                        $year_data = ['' => '- 年 -'];
                                        for($i; $i<=$year; $i++) {
                                            $year_data[$i] = $i;
                                        }
                                    ?>
                                    {!! Form::select('year', $year_data, old('year'), ['class'=>'form-control']) !!}
                        	         年 
                    		        <?php 
                    		            $m = 1;
                    		            $month = ['' => '- 月 -'];
                                        for($m; $m<=12; $m++) {
                                            $month[$m] = $m;
                                        }
                    		        ?>
                    		        {!! Form::select('month', $month, old('month'), ['class'=>'form-control']) !!}
                        	         月 
                    		        <?php 
                    		            $d = 1;
                    		            $day = ['' => '- 日 -'];
                                        for($d; $d<=31; $d++) {
                                            $day[$d] = $d;
                                        }
                    		        ?>
                    		        {!! Form::select('day', $day, old('day'), ['class'=>'form-control']) !!}
                        	         日
                        	        <span class="help-block-ent">@if($errors->first('year') or $errors->first('month') or $errors->first('day'))
                        	        ※生年月日は必須入力です。
                        	        @endif</span>
                    		    </div>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('mail'))) has-error @endif">
                            <th>{!! Form::label('mail', 'メールアドレス', ['class'=>'control-label']) !!}</th>
                            <td>
                                {!! Form::text('mail', old('mail'), ['class'=>'form-control form-md']) !!}
                                <span class="help-block-ent">{{$errors->first('mail')}}</span>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('tel'))) has-error @endif">
                            <th>{!! Form::label('tel', '電話番号', ['class'=>'control-label']) !!}</th>
                            <td>
                                {!! Form::text('tel', old('tel'), ['class'=>'form-control form-sm', 'placeholder'=>'※ハイフンなし']) !!}
                                <span class="help-block-ent">{{$errors->first('tel')}}</span>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
                            <th>{!! Form::label('zip', '郵便番号（7桁）', ['class'=>'control-label']) !!}</th>
                            <td>
                                {!! Form::text('zip', old('zip'), ['class'=>'form-control form-xs', 'placeholder'=>'※ハイフンなし', 'onKeyUp'=>"AjaxZip3.zip2addr(this,'','address','address');"]) !!}
                                <span class="help-block-ent">{{$errors->first('zip')}}</span>
                            </td>
                        </tr>
                        <tr class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                            <th>{!! Form::label('address', '住所', ['class'=>'control-label']) !!}</th>
                            <td>
                                {!! Form::text('address', old('address'), ['class'=>'form-control form-lg']) !!}
                                <span class="help-block-ent">{{$errors->first('address')}}</span>
                            </td>
                        </tr>
                        <tr class="form-group">
                            <th>{!! Form::label('myself', '自己PR', ['class'=>'control-label']) !!}</th>
                            <td>
                                {!! Form::textarea('myself', old('myself'), ['class' => 'form-control form-lg', 'rows' => '4']) !!}
                            </td>
                        </tr>
                    </tbody>
                </table>
                {!! Form::submit('確認する', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection