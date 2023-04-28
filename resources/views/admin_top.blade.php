@extends('layout')

<body class="bg-dark">
    <div id="app">
        <!-- ヘッダー -->
    <nav class="navbar navbar-light text-white bg-warning">
        @if(Auth::check())
            @if(Auth::user()->role==0)
            <a href="{{ url('admin_top') }}" >管理者TOPページ</a>
            @endif
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
            
                <a href="{{ route('users.useredit',Auth::user()->id) }}">
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
                <div class="col-md-4">
                    <div class="card border-dark">
                        <div class="card-header bg-dark">
                        <h4 class='text-center bg-success' style="font-size: 3.35rem;">ユーザー一覧</h1>
                        </div>
                        <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名前</th>
                                            <th>メールアドレス</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-striped">
                                        @foreach($users as $user)
                                        <tr>
                                            <th scope='col'>{{ $user['id'] }}</th>
                                            <th scope='col'>{{ $user['name'] }}</th>
                                            <th scope='col'>{{ $user['email'] }}</th>
                                            <th scope='col'><a href="{{ route('users.edit',$user['id']) }}" class="badge badge-pill badge-success">
                                                                <h3>編集</h3>
                                                            </a>
                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    
                </div>

                <!-- 無限スクロール -->
            
                <div class="col-md-4">
                        <div class="card-header">
                        <h4 class='text-center bg-success' style="font-size: 3.35rem;">店舗一覧</h1>
                        </div>
                        <div class='row justify-content-around mt-3'>
                        <a href="{{ route('maps.create') }}" class="badge badge-pill badge-success"><h3>店舗登録</h3></a>   
                    </div>
                        <div class="card-body bg-light">
                                <div id="data-container">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>店舗名</th>
                                                <th>最寄り駅</th>
                                                <th></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="post-list">
                                            @foreach($maps as $map)
                                            <tr>
                                                <th scope='col'>{{ $map['id'] }}</th>
                                                <th scope='col'>{{ $map['shopname'] }}</th>
                                                <th>{{ $map['address'] }}</th>
                                                <th scope='col'>
                                                    <a href="{{ route('maps.edit',$map['id']) }}"class="badge badge-pill badge-success"><h3>編集</h3></a>
                                                </th>
                                            </tr>
                                            @endforeach
                                            <!-- 無限スクロール -->
                                            
                                            {{ $maps->links() }}
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class='row justify-content-around mt-3'>
                        <button type='button' class='btn btn-secondary more'>more</button>
                    </div> -->

                        </div>
                    
                    
                </div>
        </main>
    </div>

    




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/js/mugen.js') }}"></script>
</body>
</html>