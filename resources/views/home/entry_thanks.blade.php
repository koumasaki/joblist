@extends('layouts.app')

@section('title',  'エントリーありがとうございました | '. $user->company )

@section('content')
<div id="cate_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
    </div>
</div>

<div class="container mb50">
    <div class="row">
        <div class="col-md-12">
            <h1>エントリーありがとうございました</h1>
            <hr>
            <p class="mb30">エントリーありがとうございました。</p>
        </div>
    </div>
</div>
@endsection