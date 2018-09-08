<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/base.css') }}">
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