        <div class="row mb10">
            {!! Form::open(['route' => ['entry_search.result'], 'method' => 'get']) !!}
            <div class="col-md-4 form_right">
                <div class="form-group">
                    {!! Form::text('name', old('name'), ['class'=>'form-control form-lg', 'placeholder'=>'氏名']) !!}
                </div>
            </div>
            <div class="col-md-2 form_right">
                <div class="form-group">
                    {!! Form::select('status', [
                        '' => '進捗状況',
                        '未対応' => '未対応',
                        '書類選考' => '書類選考',
                        '一次面接呼出' => '一次面接呼出',
                        '二次面接呼出' => '二次面接呼出',
                        '最終面接呼出' => '最終面接呼出',
                        '内定' => '内定', 
                        '不合格' => '不合格'
                    ], old('status'), ['class'=>'form-control form-lg']) !!}
                </div>
            </div>

            <div class="col-md-2">
                {!! Form::submit('検索', ['class'=>'btn btn-primary btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
