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
    <div class="row justify-content-around" style="flex-direction: column;">
            <div class="col-md-4" style="margin: auto;">
                <div class="card border-secondary">
                    <div class="text-secondary">
                        <div class="card border-secondary" >
                            <table class='table table-hover'>
                                <thead class='thead-light'>
                                    <tr>
                                        <th></th>
                                        <th class='text-center'>月の収支</th>
                                        <th>
                                            <form id="select" action="{{route('culculate.index')}}" method="get">
                                                <select name="chmonth" id="pull" >
                                                    <option value="{{ $month }}" id="sentaku">{{ $month }}</option><!-- 該当月の数字に変更する -->
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06">06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>　月
                                            </form>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class='text-center'>
                                    <tr>
                                        <th></th>
                                        <th class='text-center text-primary'>+{{$katisum}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th class='text-center text-danger'>-{{$makesum}}</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        @if($katisum > $makesum)
                                            <th class='text-center'>+{{$keka}}</th>
                                        @elseif($katisum < $makesum)
                                            <th class='text-center'>-{{$keka}}</th>
                                        @elseif($katisum == $makesum)
                                            <th class='text-center'>±0</th>
                                        @endif
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                    @if($culculate['date'] === "2023-$month-01")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>02
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-02")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>03
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-03")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>04
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-04")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>05
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-05")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>06
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-06")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>07
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-07")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>08
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-08")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>09
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-09")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>10
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-10")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>11
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-11")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>12
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-12")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>13
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-13")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>14
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-14")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>15
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-15")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>16
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-16")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>17
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-17")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>18
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-18")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>19
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-19")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>20
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-20")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>21
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-21")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td>22
                            @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-22")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>23
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-23")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>24
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-24")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>25
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-25")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>26
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-26")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>27
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-27")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td>28
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-28")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                        </tr>
                        <tr>
                            <td id="nzyukyu">29
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-29")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td id="sanzyu">30
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-30")
                                    <a href="{{ route('culculate.edit',$culculate['id']) }}">詳細</a>
                                    @else
                                    @endif
                                @endforeach
                                
                            </td>
                            <td id="sanzyuuiti">31
                                @foreach($culculates as $culculate)
                                    @if($culculate['date'] === "2023-$month-31")
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/js/mugen.js') }}"></script>

</body>
</html>