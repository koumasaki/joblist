@extends('layouts.users_app')

@section('title', ' | 求人案件編集')


@section('content')
    <section class="content-header" style="padding-top: 20px;">
        <h1>
            求人案件編集
            <small>求人案件管理</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/user"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">求人案件編集</li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                    <h2 class="box-title">求人案件（{{ $job->job_name }}）の編集フォーム</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model($job, ['route' => ['job.update', $job->id], 'class' => 'form-horizontal', 'method' => 'put', 'files' => true]) !!}
                        <div class="form-group @if(!empty($errors->first('job_name'))) has-error @endif">
                            {!! Form::label('job_name', '募集職種名', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('job_name', null, ['class'=>'form-control form-md']) !!}
                                <span class="help-block">{{$errors->first('job_name')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('job_status'))) has-error @endif">
                            {!! Form::label('job_status', '雇用形態', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="radio"><label>{!! Form::radio('job_status', 'regular') !!} 正社員</label></div>
                                <div class="radio"><label>{!! Form::radio('job_status', 'contractor') !!} 契約社員</label></div>
                                <div class="radio"><label>{!! Form::radio('job_status', 'parttime') !!} パート</label></div>
                                <div class="radio"><label>{!! Form::radio('job_status', 'arbite') !!} アルバイト</label></div>
                                <div class="radio"><label>{!! Form::radio('job_status', 'temp') !!} 派遣社員</label></div>
                                <div class="radio"><label>{!! Form::radio('job_status', 'commission') !!} 嘱託</label></div>
                                <div class="radio"><label>{!! Form::radio('job_status', 'others') !!} その他</label></div>
                                <span class="help-block">{{$errors->first('job_status')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('job_copy'))) has-error @endif">
                            {!! Form::label('job_copy', '職種情報補足コピー', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('job_copy', old('job_copy'), ['class'=>'form-control form-lg']) !!}
                                <span class="help-block">{{$errors->first('job_copy')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('detail'))) has-error @endif">
                            {!! Form::label('job_status', '仕事内容', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('detail', old('detail'), ['class' => 'form-control form-lg', 'rows' => '10']) !!}
                                <span class="help-block">{{$errors->first('detail')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('qualification'))) has-error @endif">
                            {!! Form::label('qualification', '応募資格', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('qualification', old('qualification'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('qualification')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('salary'))) has-error @endif">
                            {!! Form::label('salary', '給与', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('salary', old('salary'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('salary')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('allowance'))) has-error @endif">
                            {!! Form::label('allowance', '諸手当', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('allowance', old('allowance'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('allowance')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('place'))) has-error @endif">
                            {!! Form::label('place', '勤務地', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('place', old('place'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('place')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('time'))) has-error @endif">
                            {!! Form::label('time', '勤務時間', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('time', old('time'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('time')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('holiday'))) has-error @endif">
                            {!! Form::label('holiday', '休日・休暇', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('holiday', old('holiday'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('holiday')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('bonus'))) has-error @endif">
                            {!! Form::label('bonus', '昇給・賞与', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('bonus', old('bonus'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('bonus')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('benefit'))) has-error @endif">
                            {!! Form::label('benefit', '待遇・福利厚生', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('benefit', old('benefit'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('benefit')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('add_title'))) has-error @endif">
                            {!! Form::label('add_title', '追加項目（タイトル）', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('add_title', old('add_title'), ['class'=>'form-control form-sm']) !!}
                                <span class="help-block">{{$errors->first('add_title')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('add_body'))) has-error @endif">
                            {!! Form::label('add_body', '追加項目（本文）', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('add_body', old('add_body'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('add_body')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('job_image'))) has-error @endif">
                            {!! Form::label('job_image', '仕事画像', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                @if(!is_null($job->job_image))
                                <div class="row mb15">
                                    <div class="col-sm-5">
                                        <div class="img_f"><img src="{{ asset('images/job_image/'. $job->job_image) }}" alt=""></div>
                                    </div>
                                </div>
                                @endif
                                {!! Form::file('job_image', old('job_image')) !!}
                                <span class="help-block">{{$errors->first('job_image')}}</span>
                                <span class="help-block">※左右幅400px以上の画像を登録</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('entry_method'))) has-error @endif">
                            {!! Form::label('entry_method', '応募方法', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('entry_method', old('entry_method'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('entry_method')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('simple_form'))) has-error @endif">
                            {!! Form::label('simple_form', 'エントリーフォーム種類', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="radio"><label>{!! Form::radio('simple_form', 'regular', true) !!} 通常エントリーフォーム</label></div>
                                <div class="radio"><label>{!! Form::radio('simple_form', 'simple') !!} シンプルフォーム</label></div>
                                <span class="help-block">{{$errors->first('simple_form')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('job_category'))) has-error @endif">
                            {!! Form::label('job_category', '職種カテゴリー', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::select('job_category', [
                                    '' => '--選択--',
                                    'sales' => '営業',
                                    'manage' => '企画・経営',
                                    'office' => '事務・管理',
                                    'service' => '販売',
                                    'others' => 'その他サービス系',
                                    'medical' => '医療・福祉',
                                    'education' => '教育・保育・通訳',
                                    'consul' => 'コンサルタント・金融・不動産専門職',
                                    'creative' => 'クリエイティブ',
                                    'web' => 'WEB・インターネット・ゲーム',
                                    'it' => 'ITエンジニア',
                                    'electric' => '電気・電子・機械・半導体',
                                    'industory' => '建築・土木',
                                    'chemical' => '化学・食品・医薬',
                                    'skill' => '設備・技能・配送',
                                    'official' => '公共サービス'
                                ], old('job_category'), ['class'=>'form-control']) !!}
                                <span class="help-block">{{$errors->first('job_category')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
                            {!! Form::label('zip', '郵便番号（７桁）', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('zip', old('zip'), ['class'=>'form-control form-sm', 'placeholder'=>'※ハイフンなし', 'onKeyUp'=>"AjaxZip3.zip2addr(this,'','pref','state');"]) !!}
                                <span class="help-block">{{$errors->first('zip')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('pref'))) has-error @endif">
                            {!! Form::label('pref', '都道府県', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('pref', old('pref'), ['class'=>'form-control form-xs']) !!}
                                <span class="help-block">{{$errors->first('pref')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('state'))) has-error @endif">
                            {!! Form::label('state', '市区町村', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('state', old('state'), ['class'=>'form-control form-md']) !!}
                                <span class="help-block">{{$errors->first('state')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('station'))) has-error @endif">
                            {!! Form::label('station', '最寄り駅', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('station', old('station'), ['class'=>'form-control form-md']) !!}
                                <span class="help-block">{{$errors->first('station')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('simple_salary'))) has-error @endif">
                            {!! Form::label('simple_salary', '給与（簡易表示）', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('simple_salary', old('simple_salary'), ['class'=>'form-control form-md', 'placeholder'=>'※Indeedの検索一覧に表示']) !!}
                                <span class="help-block">{{$errors->first('simple_salary')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('education'))) has-error @endif">
                            {!! Form::label('education', '学歴', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::textarea('education', old('education'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                <span class="help-block">{{$errors->first('education')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('release'))) has-error @endif">
                            {!! Form::label('release', '公開設定', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::select('release', ['' => '--選択--', 'release' => '公開', 'unrelease' => '未公開'], old('release'), ['class'=>'form-control']) !!}
                                <span class="help-block">{{$errors->first('release')}}</span>
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('recruiter'))) has-error @endif">
                            {!! Form::label('recruiter', '担当者', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                @if(count($recruiter) > 0)
                                <p class="mb10">{{ $recruiter->name }}/{{ $recruiter->section }}</p>
                                @endif
                                @if( count($recruiters) > 0 )
                                <select class="form-control form-md" id="recruiter" name="recruiter">
                                    <option value=''>{{ $user->name }}／{{ $user->email }}</option>
                                    @foreach($recruiters as $recruiter)
                                        <option value={{ $recruiter->id }}>{{ $recruiter->name }}／{{ $recruiter->email }}</option>
                                    @endforeach
                                </select>
                                <span class="fs13 red">※求人案件を編集する場合、担当者に変更がなくても必ずセレクトボックスより担当者を再度選択してください</span>
                                @else
                                {{ $user->name }}／{{ $user->email }}<br>
                                <span class="fs13">※担当者を変更する場合は、先に担当者情報を追加してください。</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group @if(!empty($errors->first('original_category'))) has-error @endif">
                            {!! Form::label('original_category', '独自カテゴリー', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('original_category', old('original_category'), ['class'=>'form-control form-md']) !!}
                                <span class="help-block">{{$errors->first('original_category')}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('memo', 'メモ', ['class'=>'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('memo', old('memo'), ['class'=>'form-control form-sm']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('更新する', ['class'=>'btn btn-primary']) !!}
                        {!! link_to_route('job.index', '戻る', '', ['class'=>'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div> 
    </section>
    <!-- /.content -->
@endsection