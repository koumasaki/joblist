@extends('layouts.app')

@section('title', $user->company )

@section('content')
<div id="main_img_flame">
    <div id="inner_img">
        <div id="cover"></div>
        <div class="img_f"><img src="{{ asset('images/main_image/'. $user->main_image) }}"></div>
        <h2 id="copy">{{ $user->catch_copy }}</h2>
    </div>
</div>

<div class="container mb30">
    <div class="row">
        <div class="col-md-12 mb20">
            <p>検索条件</p>
            <dl>
                <dt>職種カテゴリー</dt>
                <dd><?php 
                    switch($job_category) {
                        case 'sales':
                            echo '営業';
                            break;
                        case 'manage':
                            echo '企画・経営';
                            break;
                        case 'office':
                            echo '事務・管理';
                            break;
                        case 'service':
                            echo '販売';
                            break;
                        case 'others':
                            echo 'その他サービス系';
                            break;
                        case 'medical':
                            echo '医療・福祉';
                            break;
                        case 'education':
                            echo '教育・保育・通訳';
                            break;
                        case 'consul':
                            echo 'コンサルタント・金融・不動産専門職';
                            break;
                        case 'creative':
                            echo 'クリエイティブ';
                            break;
                        case 'web':
                            echo 'WEB・インターネット・ゲーム';
                            break;
                        case 'it':
                            echo 'ITエンジニア';
                            break;
                        case 'electric':
                            echo '電気・電子・機械・半導体';
                            break;
                        case 'industory':
                            echo '建築・土木';
                            break;
                        case 'chemical':
                            echo '化学・食品・医薬';
                            break;
                        case 'skill':
                            echo '設備・技能・配送';
                            break;
                        case 'official':
                            echo '公共サービス';
                            break;
                    }
                ?></dd>
                <dt>雇用形態</dt>
                <dd><?php 
                    switch($job_status) {
                        case 'regular':
                            echo '正社員';
                            break;
                        case 'contractor':
                            echo '契約社員';
                            break;
                        case 'parttime':
                            echo 'パート';
                            break;
                        case 'arbite':
                            echo 'アルバイト';
                            break;
                        case 'temp':
                            echo '派遣社員';
                            break;
                        case 'commission':
                            echo '嘱託';
                            break;
                        case 'others':
                            echo 'その他';
                            break;
                    }
                ?></dd>
            </dl>
        </div>
        <div class="col-md-8">
            @if( count($jobs) > 0 )
            {{-- count($jobs) を使うと便利 --}}
                @foreach ($jobs as $job)
                <?php $user = $job->user; ?>
                @include('jobs.job_all')
                @endforeach
            @else
                <p class="mb40">検索条件に合う募集要項は見つかりませんでした。<br>検索条件を変えて再度、検索していただくか、<a href="{{ route('company.show', ['id' => $user->display_url]) }}">TOPページ</a>にお戻りください。</p>
            @endif
        </div>
        <div class="col-md-4">
@include('commons.search_form')

        </div>
    </div>
</div>
@endsection