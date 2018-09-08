<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<source>
<publisher>SiteName</publisher>
<publisherurl>{{ url('/') }}</publisherurl>
<?php $now = date("D, d M Y H:i:s T"); ?>
<lastBuildDate><?php echo $now; ?></lastBuildDate>
@foreach($jobs as $job)
<job>
<title><![CDATA[{{ $job->job_name }}]]></title>
<date><![CDATA[{{ $job->updated_at->format('D, d M Y H:i:s T') }}]]></date>
<referencenumber><![CDATA[{{ 'job_'.$job->id }}]]></referencenumber>
<url><![CDATA[{{ url('/'. $job->user->display_url. '/job_'. $job->id) }}]]></url>
<company><![CDATA[{{ $job->user->company }}]]></company>
<city><![CDATA[{{ $job->state }}]]></city>
<state><![CDATA[{{ $job->pref }}]]></state>
<country><![CDATA[日本]]></country>
<postalcode><![CDATA[{{ $job->zip }}]]></postalcode>
<description><![CDATA[{{ $job->detail }}]]></description>
<salary><![CDATA[{{ $job->salary }}]]></salary>
<education><![CDATA[Bachelors]]></education>
<jobtype><![CDATA[<?php 
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
    ?>]]></jobtype>
<category><![CDATA[{{ $job->category }}]]></category>
<experience><![CDATA[{{ $job->qualification }}]]></experience>
</job>
@endforeach
</source>