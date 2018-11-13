<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="padding-top:10px;">
    <!-- Sidebar user panel -->
        <div class="user-panel" >
            <div class="pull-left image"><img src="{{ secure_asset('images/common/naito_logo.png') }}" alt="NaitoAdmin" style="background-color: #fff;"></div>
            <div class="pull-left info"><p>NaitoAdmin</p></div>
        </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li><a href="{{ route('signup.get') }}"><i class="fa fa-fw fa-building"></i> <span>新規ユーザー登録</span></a></li>
            <li><a href="{{ route('mailorigin.index') }}"><i class="fa fa-envelope"></i> <span>メールテンプレート</span></a></li>
            <li><a href="{{ route('admin_logout.get') }}"><i class="fa fa-fw fa-sign-out"></i> <span>ログアウト</span></a></li>
        </ul>
    </section>
</aside>