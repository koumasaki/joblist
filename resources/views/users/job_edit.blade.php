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
                        <table class="table-form mb30">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('job_name'))) has-error @endif">
                                    <th><label for="job_name" class="control-label">募集職種名<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('job_name', null, ['class'=>'form-control form-md', 'placeholder'=>'※職種名のみ（装飾は原則禁止）']) !!}
                                        <span class="help-block">{{$errors->first('job_name')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('job_status'))) has-error @endif">
                                    <th><label for="job_status" class="control-label">雇用形態<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        <div class="radio"><label>{!! Form::radio('job_status', 'FULL_TIME') !!} 正社員</label></div>
                                        <div class="radio"><label>{!! Form::radio('job_status', 'CONTRACTOR') !!} 契約社員</label></div>
                                        <div class="radio"><label>{!! Form::radio('job_status', 'PART_TIME') !!} パート・アルバイト</label></div>
                                        <div class="radio"><label>{!! Form::radio('job_status', 'TEMPORARY') !!} 派遣社員</label></div>
                                        <div class="radio"><label>{!! Form::radio('job_status', 'COMMISSION') !!} 嘱託</label></div>
                                        <div class="radio"><label>{!! Form::radio('job_status', 'OTHER') !!} その他</label></div>
                                        <span class="help-block">{{$errors->first('job_status')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('job_copy'))) has-error @endif">
                                    <th><label for="job_copy" class="control-label">職種情報補足コピー<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('job_copy', old('job_copy'), ['class'=>'form-control form-lg']) !!}
                                        <span class="help-block">{{$errors->first('job_copy')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('detail'))) has-error @endif">
                                    <th><label for="detail" class="control-label">仕事内容<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('detail', old('detail'), ['class' => 'form-control form-lg', 'rows' => '10']) !!}
                                        <span class="help-block">{{$errors->first('detail')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('qualification'))) has-error @endif">
                                    <th><label for="qualification" class="control-label">応募資格<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('qualification', old('qualification'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('qualification')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('simple_salary'))) has-error @endif">
                                    <th><label for="simple_salary" class="control-label">給与（改行不可）<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('simple_salary', old('simple_salary'), ['class'=>'form-control form-md', 'placeholder'=>'※改行禁止']) !!}
                                        <span class="fs13">（例）月給00万円以上　※給与例等の補足は下の「給与補足」欄にご入力ください。</span>
                                        <span class="help-block">{{$errors->first('simple_salary')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('salary'))) has-error @endif">
                                    <th><label for="salary" class="control-label">給与補足</label></th>
                                    <td>
                                        {!! Form::textarea('salary', old('salary'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('salary')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('allowance'))) has-error @endif">
                                    <th><label for="allowance" class="control-label">諸手当</label></th>
                                    <td>
                                        {!! Form::textarea('allowance', old('allowance'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('allowance')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('place'))) has-error @endif">
                                    <th><label for="place" class="control-label">勤務地<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('place', old('place'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="fs13">※勤務地は原則1箇所のみを記載してください。</span>
                                        <span class="help-block">{{$errors->first('place')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('time'))) has-error @endif">
                                    <th><label for="time" class="control-label">勤務時間<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('time', old('time'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('time')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('holiday'))) has-error @endif">
                                    <th><label for="holiday" class="control-label">休日・休暇</label></th>
                                    <td>
                                        {!! Form::textarea('holiday', old('holiday'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('holiday')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('bonus'))) has-error @endif">
                                    <th><label for="holiday" class="control-label">昇給・賞与</label></th>
                                    <td>
                                        {!! Form::textarea('bonus', old('bonus'), ['class' => 'form-control form-lg', 'rows' => '3']) !!}
                                        <span class="help-block">{{$errors->first('bonus')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('benefit'))) has-error @endif">
                                    <th><label for="benefit" class="control-label">待遇・福利厚生</label></th>
                                    <td>
                                        {!! Form::textarea('benefit', old('benefit'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('benefit')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('add_title'))) has-error @endif">
                                    <th><label for="add_title" class="control-label">追加項目（タイトル）</label></th>
                                    <td>
                                        {!! Form::text('add_title', old('add_title'), ['class'=>'form-control form-sm']) !!}
                                        <span class="fs13">※項目を追加する場合、「タイトル」と下の「本文」両方に入力してください。</span>
                                        <span class="help-block">{{$errors->first('add_title')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('add_body'))) has-error @endif">
                                    <th><label for="add_body" class="control-label">追加項目（本文）</label></th>
                                    <td>
                                        {!! Form::textarea('add_body', old('add_body'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('add_body')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('job_image'))) has-error @endif">
                                    <th><label for="job_image" class="control-label">仕事画像</label></th>
                                    <td>
                                        @if(!is_null($job->job_image))
                                        <div class="row mb15">
                                            <div class="col-sm-5">
                                                <div class="img_f"><img src="{{ asset('images/job_image/'. $job->job_image) }}" alt=""></div>
                                            </div>
                                        </div>
                                        @endif
                                        {!! Form::file('job_image', old('job_image')) !!}
                                        <span class="fs13">※左右幅400px以上の画像を登録</span>
                                        <span class="help-block">{{$errors->first('job_image')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('entry_method'))) has-error @endif">
                                    <th><label for="entry_method" class="control-label">応募方法<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::textarea('entry_method', old('entry_method'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('entry_method')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('simple_form'))) has-error @endif">
                                    <th><label for="simple_form" class="control-label">エントリーフォーム種類<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        <div class="radio"><label>{!! Form::radio('simple_form', 'regular', true) !!} 通常エントリーフォーム</label></div>
                                        <div class="radio"><label>{!! Form::radio('simple_form', 'simple') !!} シンプルフォーム</label></div>
                                        <span class="help-block">{{$errors->first('simple_form')}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="mb30">各種設定</h3>
                        <table class="table-form mb30">
                            <tbody>
                                <tr class="form-group @if(!empty($errors->first('job_category'))) has-error @endif">
                                    <th><label for="job_category" class="control-label">職種カテゴリー<span class="fs13 red"> (※)</span></label></th>
                                    <td>
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
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('zip'))) has-error @endif">
                                    <th><label for="zip" class="control-label">郵便番号（７桁）<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('zip', old('zip'), ['class'=>'form-control form-xs', 'placeholder'=>'※ハイフンなし', 'onKeyUp'=>"AjaxZip3.zip2addr(this,'','pref','state');"]) !!}
                                        <span class="fs13">（例）5300003 ※ハイフンなし・半角数字</span>
                                        <span class="help-block">{{$errors->first('zip')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('pref'))) has-error @endif">
                                    <th><label for="pref" class="control-label">都道府県<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('pref', old('pref'), ['class'=>'form-control form-sm', 'placeholder'=>'※郵便番号入力で自動']) !!}
                                        <span class="help-block">{{$errors->first('pref')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('state'))) has-error @endif">
                                    <th><label for="state" class="control-label">市区町村<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('state', old('state'), ['class'=>'form-control form-sm', 'placeholder'=>'※郵便番号入力で自動']) !!}
                                        <span class="help-block">{{$errors->first('state')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('address'))) has-error @endif">
                                    <th><label for="address" class="control-label">町名番地・ビル名</label></th>
                                    <td>
                                        {!! Form::text('address', old('address'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('address')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('station'))) has-error @endif">
                                    <th><label for="station" class="control-label">最寄り駅</label></th>
                                    <td>
                                        {!! Form::text('station', old('station'), ['class'=>'form-control form-md']) !!}
                                        <span class="fs13">（例）〇〇駅より徒歩〇分 ※沿線名等の入力はNG</span>
                                        <span class="help-block">{{$errors->first('station')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('education'))) has-error @endif">
                                    <th><label for="education" class="control-label">学歴</label></th>
                                    <td>
                                        {!! Form::textarea('education', old('education'), ['class' => 'form-control form-lg', 'rows' => '5']) !!}
                                        <span class="help-block">{{$errors->first('education')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('salary_type'))) has-error @endif">
                                    <th><label for="salary_type" class="control-label">給与種別<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::select('salary_type', ['' => '--選択--', 'HOUR' => '時給', 'DAY' => '日給', 'WEEK'=> '週給', 'MONTH'=> '月給', 'YEAR'=> '年俸制'], old('salary_type'), ['class'=>'form-control']) !!}
                                        <span class="help-block">{{$errors->first('salary_type')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('salary_low'))) has-error @endif">
                                    <th><label for="salary_low" class="control-label">最低賃金額<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::text('salary_low', old('salary_low'), ['class'=>'form-control form-sm', 'placeholder'=>'※半角数字のみ']) !!} 
                                        <span class="fs13">※最低賃金が時給1000円の場合、「1000」のみ入力してください。</span>
                                        <span class="help-block">{{$errors->first('salary_low')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('salary_high'))) has-error @endif">
                                    <th><label for="salary_high" class="control-label">最高賃金額</label></th>
                                    <td>
                                        {!! Form::text('salary_high', old('salary_high'), ['class'=>'form-control form-sm', 'placeholder'=>'※半角数字のみ']) !!} 
                                        <span class="fs13">※半角数字のみ入力</span>
                                        <span class="help-block">{{$errors->first('salary_high')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('release'))) has-error @endif">
                                    <th><label for="release" class="control-label">公開設定<span class="fs13 red"> (※)</span></label></th>
                                    <td>
                                        {!! Form::select('release', ['' => '--選択--', 'release' => '公開', 'unrelease' => '未公開'], old('release'), ['class'=>'form-control']) !!}
                                        <span class="help-block">{{$errors->first('release')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('recruiter'))) has-error @endif">
                                    <th><label for="recruiter" class="control-label">担当者</label></th>
                                    <td>
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
                                        <span class="fs13 red">※求人案件を編集する場合、担当者に変更がなくても必ずセレクトボックスより担当者を再度選択してください。</span>
                                        @else
                                        {{ $user->name }}／{{ $user->email }}<br>
                                        <span class="fs13">※担当者を変更する場合は、先に担当者情報を追加してください。</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('original_category'))) has-error @endif">
                                    <th><label for="original_category" class="control-label">独自カテゴリー</label></th>
                                    <td>
                                        {!! Form::text('original_category', old('original_category'), ['class'=>'form-control form-md']) !!}
                                        <span class="fs13">※Indeedの有料広告で配信のグループ分けを利用する際に、任意の名称を入力してください。</span>
                                        <span class="help-block">{{$errors->first('original_category')}}</span>
                                    </td>
                                </tr>
                                <tr class="form-group @if(!empty($errors->first('memo'))) has-error @endif">
                                    <th><label for="memo" class="control-label">備考・メモ</label></th>
                                    <td>
                                        {!! Form::text('memo', old('memo'), ['class'=>'form-control form-md']) !!}
                                        <span class="help-block">{{$errors->first('memo')}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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