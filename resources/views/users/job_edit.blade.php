@extends('layouts.users_app')

@section('title', ' | 募集要項編集')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>募集要項（{{ $job->job_name }}）の編集</h1>
            <hr>
            {!! Form::model($job, ['route' => ['job.update', $job->id], 'class' => 'form-horizontal', 'method' => 'put', 'files' => true]) !!}
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
            	<div class="form-group @if(!empty($errors->first('pref'))) has-error @endif">
            		{!! Form::label('pref', '都道府県', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-3">
            		    {!! Form::select('pref', [
            		        '' => '--選択--',
            		        'hokkaido' => '北海道',
            		        'aomori' => '青森',
            		        'akita' => '秋田',
            		        'iwate' => '岩手',
            		        'miyagi' => '宮城',
            		        'yamagata' => '山形',
            		        'fukushima' => '福島',
            		        'ibaragi' => '茨城',
            		        'tochigi' => '栃木',
            		        'gunma' => '群馬',
            		        'saitama' => '埼玉',
            		        'chiba' => '千葉',
            		        'tokyo' => '東京',
            		        'kanagawa' => '神奈川',
            		        'niigata' => '新潟',
            		        'toyama' => '富山',
            		        'ishikawa' => '石川',
            		        'fukui' => '福井',
            		        'yamanashi' => '山梨',
            		        'nagano' => '長野',
            		        'gifu' => '岐阜',
            		        'sizuoka' => '静岡',
            		        'aichi' => '愛知',
            		        'mie' => '三重',
            		        'shiga' => '滋賀',
            		        'kyoto' => '京都',
            		        'osaka' => '大阪',
            		        'hyogo' => '兵庫',
            		        'nara' => '奈良',
            		        'wakayama' => '和歌山',
            		        'okayama' => '岡山',
            		        'hiroshima' => '広島',
            		        'yamaguchi' => '山口',
            		        'tottori' => '鳥取',
            		        'shimane' => '島根',
            		        'tokushima' => '徳島',
            		        'kagawa' => '香川',
            		        'ehime' => '愛媛',
            		        'kouchi' => '高知',
            		        'fukuoka' => '福岡',
            		        'saga' => '佐賀',
            		        'nagasaki' => '長崎',
            		        'oita' => '大分',
            		        'kumamoto' => '熊本',
            		        'miyazaki' => '宮崎',
            		        'kagoshima' => '鹿児島',
            		        'okinawa' => '沖縄'
            		    ], old('pref'), ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('pref')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('release'))) has-error @endif">
            		{!! Form::label('release', '公開設定', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-3">
            		    {!! Form::select('release', ['' => '--選択--', 'release' => '公開', 'unrelease' => '未公開'], old('release'), ['class'=>'form-control']) !!}
                        <span class="help-block">{{$errors->first('release')}}</span>
            		</div>
            	</div>
            	<div class="form-group @if(!empty($errors->first('sender_mail'))) has-error @endif">
            		{!! Form::label('sender_mail', 'エントリー通知受信アドレス', ['class'=>'col-sm-3 control-label']) !!}
            		<div class="col-sm-9">
                        {!! Form::text('sender_mail', old('sender_mail'), ['class'=>'form-control form-md']) !!}
                        <span class="help-block">{{$errors->first('sender_mail')}}</span>
            		</div>
            	</div>
                {!! Form::submit('更新する', ['class'=>'btn btn-primary']) !!}
                {!! link_to_route('job.index', '戻る', '', ['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection