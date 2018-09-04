<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<source>
<publisher>SiteName</publisher>
<publisherurl>http://www.SiteName.com</publisherurl>
<?php $now = date("D, d M Y H:i:s T"); ?>
<lastBuildDate><?php echo $now; ?></lastBuildDate>
@foreach($jobs as $job)
<job>
<title><![CDATA[{{ $job->job_name }}]]></title>
<date><![CDATA[{{ $job->updated_at->format('D, d M Y H:i:s T') }}]]></date>
<referencenumber><![CDATA[ ]]></referencenumber>
<url><![CDATA[]]></url>
<company><![CDATA[{{ $job->$user->company }}]]></company>
<city><![CDATA[Phoenix]]></city>
<state><![CDATA[AZ]]></state>
<country><![CDATA[日本]]></country>
<postalcode><![CDATA[85003]]></postalcode>
<description><![CDATA[Do you have 5-7 years of sales experience? Are you
relentless at closing the deal? Are you ready for an exciting and
high-speed career in sales? If so, we want to hear from you!

We provide competitive compensation, including stock options and a full
benefit plan. As a fast-growing business, we offer excellent
opportunities for exciting and challenging work. As our company
continues to grow, you can expect unlimited career advancement!
]]></description>
<salary><![CDATA[$70K per year]]></salary>
<education><![CDATA[Bachelors]]></education>
<jobtype><![CDATA[fulltime]]></jobtype>
<category><![CDATA[Sales Management, Executive]]></category>
<experience><![CDATA[5+ years]]></experience>
</job>
@endforeach
</source>