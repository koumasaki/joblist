<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="padding-top:10px;">
    <!-- Sidebar user panel -->
        @if (Auth::check())
        <div class="user-panel" >
            <div class="pull-left image"><img src="{{ asset('images/logo/'. Auth::user()->logo_image) }}" alt="{{ Auth::user()->display_url }}" style="background-color: #fff;"></div>
            <div class="pull-left info"><p>{{ Auth::user()->display_url }}</p></div>
        </div>
        @endif

    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="/user"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-list-ul"></i> <span>求人案件管理</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('job.index') }}"><i class="fa fa-angle-double-right"></i>求人案件一覧</a></li>
                    <li><a href="{{ route('job.create') }}"><i class="fa fa-angle-double-right"></i>求人案件新規作成</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-users"></i> <span>エントリー管理</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('entry.index') }}"><i class="fa fa-angle-double-right"></i>エントリー一覧</a></li>
                    <li><a href="{{ route('mail.index') }}"><i class="fa fa-angle-double-right"></i>メール送信履歴</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-building"></i> <span>ユーザー登録管理</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if (Auth::check())
                    <?php $user = Auth::user(); ?>
                    <li><a href="{{ route('user.show', ['id' => $user->id]) }}"><i class="fa fa-angle-double-right"></i>ユーザー登録情報</a></li>
                    @endif
                    <li><a href="{{ route('mailtemplate.index') }}"><i class="fa fa-angle-double-right"></i>送信用メールテンプレート</a></li>
                    <li><a href="{{ route('recruiter.index') }}"><i class="fa fa-angle-double-right"></i>担当者名情報</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('logout.get') }}"><i class="fa fa-fw fa-sign-out"></i> <span>ログアウト</span></a>
            </li>
        </ul>
    </section>
</aside>