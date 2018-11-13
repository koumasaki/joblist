<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>TOPページ</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/base.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ secure_asset('css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/skin-blue.min.css') }}">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>TOPページ</h1>
            <hr>
            <p>便宜的にTOPページを表示。本当は必要ない。</p>
            <ul>
                @foreach($jobs as $job)
                <li><a href="{{ $job->user->display_url }}/job_{{ $job->id }}">{{ $job->job_name }}</a>（<a href="{{ $job->user->display_url }}/">{{ $job->user->company }}</a>）</li>
                @endforeach
            </ul>
            <hr>
            <a href="/login">ユーザーログイン</a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="{{ secure_asset('js/adminlte.min.js') }}"></script>
<script src="{{ secure_asset('js/jquery.matchHeight.js') }}"></script>
</body>
</html>