<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>管理者用管理画面@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ secure_asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/base.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ secure_asset('css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css/skin-blue.min.css') }}">
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">
@include('commons.admin_header')

@include('commons.admin_sidebar')

<div class="content-wrapper">
@if (session('message'))
    <div class="row">
        <div class="col-md-8 col-md-offset-2 pt20">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="閉じる"><span aria-hidden="true">×</span></button>
                <i class="icon fa fa-check"></i> {{ session('message') }}
            </div>
        </div>
    </div>
@endif

@yield('content')

</div><!-- /.content-wrapper -->

@include('commons.admin_footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="{{ secure_asset('js/adminlte.min.js') }}"></script>
<script src="{{ secure_asset('js/jquery.matchHeight.js') }}"></script>
</body>
</html>