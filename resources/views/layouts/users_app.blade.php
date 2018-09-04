<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー管理画面@yield('title')</title>
    <link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/base.css') }}">
</head>
<body>
    @include('commons.users_navbar')

    <div class="container mb60">
    @if (session('message'))
        <div class="row mb20">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif

    @yield('content')
    </div>

@include('commons.user_footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="{{ secure_asset('js/jquery.matchHeight.js') }}"></script>
</body>
</html>