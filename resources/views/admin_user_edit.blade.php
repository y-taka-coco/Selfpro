@extends('layout')


<body class="bg-dark">
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
<div class="col-md-5 mx-auto">
                <div class="card-header">
                    <h4 class='text-center bg-success' style="font-size: 3.35rem;">ユーザー編集画面</h1>
                </div>
                <div class="bg-success">
                    <div class="card-body">
                        <form action="{{ route('users.update',$result['id']) }}" method="post"class="form-inline">
                            @csrf
                            <div class="form-group">
                                <label for='amount'>ユーザー名&emsp;&emsp;</label>
                                    <input type='text' class='form-control' name='name' value="{{ $result->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for='amount'>メールアドレス</label>
                                    <input type='text' class='form-control' name='email' value="{{ $result->email }}"/>
                            </div>
                                    <div class="text-right" style="margin-left: 60px;">
                                        <button type='submit' class='btn btn-light mt-3' style="border-radius: 5.25rem;">登録</button>
                                    </div>
                            
                        </form>
                        <form action="{{ route('users.delete',$result['id']) }}" method="POST"> 
                            @csrf
                            <input type="submit" class="btn btn-danger mt-3" value="削除"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>
</html>