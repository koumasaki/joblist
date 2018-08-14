<header class="mb50">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::check())
                <a class="navbar-brand" href="/user">{{ Auth::user()->company }} 管理画面</a>
                @else
                <a class="navbar-brand" href="/user">ユーザー管理画面</a>
                @endif
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">求人案件管理 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('job.index', '求人案件一覧') !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('job.create', '求人案件新規作成') !!}</li>
                            </ul>
                        </li>
                        <li><a href="#">エントリー管理</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">会社情報、他 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php $user = Auth::user(); ?>
                                <li>{!! link_to_route('user.show', '会社登録情報', ['id' => $user->id]) !!}</li>
                                <li role="separator" class="divider"></li>
                                <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                        </li>
                    @else
                        <li>{!! link_to_route('login', 'Login') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>