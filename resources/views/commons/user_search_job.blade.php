        <div class="row mb10">
            {!! Form::open(['route' => ['job_search.result'], 'method' => 'get']) !!}
            <div class="col-md-4 form_right">
                <div class="form-group">
                    {!! Form::text('job_name', old('job_name'), ['class'=>'form-control form-lg', 'placeholder'=>'募集職種']) !!}
                </div>
            </div>
            <div class="col-md-2 form_right">
                <div class="form-group">
                    {!! Form::select('pref', [
        		        '' => '勤務先府県',
        		        '北海道' => '北海道',
        		        '青森県' => '青森県',
        		        '秋田県' => '秋田県',
        		        '岩手県' => '岩手県',
        		        '宮城県' => '宮城県',
        		        '山形県' => '山形県',
        		        '福島県' => '福島県',
        		        '茨城県' => '茨城県',
        		        '栃木県' => '栃木県',
        		        '群馬県' => '群馬県',
        		        '埼玉県' => '埼玉県',
        		        '千葉県' => '千葉県',
        		        '東京都' => '東京都',
        		        '神奈川県' => '神奈川県',
        		        '新潟県' => '新潟県',
        		        '富山県' => '富山県',
        		        '石川県' => '石川県',
        		        '福井県' => '福井県',
        		        '山梨県' => '山梨県',
        		        '長野県' => '長野県',
        		        '岐阜県' => '岐阜県',
        		        '静岡県' => '静岡県',
        		        '愛知県' => '愛知県',
        		        '三重県' => '三重県',
        		        '滋賀県' => '滋賀県',
        		        '京都府' => '京都府',
        		        '大阪府' => '大阪府',
        		        '兵庫県' => '兵庫県',
        		        '奈良県' => '奈良県',
        		        '和歌山県' => '和歌山県',
        		        '岡山県' => '岡山県',
        		        '広島県' => '広島県',
        		        '山口県' => '山口県',
        		        '鳥取県' => '鳥取県',
        		        '島根県' => '島根県',
        		        '徳島県' => '徳島県',
        		        '香川県' => '香川県',
        		        '愛媛県' => '愛媛県',
        		        '高知県' => '高知県',
        		        '福岡圏' => '福岡県',
        		        '佐賀県' => '佐賀県',
        		        '長崎県' => '長崎県',
        		        '大分県' => '大分県',
        		        '熊本県' => '熊本県',
        		        '宮崎県' => '宮崎県',
        		        '鹿児島県' => '鹿児島県',
        		        '沖縄県' => '沖縄県'
        		    ], old('pref'), ['class'=>'form-control form-lg']) !!}
                </div>
            </div>
            <div class="col-md-2 form_right">
                <div class="form-group">
                    {!! Form::select('status', [
        		        '' => '雇用形態',
        		        'FULL_TIME' => '正社員',
        		        'CONTRACTOR' => '契約社員',
        		        'PART_TIME' => 'パート・アルバイト',
        		        'TEMPORARY' => '派遣社員',
        		        'COMMISSION' => '嘱託',
        		        'OTHER' => 'その他'
        		    ], old('status'), ['class'=>'form-control form-lg']) !!}
                </div>
            </div>

            <div class="col-md-2 form_right">
                <div class="form-group">
                    {!! Form::select('release', [
                        '' => '公開設定',
                        'release' => '公開',
                        'unrelease' => '未公開'
                    ], old('release'), ['class'=>'form-control form-lg']) !!}
                </div>
            </div>
            <div class="col-md-2">
                {!! Form::submit('検索', ['class'=>'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
