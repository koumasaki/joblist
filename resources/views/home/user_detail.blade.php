@extends('layouts.app')

@section('title', $user->company )

@section('content')
<div id="main_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
        <h2 id="copy">キャッチコピーが入ります（20文字まで）</h2>
    </div>
</div>
<div class="container">
    <!-- logo -->
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 text-center logo"><img src="{{ asset('images/logo/'. $user->logo_image) }}"></div>
    </div>
    <!-- service_body -->
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <h3 class="catch_copy mb15">ここにサービス関連のキャッチコピーが入ります。</h3>
            <p class="mb50">ここに説明文章が入りますここに説明文章が入りますここに説明文章が入りますここに説明文章が入りますここに説明文章が入りますここに説明文章が入ります</p>
        </div>
    </div>
</div>

<div class="gray_flame mb50">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="catch_copy mb30">{{ $user->company_copy }}</h3>
            </div>
            <div class="col-md-6 mb40">
                <div class="mb0">
                {{ $user->company_summary }}
                </div>
            </div>
            <div class="col-md-6 mb40">
                <table class="table-narrow">
                    <tbody>
                        <tr>
                            <th>設立</th>
                            <td>{{ $user->establishment }}</td>
                        </tr>
                        <tr>
                            <th>資本金</th>
                            <td>{{ $user->capitalstock }}</td>
                        </tr>
                        <tr>
                            <th>従業員数</th>
                            <td>{{ $user->number }}</td>
                        </tr>
                        <tr>
                            <th>代表者名</th>
                            <td>{{ $user->president }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mb30">
    <div class="row">
        <div class="col-md-8">
            @if($count_jobs > 0)
            @foreach ($jobs as $job)
            <?php $user = $job->user; ?>
@include('commons.job_flame')
            @endforeach
            @else
            <p class="mb40">現在、募集要項は公開しておりません。<br>採用活動を再開した際には、こちらのページで募集要項をご案内いたします。</p>
            @endif
        </div>
        <div class="col-md-4">
@include('commons.search_form')

        </div>
    </div>
</div>
@endsection