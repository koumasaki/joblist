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
        @if(!is_null($user->site_url))
        <div class="outer_navi">
            <div class="inner_navi">
                <ul class="f_navi">
                    <li><a href="{{ $user->site_url }}" target="_blank">コーポレートサイト</a></li>
                    @if(!is_null($user->privacy_url))
                    <li><a href="{{ $user->privacy_url }}" target="_blank">個人情報保護方針</a></li>
                    @endif
                </ul>
            </div>
        </div>
        @endif
        <div class="copyright">Copyright &copy {{ $user->copyright }} All Right Reserved.</div>
    </div>
</footer>