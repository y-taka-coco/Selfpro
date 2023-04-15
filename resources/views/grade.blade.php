@extends('layout')

<main class="py-4">
    <div class="row justify-content-around">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class='text-center'>今月の成績表示</div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class='table'>
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
                                <a href="{{ url('/')}}">トップに戻る<br></a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>