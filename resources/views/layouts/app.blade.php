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
            "minValue": 40.00,
            "maxValue": 50.00,
            "unitText": "HOUR"
        }
    },
	"datePosted": "2018-09-17",
    "description": "{!! nl2br(e($job->detail)) !!}",
	"employmentType": ["<?php 
                switch($job->job_status) {
                    case 'regular':
                        echo '正社員';
                        break;
                    case 'contractor':
                        echo '契約社員';
                        break;
                    case 'parttime':
                        echo 'パート';
                        break;
                    case 'arbite':
                        echo 'アルバイト';
                        break;
                    case 'temp':
                        echo '派遣社員';
                        break;
                    case 'commission':
                        echo '嘱託';
                        break;
                    case 'others':
                        echo 'その他';
                        break;
                }
                ?>"],
	"hiringOrganization": {
        "@type": "Organization",
        "name": "会社名",
        "sameAs": "http://www.magsruswheelcompany.com"
    },
	"industry": "飲食/フード",
	"jobLocation": {
		"@type": "Place",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "555 Clancy St",
            "addressLocality": "Detroit",
            "addressRegion": "MI",
            "postalCode": "48201",
            "addressCountry": "JP"
        }
    },
	"title": "職種名称",
	"workHours": "6:00?23:00",
	"mainEntityOfPage": "https://townwork.net/appInpt/?joid=K4621847",
	"url": "https://townwork.net/detail/clc_1918037003/joid_K4621847/"
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