<header class="mb55">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
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
                    <li><a href="/{{ $user->display_url }}#service"><i class="fa fa-fw fa-th-large"></i> サービス</a></li>
                    <li><a href="/{{ $user->display_url }}#corporation"><i class="fa fa-fw fa-building"></i> 会社情報</a></li>
                    <li><a href="/{{ $user->display_url }}#recruit"><i class="fa fa-fw fa-list-ul"></i> 募集要項</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>