<header class="mb50">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            @if(\Route::current() -> getName() == 'company.show')
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/{{ $user->display_url }}">{{ $user->company }}<span class="main_title">採用情報サイト</span></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#service">サービス</a></li>
                    <li><a href="#corporation">会社情報</a></li>
                    <li><a href="#recruit">募集要項</a></li>
                </ul>
            </div>
            @else
            <div class="navbar-header">
                <a class="navbar-brand" href="/{{ $user->display_url }}">{{ $user->company }}<span class="main_title">採用情報サイト</span></a>
            </div>
            @endif
        </div>
    </nav>
</header>