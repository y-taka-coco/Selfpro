収支一覧
<div class="row justify-content-around" hidden>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>今月の成績表示</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>日付(クリックで編集)</th>
                                    <th>勝ち額</th>
                                    <th>負け額</th>
                                    <th>お店</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($culculates as $culculate)
                                <tr>
                                    <th>
                                        <a href="{{ route('culculate.edit',$culculate['id']) }}">{{ $culculate['date'] }}</a>
                                    </th>
                                    <th>{{ $culculate['income'] }}</th>
                                    <th>{{ $culculate['spending'] }}</th>
                                    @foreach($maps as $map)
                                                @if($map['id'] == $culculate['map_id'])
                                                    <th>{{ $map['shopname'] }}</th>
                                                @else
                                                    
                                                @endif
                                        @endforeach
                                    <th>
                                        <form action="{{ route('culculate.delete',$culculate['id']) }}" method="POST">
                                            @csrf
                                            <input type="submit" class="btn btn-danger mt-3" value="削除"/>
                                        </form>
                                    </th>
                                </tr>
                                @endforeach
                                <a href="{{ url('/')}}">トップに戻る<br></a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
成績一覧
        <div class="col-md-4" hidden>
            
                <div class="card-header bg-light">
                    <div class='text-center'>今月の成績表示</div>
                </div>
                <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>日付(クリックで編集)</th>
                                    <th>1着</th>
                                    <th>2着</th>
                                    <th>3着</th>
                                    <th>平均着順</th>
                                    <th>打った場所</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grades as $grade)
                                <tr>
                                    <th>
                                        <a href="{{ route('grades.edit',$grade['id']) }}">{{ $grade['date'] }}</a>
                                    </th>
                                    <th>{{ $grade['top'] }}回</th>
                                    <th>{{ $grade['second'] }}回</th>
                                    <th>{{ $grade['third'] }}回</th>
                                    <th></th>
                                    @foreach($maps as $map)
                                                @if($map['id'] == $grade['map_id'])
                                                    <th>{{ $map['shopname'] }}</th>
                                                @else
                                                    
                                                @endif
                                    @endforeach
                                    <th>
                                        <form action="{{ route('grades.destroy',$grade['id']) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger mt-3" value="削除"/>
                                        </form>
                                    </th>
                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




                                