                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>募集職種</th>
                                    <th>公開設定</th>
                                    <th>勤務地</th>
                                    <th>雇用形態</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->job_name }}</td>
                                    <td>@if($job->release === 'release')<?php echo '公開'; ?>@else<?php echo '未公開'; ?>@endif</td>
                                    <td><?php 
                                            if (mb_strlen($job->place) < 20) {
                                                $jobplace = $job->place;
                                                echo $job->place;
                                            } else {
                                                $jobplace = mb_substr( $job->place, 0, 20);
                                                echo $jobplace. '...';
                                            }
                                    ?></td>
                                    <td><?php 
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
                                    ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="hid pb20">
                                            <div class="pull-left mr5">
                                                {!! link_to_route('job.edit', '編集', ['id' => $job->id], ['class'=>'btn btn-primary btn-xs']) !!}
                                            </div>
                                            <div class="pull-left mr5">
                                                {!! Form::open(['route' => ['job.getCopy', $job->id], 'method' => 'post']) !!}
                                                    {!! Form::submit('複製', ['class' => 'btn btn-success btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="pull-left">
                                                {!! Form::open(['route' => ['job.delete', $job->id], 'method' => 'delete', 'onsubmit' => 'return deleteChk()']) !!}
                                                    {!! Form::submit('削除', ['class' => 'btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="4" class="fs13">
                                        <p>備考：{{ $job->memo }}</p>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>