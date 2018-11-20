<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/base.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@if(\Route::current() -> getName() == 'job.show')
<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "JobPosting",
    "baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "JPY",
        "value": {
            "@type": "QuantitativeValue",
@if(!is_null($job->salary_high))
            "minValue": {{ $job->salary_low }},
            "maxValue": {{ $job->salary_high }},
@else
            "Value": {{ $job->salary_low }},
@endif
            "unitText": "{{ $job->salary_type }}"
        }
    },
	"datePosted": "{{ $job->updated_at->format('Y-m-d') }}",
    "description": "<p>{!! nl2br(e($job->detail)) !!}</p>
    <p><strong>対象となる方</strong><br>
    {!! nl2br(e($job->qualification)) !!}</p>
    <p><strong>給与</strong><br>
    {{ $job->simple_salary }}<br>
    {!! nl2br(e($job->salary)) !!}</p>
    @if(!is_null($job->allowance))<p><strong>諸手当</strong><br>
    {!! nl2br(e($job->allowance)) !!}</p>
@endif
    <p><strong>勤務地</strong><br>
    {!! nl2br(e($job->place)) !!}</p>
    <p><strong>勤務時間</strong><br>
    {!! nl2br(e($job->time)) !!}</p>
    @if(!is_null($job->holiday))<p><strong>休日・休暇</strong><br>
    {!! nl2br(e($job->holiday)) !!}</p>
@endif
    @if(!is_null($job->bonus))<p><strong>昇給・賞与</strong><br>
    {!! nl2br(e($job->bonus)) !!}</p>
@endif
    @if(!is_null($job->benefit))<p><strong>待遇・福利厚生</strong><br>
    {!! nl2br(e($job->benefit)) !!}</p>@endif",
	"employmentType": ["{{ $job->job_status }}"],
	"hiringOrganization": {
        "@type": "Organization",
        "name": "{{ $user->company }}",
        "sameAs": "{{ $user->site_url }}"
    },
	"industry": "<?php 
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
                ?>",
	"jobLocation": {
		"@type": "Place",
        "address": {
            "@type": "PostalAddress",
            @if(!is_null($job->address))"streetAddress": "{{ $job->address }}",
@endif
            "addressLocality": "{{ $job->state }}",
            "addressRegion": "{{ $job->pref }}",
            "postalCode": "{{ $job->zip }}",
            "addressCountry": "JP"
        }
    },
	"title": "{{ $job->job_name }}",
	"workHours": "{!! nl2br(e($job->time)) !!}",
	"mainEntityOfPage": "@if($job->simple_form === 'simple')
{{ route('light.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}
@else
{{ route('entry.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}
@endif",
	"url": "{{ route('job.show', ['id' => $job->id, 'display_url' => $user->display_url]) }}"
}
</script>
@endif
</head>
<body>
@include('commons.navbar')

@yield('content')

@include('commons.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="{{ secure_asset('js/jquery.matchHeight.js') }}"></script>
@if(\Route::current() -> getName() == 'company.show' || \Route::current() -> getName() == 'job.show' || \Route::current() -> getName() == 'search.result' || \Route::current() -> getName() == 'entry.get')
{!! $user->retarge_tag !!}
@endif
@if(\Route::current() -> getName() == 'entry.post')
{!! $user->cv_tag !!}
@endif
</body>
</html>