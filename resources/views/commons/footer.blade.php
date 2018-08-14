<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="mb20"><img src="{{ asset('images/logo/'. $user->logo_image) }}"></div>
                <p class="fs13 mb30"><strong>{{ $user->address }}</strong></p>
            </div>
        </div>
    </div>
    <div class="f_navi_flame">
        <div class="outer_navi">
            <div class="inner_navi">
                <ul class="f_navi">
                    <li><a href="{{ $user->site_url }}" target="_blank">コーポレートサイト</a></li>
                    <li><a href="{{ $user->privacy_url }}" target="_blank">個人情報保護方針</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">Copyright &copy 0000 All Right Reserved.</div>
    </div>
</footer>