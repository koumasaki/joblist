            <div class="job_flame">
                <div class="job_flame_header">
                    <p class="job_copy">ここに仕事の補足コピー</p>
                    <h3>{{ $job->job_name }} <span class="job_status"><?php 
                    switch($job->job_status) {
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
                    ?></span></h3>
                </div>
                <div class="job_flame_body">
                    <div class="row">
                        <div class="col-sm-8">
                            <p class="mb15"><?php 
                            if (mb_strlen($job->detail) < 25) {
                                $joboutline = $job->detail;
                                echo $joboutline;
                            } else {
                                $joboutline = mb_substr( $job->detail, 0, 25);
                                echo $joboutline. '...';
                            }
                             ?></p>
                            <table class="table-narrow">
                                <tbody>
                                    <tr>
                                        <th>給与</th>
                                        <td>給与が入ります</td>
                                    </tr>
                                    <tr>
                                        <th>勤務地</th>
                                        <td>給与が入ります</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <div class="job_img">
                                <div class="inner_img">
                                    <div class="img_f"><img src="{{ secure_asset('images/common/sample.jpg') }}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="job_flame_footer">
                    <div class="btn_detail"><a href="{{ route('job.show', ['id' => $job->id, 'display_url' => $user->display_url]) }}"><img src="{{ secure_asset('images/common/btn_detail.jpg') }}"></a></div>
                    <div class="btn_entry"><a href=""><img src="{{ secure_asset('images/common/btn_entry.jpg') }}"></a></div>
                    <div class="update">
                        <p class="fs12 mb0">情報更新日：2018年0月0日</p>
                    </div>
                </div>
            </div><!-- /job_flame -->