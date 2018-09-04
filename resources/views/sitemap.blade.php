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
</job>
@endforeach
</source>