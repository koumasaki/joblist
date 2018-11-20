@extends('layouts.app')

@section('title', $job->job_name. ' | '. $user->company )

@section('content')
<div id="cate_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ secure_asset('images/main_image/'. $user->main_image) }}"></div>
    </div>
</div>

<div class="container mb50">
    <div class="row">
        <div class="col-xs-12">
            <div class="dyjest_flame">
                <div class="row-eq-height">
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <p class="dyjest_title"><span>求人概要</span></p>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-4">
                        <dl class="mb0">
                            <dt><i class="fa fa-check-square"></i> 職種</dt>
                            <dd><?php 
                            switch($job->job_category) {
                                case 'sales':
                                    echo '営業';
                                    break;
                                case 'manage':
                                    echo '企画・経営';
                                    break;
                                case 'office':
                                    echo '事務・管理';
                                    break;
                                case 'service':
                                    echo '販売';
                                    break;
                                case 'others':
                                    echo 'その他サービス系';
                                    break;
                                case 'medical':
                                    echo '医療・福祉';
                                    break;
                                case 'education':
                                    echo '教育・保育・通訳';
                                    break;
                                case 'consul':
                                    echo 'コンサルタント・金融・不動産専門職';
                                    break;
                                case 'creative':
                                    echo 'クリエイティブ';
                                    break;
                                case 'web':
                                    echo 'WEB・インターネット・ゲーム';
                                    break;
                                case 'it':
                                    echo 'ITエンジニア';
                                    break;
                                case 'electric':
                                    echo '電気・電子・機械・半導体';
                                    break;
                                case 'industory':
                                    echo '建築・土木';
                                    break;
                                case 'chemical':
                                    echo '化学・食品・医薬';
                                    break;
                                case 'skill':
                                    echo '設備・技能・配送';
                                    break;
                                case 'official':
                                    echo '公共サービス';
                                    break;
                            }
                            ?></dd>
                            <dt><i class="fa fa-check-square"></i> 給与</dt>
                            <dd>{{ $job->simple_salary }}</dd>
                            <dt><i class="fa fa-check-square"></i> 勤務地</dt>
                            <dd>{{ $job->pref }}{{ $job->state }}</dd>
                        </dl>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <dl class="mb0">
                            <dt><i class="fa fa-circle-o"></i> 会社名</dt>
                            <dd>{{ $user->company }}</dd>
                            <dt><i class="fa fa-circle-o"></i> 業種</dt>
                            <dd><?php 
                            if (mb_strlen($user->company_summary) < 35) {
                                $companysummary = $user->company_summary;
                                echo $companysummary;
                            } else {
                                $companysummary = mb_substr( $user->company_summary, 0, 30);
                                echo $companysummary. '...';
                            }
                             ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="job_name">
                <div class="status"><?php 
                switch($job->job_status) {
                    case 'FULL_TIME':
                        echo '正社員';
                        break;
                    case 'CONTRACTOR':
                        echo '契約社員';
                        break;
                    case 'PART_TIME':
                        echo 'パート・アルバイト';
                        break;
                    case 'TEMPORARY':
                        echo '派遣社員';
                        break;
                    case 'COMMISSION':
                        echo '嘱託';
                        break;
                    case 'OTHER':
                        echo 'その他';
                        break;
                }
                ?></div>
                <h1>{{ $job->job_name }}</h1>
            </div>
            @if(!is_null($job->job_image))
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="job_copy_detail">{{ $job->job_copy }}</h4>
                    <p class="mb40">{!! nl2br(e($job->detail)) !!}</p>
                </div>
                <div class="col-sm-4 mb40">
                    <div class="job_img">
                        <div class="inner_img">
                            <div class="img_f"><img src="{{ secure_asset('images/job_image/'. $job->job_image) }}"></div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h4 class="job_copy_detail">{{ $job->job_copy }}</h4>
            <p class="mb40">{!! nl2br(e($job->detail)) !!}</p>
            @endif
            <table class="table-wide mb30">
                <tbody>
                    <tr>
                        <th>対象となる方</th>
                        <td>{!! nl2br(e($job->qualification)) !!}</td>
                    </tr>
                    <tr>
                        <th>給与</th>
                        <td>{{ $job->simple_salary }}<br>
                        {!! nl2br(e($job->salary)) !!}</td>
                    </tr>
                    @if(!is_null($job->allowance))
                    <tr>
                        <th>諸手当</th>
                        <td>{!! nl2br(e($job->allowance)) !!}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>勤務地</th>
                        <td>{!! nl2br(e($job->place)) !!}</td>
                    </tr>
                    <tr>
                        <th>勤務時間</th>
                        <td>{!! nl2br(e($job->time)) !!}</td>
                    </tr>
                    @if(!is_null($job->holiday))
                    <tr>
                        <th>休日・休暇</th>
                        <td>{!! nl2br(e($job->holiday)) !!}</td>
                    </tr>
                    @endif
                    @if(!is_null($job->bonus))
                    <tr>
                        <th>昇給・賞与</th>
                        <td>{!! nl2br(e($job->bonus)) !!}</td>
                    </tr>
                    @endif
                    @if(!is_null($job->benefit))
                    <tr>
                        <th>待遇・福利厚生</th>
                        <td>{!! nl2br(e($job->benefit)) !!}</td>
                    </tr>
                    @endif
                    @if(!is_null($job->add_title))
                    <tr>
                        <th>{{ $job->add_title }}</th>
                        <td>{!! nl2br(e($job->add_body)) !!}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <h3 class="mb15"><i class="fa fa-paper-plane"></i> 応募方法</h3>
            <table class="table-wide mb30">
                <tbody>
                    <tr>
                        <th>応募方法</th>
                        <td>{!! nl2br(e($job->entry_method)) !!}</td>
                    </tr>
                    <tr>
                        <th>連絡先</th>
                        <td>{{ $user->company }}<br>
                            @if(!is_null($recruiter_id))
                            {{ $recruiter->zip }} {{ $recruiter->address }}<br>
                            TEL：{{ $recruiter->tel }}@if(!is_null($recruiter->section))／{{$recruiter->section}}@endif
                            @else
                            {{ $user->zip }} {{ $user->address }}<br>
                            TEL：{{ $user->tel }}@if(!is_null($user->section))／{{$user->section}}@endif
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 text-center mb15">
                    @if($job->simple_form === 'simple')
                    <a href="{{ route('light.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}" class="btn btn-danger btn-block btn-lg"><i class="fa fa-envelope"></i> この求人に応募する</a>
                    @else<a href="{{ route('entry.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}" class="btn btn-danger btn-block btn-lg"><i class="fa fa-envelope"></i> この求人に応募する</a>
                    @endif
                </div>
                <div class="col-xs-12 text-center mb15 btn_tel">
                    <a href="tel:@if(!is_null($recruiter_id))<?php $contact = $recruiter->tel; echo str_replace(array('-', 'ー', '−', '―', '‐'), '', $contact); ?>@else<?php $contact = $user->tel; echo str_replace(array('-', 'ー', '−', '―', '‐'), '', $contact); ?>@endif" class="btn btn-primary btn-block btn-lg"><i class="fa fa-mobile"></i> 電話で問い合わせる</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection