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
        <div class="col-xs-12">
            <div class="job_name">
                <h1>エントリーありがとうございました</h1>
            </div>
            <p class="mb30">この度は、{{ $user->company }}の求人募集にエントリーいただきありがとうございました。<br>
            エントリー内容が確認できましたら、担当者よりご連絡させていただきますので、しばらくお持ちください。</p>
            <p class="red fs13">※エントリ－内容は全て拝見させていただきますが、全てのエントリーに返信できない場合がありますのでご了承ください。<br>
            また、営業時間外のエントリーは、返信が遅れる場合もございますので、ご了承下さい。</p>
        </div>
    </div>
</div>
@endsection