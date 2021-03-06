            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="gray_flame">
                        {!! Form::open(['route' => ['search.result', $user->display_url], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                        <div class="hid search_flame">
                            <div class="full">
                                <div class="col-sm-2 search_title">希望職種</div>
                                <div class="col-sm-10">
                                    <div class="form-group form_home">
                                        {!! Form::select('job_category', [
                            		        '' => '--選択--',
                            		        'sales' => '営業',
                            		        'manage' => '企画・経営',
                            		        'office' => '事務・管理',
                            		        'service' => '販売',
                            		        'others' => 'その他サービス系',
                            		        'medical' => '医療・福祉',
                            		        'education' => '教育・保育・通訳',
                            		        'consul' => 'コンサルタント・金融・不動産専門職',
                            		        'creative' => 'クリエイティブ',
                            		        'web' => 'WEB・インターネット・ゲーム',
                            		        'it' => 'ITエンジニア',
                            		        'electric' => '電気・電子・機械・半導体',
                            		        'industory' => '建築・土木',
                            		        'chemical' => '化学・食品・医薬',
                            		        'skill' => '設備・技能・配送',
                            		        'official' => '公共サービス'
                            		    ], old('job_category'), ['class'=>'form-control form-lg']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hid search_flame_last">
                            <div class="half">
                                <div class="col-sm-4 search_title">勤務地</div>
                                <div class="col-sm-8">
                                    <div class="form-group form_home">
                                        {!! Form::select('pref', [
                            		        '' => '--選択--',
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
                            </div>
                            <div class="half">
                                <div class="col-sm-4 search_title">雇用形態</div>
                                <div class="col-sm-8">
                                    <div class="form-group form_home">
                		                {!! Form::select('job_status', [
                            		        '' => '--選択--',
                            		        'FULL_TIME' => '正社員',
                            		        'CONTRACTOR' => '契約社員',
                            		        'PART_TIME' => 'パート・アルバイト',
                            		        'TEMPORARY' => '派遣社員',
                            		        'COMMISSION' => '嘱託',
                            		        'OTHER' => 'その他'
                            		    ], old('job_status'), ['class'=>'form-control form-lg']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt15 mb20">
                            <div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">{!! Form::submit('検索する', ['class'=>'btn btn-primary btn-block']) !!}</div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
