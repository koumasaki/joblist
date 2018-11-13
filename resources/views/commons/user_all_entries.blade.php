                        <table class="table mb50 table-view">
                            <thead>
                                <tr>
                                    <th>氏名</th>
                                    <th>応募日</th>
                                    <th>性別</th>
                                    <th>生年月日</th>
                                    <th>メールアドレス</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entries as $entry)
                                <tr class="gray">
                                    <td class="table-name"><a href="{{ route('entry.show', ['id' => $entry->id]) }}"><strong>{{ $entry->name }}</strong></a></td>
                                    <td>{{ $entry->created_at->format('Y年m月d日') }}</td>
                                    <td>{{ $entry->gender }}</td>
                                    <td>{{ $entry->birthday }}</td>
                                    <td><a href="mailto:{{ $entry->mail }}">{{ $entry->mail }}</a></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        {!! Form::model($entry, ['route' => ['entry.update', $entry->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
                                            <div class="form-inline">進捗更新：<span class="red">{{ $entry->status }}　</span>
                                            {!! Form::select('status', ['' => '-選択-', '未対応' => '未対応', '書類選考' => '書類選考', '一次面接呼出' => '一次面接呼出', '二次面接呼出' => '二次面接呼出', '最終面接呼出' => '最終面接呼出', '内定' => '内定', '不合格' => '不合格'], old('status'), ['class'=>'form-control']) !!}
                                            {!! Form::submit('更新', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                    </td>
                                    <td colspan="2" class="fs13">
                                        <strong class="red">応募職種：</strong>{{ $entry->job_name }}<br>
                                        <strong class="red">勤務地：</strong><?php 
                                            if (mb_strlen($entry->job_place) < 20) {
                                                $place = $entry->job_place;
                                                echo $entry->job_place;
                                            } else {
                                                $place = mb_substr( $entry->job_place, 0, 20);
                                                echo $place. '...';
                                            }
                                             ?>
                                    </td>
                                    <td class="text-center"><a href="{{ route('mail.create', ['id' => $entry->id]) }}" class="btn btn-success">新規メール作成</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>