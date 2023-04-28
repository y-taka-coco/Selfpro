@extends('layout')



<body class="bg-dark">
    <div id="app">
        <!-- ヘッダー -->
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        @if(Auth::check())
            @if(Auth::user()->role==0)
            <a href="{{ url('admin_top') }}" >管理者TOPページ</a>
            @endif
            <a href="{{ url('/')}}"><span class="navbar-item">TOPページに戻る</span></a>
            
            <a href="#" id="logout" class="navbar-item">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style=": none;">
                @csrf
            </form>
            <script>
                document.getElementById('logout').addEventListener('click',function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
                });
            </script>
        @else
            <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
            
            <a class="may-navbar-item" href="{{ route('register') }}">会員登録</a>
        @endif
        
                
                <a href="{{ route('users.useredit',Auth::user()->id) }}">ユーザー情報変更
                @if(file_exists(public_path().'/storage/post_img/'. $img .'.jpg'))
                    <img src="/storage/post_img/{{ $img }}.jpg" style="height:100px;width:100px;border-radius:50%;">
                @elseif(file_exists(public_path().'/storage/post_img/'. $img .'.jpeg'))
                    <img src="/storage/post_img/{{ $img }}.jpeg" style="height:100px;width:100px;border-radius:50%;">
                @elseif(file_exists(public_path().'/storage/post_img/'. $img .'.png'))
                    <img src="/storage/post_img/{{ $img }}.png" style="height:100px;width:100px;border-radius:50%;">
                @elseif(file_exists(public_path().'/storage/post_img/'. $img .'.gif'))
                    <img src="/storage/post_img/{{ $img }}.gif" style="height:100px;width:100px;border-radius:50%;">
                @endif
                </a>
           
        </nav>
        <!-- ヘッダーここまで -->

        <main class="py-4">
        
            <div class="row justify-content-around">
                <div class="col-md-6">
                    <div class="card border-secondary">
                        
                        <div class="text-secondary">
                            <div class="card border-secondary">
                                <table class='table table-hover'>
                                    <thead class="thead-light text-center">
                                        <tr>
                                            <th></th>
                                            <th>総合成績</th>
                                            <th></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class='text-center'>
                                        <tr>
                                            <th scope='col'>1着</th>
                                            <td>{{$top}}%</td>
                                            <td>{{$ityaku}}/{{$sokai}}回</td>
                                        </tr>
                                        <tr>
                                            <th scope='col'>2着</th>
                                            <td>{{$sec}}%</td>
                                            <td>{{$nityaku}}/{{$sokai}}回</td>
                                        </tr>
                                        <tr>
                                            <th scope='col'>3着</th>
                                            <td>{{$thi}}%</td>
                                            <td>{{$santyaku}}/{{$sokai}}回</td>
                                        </tr>
                                        <tr>
                                            <th scope='col'>平均着順</th>
                                            <td>{{$avg}}</td>
                                            <td></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                            <table class='table table-hover'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th class='text-center'>総合収支</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class='text-center text-primary'>+{{$katisum}}</th>
                                    </tr>
                                    <tr>
                                        <th class='text-center text-danger'>-{{$makesum}}</th>
                                    </tr>
                                    <tr>
                                        @if($katisum > $makesum)
                                            <th class='text-center'>+{{$keka}}</th>
                                        @elseif($katisum < $makesum)
                                            <th class='text-center'>-{{$keka}}</th>
                                        @elseif($katisum == $makesum)
                                            <th class='text-center'>±0</th>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        
                   
                </div>
            </div>
        </main>
    </div>
    <div class='row justify-content-around mt-3'>
            <a href="{{ route('grades.index') }}" class="badge badge-pill badge-success" style="vertical-align:center;font-size: 100%;padding: 1.25em 0.4em;" >今月の成績</a>
            <a href="{{ route('culculate.index') }}" class="badge badge-pill badge-light" style="vertical-align:center;font-size: 100%;padding: 1.25em 0.4em;">今月の収支</button></a>
    </div>
    <div class='row justify-content-around mt-3'>
            <a href="{{ route('grades.create') }}">
                <button type='button' class='btn btn-outline-primary'>成績作成</button>
            </a>
            <a href="{{ route('culculate.create') }}">
                <button type='button' class='btn btn-outline-secondary'>収支作成</button>
            </a>
    </div>


    <form action="{{ url('/') }}" method="get">
            <div class="row justify-content-around">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header text-center">検索フォーム</div>
                            <div class="card-body">
                                <div class="card-body">
                                    
                                    <!-- 検索フォーム -->
                                    <nav class="navbar navbar-light bg-light">
                                    <form action="" method="GET">
                                        <input type='date' class='form-control' name='date' id='date'value="{{ old('date') }}"/>
                                        <select name='map_id' class='form-control'>
                                            <option value="" hidden></option> 
                                                @foreach($maps as $map)
                                                    <option value="{{ $map['id']}}" >{{ $map['shopname'] }}</option>
                                                @endforeach  
                                            </select>
                                        <button type="submit" class="kensakubtn btn btn-outline-success">検索</button>
                                    </form>
                                    </nav>
                                    <!-- 検索結果フォーム -->
                                    <table class='table kensaku'>
                                    <thead>
                                        <tr>
                                            <th>1着</th>
                                            <th>2着</th>
                                            <th>3着</th>
                                            <th>勝ち</th>
                                            <th>負け</th>
                                            <th>店舗名</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($grades as $grade)
                                        <tr>
                                        
                                            <th>{{ $grade['top'] }}回</th>
                                            <th>{{ $grade['second'] }}回</th>
                                            <th>{{ $grade['third'] }}回</th>
                                            <th>{{ $grade['income'] }}</th>
                                            <th>{{ $grade['spending'] }}</th>
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
            </div>
        </form>










</body>
</html>