            {!! Form::open(['route' => ['search.result', $user->display_url], 'method' => 'get', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
        		    {!! Form::select('job_status', [
        		        '' => '--選択--',
        		        'regular' => '正社員',
        		        'contractor' => '契約社員',
        		        'parttime' => 'パート',
        		        'arbite' => 'アルバイト',
        		        'temp' => '派遣社員',
        		        'commission' => '嘱託',
        		        'others' => 'その他'
        		    ], old('job_status'), ['class'=>'form-control form-lg']) !!}
                </div>
                <div class="form-group">
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
                <div class="form-group">
        		    {!! Form::select('pref', [
        		        '' => '--選択--',
        		        'hokkaido' => '北海道',
        		        'aomori' => '青森',
        		        'akita' => '秋田',
        		        'iwate' => '岩手',
        		        'miyagi' => '宮城',
        		        'yamagata' => '山形',
        		        'fukushima' => '福島',
        		        'ibaragi' => '茨城',
        		        'tochigi' => '栃木',
        		        'gunma' => '群馬',
        		        'saitama' => '埼玉',
        		        'chiba' => '千葉',
        		        'tokyo' => '東京',
        		        'kanagawa' => '神奈川',
        		        'niigata' => '新潟',
        		        'toyama' => '富山',
        		        'ishikawa' => '石川',
        		        'fukui' => '福井',
        		        'yamanashi' => '山梨',
        		        'nagano' => '長野',
        		        'gifu' => '岐阜',
        		        'sizuoka' => '静岡',
        		        'aichi' => '愛知',
        		        'mie' => '三重',
        		        'shiga' => '滋賀',
        		        'kyoto' => '京都',
        		        'osaka' => '大阪',
        		        'hyogo' => '兵庫',
        		        'nara' => '奈良',
        		        'wakayama' => '和歌山',
        		        'okayama' => '岡山',
        		        'hiroshima' => '広島',
        		        'yamaguchi' => '山口',
        		        'tottori' => '鳥取',
        		        'shimane' => '島根',
        		        'tokushima' => '徳島',
        		        'kagawa' => '香川',
        		        'ehime' => '愛媛',
        		        'kouchi' => '高知',
        		        'fukuoka' => '福岡',
        		        'saga' => '佐賀',
        		        'nagasaki' => '長崎',
        		        'oita' => '大分',
        		        'kumamoto' => '熊本',
        		        'miyazaki' => '宮崎',
        		        'kagoshima' => '鹿児島',
        		        'okinawa' => '沖縄'
        		    ], old('pref'), ['class'=>'form-control form-lg']) !!}
                </div>
                {!! Form::submit('検索する', ['class'=>'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}