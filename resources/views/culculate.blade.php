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
            
                <a href="{{ route('users.useredit',Auth::user()->id) }}">
                @if(file_exists(public_path().'/storage/post_img/'. $img .'.jpg'))ユーザー情報変更
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
                <div class="card">
                    
                       
                            <table class='table table-hover'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th class='text-center'>今月の収支</th>
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
            </div>


        <!-- カレンダー表 日付の比較をその月のデータを持ってこさせる -->
        <div class="row justify-content-around">
            <div class="card border-info mb-3">
                <div class="card-body text-info">
                <table border="1" style="max-width: 100%;table-layout: fixed;width: 700px;" >
                        <tr class='bg-info'><!-- 曜日（予定） -->
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                            01
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-01")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>02
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-02")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>03
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-03")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>04
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-04")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>05
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-05")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>06
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-06")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>07
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-07")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>08
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-08")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>09
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-09")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>10
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-10")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>11
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-11")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>12
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-12")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>13
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-13")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>14
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-14")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>15
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-15")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>16
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-16")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>17
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-17")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>18
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-18")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>19
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-19")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>20
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-20")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>21
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-21")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>22
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-22")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>23
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-23")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>24
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-24")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>25
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-25")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>26
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-26")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>27
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-27")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>28
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-28")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>29
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-29")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>30
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-30")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td hidden>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-31")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">31</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
        </table>

                </div>

            </div>
        </div>



</main>
</body>
</html>