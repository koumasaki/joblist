<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($users as $user)
    <url>
        <loc>{{ url('/'. $user->display_url. '/') }}</loc>
        <lastmod>{{ $user->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>weekly</changefreq>
    </url>
@endforeach
@foreach($jobs as $job)
    <url>
        <loc>{{ url('/'. $job->user->display_url. '/job_'. $job->id) }}</loc>
        <lastmod>{{ $job->updated_at->format('Y-m-d') }}</lastmod>
        <changefreq>daily</changefreq>
    </url>
@endforeach
</urlset>
