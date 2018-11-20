<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<source>
<publisher>Feedjob</publisher>
<publisherurl>{{ url('/') }}</publisherurl>
<?php $now = date("D, d M Y H:i:s T"); ?>
<lastBuildDate><?php echo $now; ?></lastBuildDate>
@foreach($jobs as $job)
<job>
<title><![CDATA[{{ $job->job_name }}]]></title>
<date><![CDATA[{{ $job->updated_at->format('D, d M Y H:i:s T') }}]]></date>
<referencenumber><![CDATA[{{ $job->user->display_url. '_job_'.$job->id }}]]></referencenumber>
<url><![CDATA[{{ url('/'. $job->user->display_url. '/job_'. $job->id) }}]]></url>
<company><![CDATA[{{ $job->user->company }}]]></company>
<sourcename><![CDATA[{{ $job->user->company }}]]></sourcename>
<city><![CDATA[{{ $job->state. $job->address }}]]></city>
<state><![CDATA[{{ $job->pref }}]]></state>
<country><![CDATA[日本]]></country>
<postalcode><![CDATA[{{ $job->zip }}]]></postalcode>
@if(!is_null($job->station))
<station><![CDATA[{{ $job->station }}]]></station>
@endif
<description><![CDATA[{{ $job->job_copy }}

【仕事内容】
{{ $job->detail }}

【対象となる方】
{{ $job->qualification }}

【給与】
{{ $job->simple_salary }}
{{ $job->salary }}

@if(!is_null($job->allowance))
【諸手当】
{{ $job->allowance }}

@endif
【勤務地】
{{ $job->place }}

【勤務時間】
{{ $job->time }}

@if(!is_null($job->holiday))
【休日・休暇】
{{ $job->holiday }}

@endif
@if(!is_null($job->bonus))
【昇給・賞与】
{{ $job->bonus }}

@endif
@if(!is_null($job->benefit))
【待遇・福利厚生】
{{ $job->benefit }}
@endif]]></description>
<salary><![CDATA[{{ $job->simple_salary }}]]></salary>
@if(!is_null($job->education))
<education><![CDATA[{{ $job->education }}]]></education>
@endif
<jobtype><![CDATA[<?php 
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
    ?>]]></jobtype>
<category><![CDATA[<?php 
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
    ?>@if(!is_null($job->original_category)), {{ $job->original_category }}@endif]]></category>
<experience><![CDATA[{{ $job->qualification }}]]></experience>
</job>
@endforeach
</source>