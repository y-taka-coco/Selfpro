@extends('layout')


<body class="bg-dark">
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
                @elseif(file_exists(public_path().'/storage/post_img/'. 0 .'.png'))
                <img src="/storage/post_img/0.png" style="height:100px;width:100px;border-radius:50%;">

                @endif
                </a>
           
        </nav>
        <!-- ヘッダーここまで -->
<main class="py-4">
<div class="col-md-5" style="margin-right: auto;margin-left: auto;">
            
                <div class="card-header" style="padding: 0px 0px;">
                    <h4 class='text-center bg-info' style="font-size: 3.35rem;">成績入力画面</h1>
                </div>
                <div class="bg-info">
                    <div class="card-body">
                        <form action="{{ route('grades.store') }}" method="post" class="form-inline">
                            @csrf
                                <label for='date' class='mt-2'>
                                    日付<input type='date' class='form-control' name='date' id='date'value="{{ old('date') }}"/>
                                </label>
                            <div class="form-group">
                                            <label for='amount'>１着(半角数字で入力してください)</label>
                                                <input type='text' class='form-control' name='top' value="{{ old('top') }}" style="width: 20%;margin: auto;"/>
                            </div>
                            <div class="form-group">
                                            <label for='amount'>２着(半角数字で入力してください)</label>
                                                <input type='text' class='form-control' name='second' value="{{ old('second') }}" style="width: 20%;margin: auto;"/>
                            </div>
                            <div class="form-group">
                                            <label for='amount'>３着(半角数字で入力してください)</label>
                                                <input type='text' class='form-control' name='third' value="{{ old('third') }}" style="width: 20%;margin: auto;"/>
                            </div>
                            <div class="form-group">
                                            <label for='amount'>お店</label>
                                                <select name='map_id' class='form-control'>
                                                    <option value="" hidden></option> 
                                                        @foreach($maps as $map)
                                                            <option value="{{ $map['id']}}">{{ $map['shopname'] }}</option>
                                                        @endforeach 
                                                </select>
                                                <input type='text' class='form-control' name='income' value="0" hidden/>
                                                <input type='text' class='form-control' name='spending' value="0" hidden/>
                            </div>
                            <div class="text-right" style="margin-left: 60px;">
                                <button type='submit' class='btn btn-primary mt-3'  style="border-radius: 5.25rem;">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            
        </div>
    </main>






</body>
</html>