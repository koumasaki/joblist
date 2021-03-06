            <div class="job_flame">
                <div class="job_flame_header">
                    <p class="job_copy">{{ $job->job_copy }}</p>
                    <h3>{{ $job->job_name }} <span class="job_status"><?php 
                    switch($job->job_status) {
                        case 'FULL_TIME':
                            echo '正社員';
                            break;
                        case 'CONTRACTOR':
                            echo '契約社員';
                            break;
                        case 'PART_TIME':
                            echo 'パート・アルバイト';
                            break;
                        case 'TEMPORARY':
                            echo '派遣社員';
                            break;
                        case 'COMMISSION':
                            echo '嘱託';
                            break;
                        case 'OTHER':
                            echo 'その他';
                            break;
                    }
                    ?></span></h3>
                </div>
                <div class="job_flame_body">
                    <div class="row">
                        @if(!is_null($job->job_image))
                        <div class="col-sm-8">
                            <p class="mb15"><?php 
                            if (mb_strlen($job->detail) < 35) {
                                $joboutline = $job->detail;
                                echo $joboutline;
                            } else {
                                $joboutline = mb_substr( $job->detail, 0, 35);
                                echo $joboutline. '...';
                            }
                             ?></p>
                            <table class="table-narrow">
                                <tbody>
                                    <tr>
                                        <th>給与</th>
                                        <td>{{ $job->simple_salary }}</td>
                                    </tr>
                                    <tr>
                                        <th>勤務地</th>
                                        <td><?php 
                            if (mb_strlen($job->place) < 25) {
                                $jobplace = $job->place;
                                echo $jobplace;
                            } else {
                                $jobplace = mb_substr( $job->place, 0, 25);
                                echo $jobplace. '...';
                            }
                             ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-4">
                            <div class="job_img">
                                <div class="inner_img">
                                    <div class="img_f"><img src="{{ asset('images/job_image/'. $job->job_image) }}" alt=""></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-sm-12">
                            <p class="mb15"><?php 
                            if (mb_strlen($job->detail) < 40) {
                                $joboutline = $job->detail;
                                echo $joboutline;
                            } else {
                                $joboutline = mb_substr( $job->detail, 0, 40);
                                echo $joboutline. '...';
                            }
                             ?></p>
                            <table class="table-narrow">
                                <tbody>
                                    <tr>
                                        <th>給与</th>
                                        <td>{{ $job->simple_salary }}</td>
                                    </tr>
                                    <tr>
                                        <th>勤務地</th>
                                        <td><?php 
                            if (mb_strlen($job->place) < 30) {
                                $jobplace = $job->place;
                                echo $jobplace;
                            } else {
                                $jobplace = mb_substr( $job->place, 0, 30);
                                echo $jobplace. '...';
                            }
                             ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="job_flame_footer">
                    <div class="btn_detail"><a href="{{ route('job.show', ['id' => $job->id, 'display_url' => $user->display_url]) }}"><img src="{{ secure_asset('images/common/btn_detail.jpg') }}"></a></div>
                    <div class="btn_entry">
                        @if($job->simple_form === 'simple')
                        <a href="{{ route('light.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}"><img src="{{ secure_asset('images/common/btn_entry.jpg') }}" alt="応募する"></a>
                        @else
                        <a href="{{ route('entry.get', ['display_url' => $user->display_url, 'id' => $job->id]) }}"><img src="{{ secure_asset('images/common/btn_entry.jpg') }}" alt="応募する"></a>
                        @endif
                    </div>
                    <div class="update">
                        <p class="fs12 mb0">情報更新日：{{ $job->updated_at->format('Y年m月d日') }}</p>
                    </div>
                </div>
            </div><!-- /job_flame -->