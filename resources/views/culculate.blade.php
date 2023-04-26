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
                                        <th class='text-center text-primary'>+{{$kati}}</th>
                                    </tr>
                                    <tr>
                                        <th class='text-center text-danger'>-{{$make}}</th>
                                    </tr>
                                    <tr>
                                        @if($kati > $make)
                                            <th class='text-center'>+{{$kati}}</th>
                                        @elseif($kati < $make)
                                            <th class='text-center'>-{{$make}}</th>
                                        @elseif($kati == $make)
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
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-01")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">01</a>
                                    @else
                                    @endif
                                @endforeach
                                01
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-02")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">02</a>
                                    @else
                                    @endif
                                @endforeach
                                02
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-03")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">03</a>
                                    @else
                                    @endif
                                @endforeach
                                03
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-04")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">04</a>
                                    @else
                                    @endif
                                @endforeach
                                04
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-05")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">05</a>
                                    @else
                                    @endif
                                @endforeach
                                05
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-06")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">06</a>
                                    @else
                                    @endif
                                @endforeach
                                06
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-07")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">07</a>
                                    @else
                                    @endif
                                @endforeach
                                07
                            </td>
                        </tr>
                        <tr>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-08")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">08</a>
                                    @else
                                    @endif
                                @endforeach
                                08
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-09")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">09</a>
                                    @else
                                    @endif
                                @endforeach
                                09
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-10")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">10</a>
                                    @else
                                    @endif
                                @endforeach
                                10
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-11")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">11</a>
                                    @else
                                    @endif
                                @endforeach
                                11
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-12")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">12</a>
                                    @else
                                    @endif
                                @endforeach
                                12
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-13")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">13</a>
                                    @else
                                    @endif
                                @endforeach
                                13
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-14")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">14</a>
                                    @else
                                    @endif
                                @endforeach
                                14
                            </td>
                        </tr>
                        <tr>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-15")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">15</a>
                                    @else
                                    @endif
                                @endforeach
                                15
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-16")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">16</a>
                                    @else
                                    @endif
                                @endforeach
                                16
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-17")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">17</a>
                                    @else
                                    @endif
                                @endforeach
                                17
                            </td>
                            <td>@foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-18")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">18</a>
                                    @else
                                    @endif
                                @endforeach
                                18
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-19")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">19</a>
                                    @else
                                    @endif
                                @endforeach
                                19
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-20")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">20</a>
                                    @else
                                    @endif
                                @endforeach
                                20
                            </td>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-21")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">21</a>
                                    @else
                                    @endif
                                @endforeach
                                21
                            </td>
                        </tr>
                        <tr>
                            <td>
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-22")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">22</a>
                                    @else
                                    @endif
                                @endforeach
                                22
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-23")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">23</a>
                                    @else
                                    @endif
                                @endforeach
                                23
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-24")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">24</a>
                                    @else
                                    @endif
                                @endforeach
                                24
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-25")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">25</a>
                                    @else
                                    @endif
                                @endforeach
                                25
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-26")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">26</a>
                                    @else
                                    @endif
                                @endforeach
                                26
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-27")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">27</a>
                                    @else
                                    @endif
                                @endforeach
                                27
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-28")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">28</a>
                                    @else
                                    @endif
                                @endforeach
                                28
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-29")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">29</a>
                                    @else
                                    @endif
                                @endforeach
                                29
                            </td>
                            <td>
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-04-30")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">30</a>
                                    @else
                                    @endif
                                @endforeach
                                30
                            </td>
                            <td>
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