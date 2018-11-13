<header class="main-header">
    <div class="logo">
        <span class="logo-mini"><b>F</b>J</span>
        <span class="logo-lg"><b>Feed</b>JobUser</span>
    </div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (Auth::check())
                <li>
                    <a href="/{{ Auth::user()->display_url }}/" target="_blank">
                    <span class="hidden-xs">{{ Auth::user()->company }}</span>
                    </a>
                </li>
                @endif
                <li><a href="{{ route('logout.get') }}"><i class="fa fa-fw fa-sign-out"></i> <span>ログアウト</span></a></li>
            </ul>
        </div>
    </nav>
</header>