@extends('layout')



<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MSM（仮）
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <main class="py-4">
        <form action="{{ url('/') }}" method="get">
            <div class="row justify-content-around">
                
                                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">検索フォーム</div>
                            <div class="card-body">
                                <div class="card-body">
                                    
                                    <!-- 検索フォーム -->
                                    <form action="" method="GET">
                                        <input type='date' class='form-control' name='date' id='date'value="{{ old('date') }}"/>
                                        <select name='map_id' class='form-control'>
                                            <option value="" hidden></option> 
                                                @foreach($maps as $map)
                                                    <option value="{{ $map['id']}}" selected>{{ $map['shopname'] }}</option>
                                                @endforeach  
                                            </select>
                                        <button type="submit">検索</button>
                                    </form>
                                    <!-- 検索フォーム -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>成績表示</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>日付</th>
                                            <th>1着</th>
                                            <th>2着</th>
                                            <th>3着</th>
                                            <th>平均着順</th>
                                            <th>お店</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grades as $grade)
                                        <tr>
                                            <th>{{ $grade['date'] }}</th>
                                            <th scope='col'>{{ $grade['top'] }}回</th>
                                            <th scope='col'>{{ $grade['second'] }}回</th>
                                            <th scope='col'>{{ $grade['third'] }}回</th>
                                            <th>{{ $avg }}</th>
                                            @foreach($maps as $map)
                                                @if($map['id'] == $grade['map_id'])
                                                    <th>{{ $map['shopname'] }}</th>
                                                @else
                                                    
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class='text-center'>総合収支</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>+</th>
                                        <th>－</th>
                                        <th>計</th>
                                        <th>お店</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($grades as $grade)
                                    <tr>
                                        <th scope='col'>{{ $grade['income'] }}</th>
                                        <th scope='col'>{{ $grade['spending'] }}</th>
                                        <th></th>
                                        @foreach($maps as $map)
                                                @if($map['id'] == $grade['map_id'])
                                                    <th>{{ $map['shopname'] }}</th>
                                                @else
                                                    
                                                @endif
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class='row justify-content-around mt-3'>
            <a href="{{ route('grades.index') }}">
                <button type='button' class='btn btn-primary'>今月の成績</button>
            </a>
            <a href="{{ route('culculate.index') }}">
                <button type='button' class='btn btn-secondary'>今月の収支</button>
            </a>
    </div>
    <div class='row justify-content-around mt-3'>
            <a href="{{ route('grades.create') }}">
                <button type='button' class='btn btn-primary'>成績作成</button>
            </a>
            <a href="{{ route('culculate.create') }}">
                <button type='button' class='btn btn-secondary'>支出作成</button>
            </a>
    </div>












</body>
</html>