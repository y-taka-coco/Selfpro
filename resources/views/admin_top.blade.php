@extends('layout')



<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MSM（仮）管理者ページ
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>ユーザー表示</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名前</th>
                                            <th>メールアドレス</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <th scope='col'><a href="{{ route('users.edit',$user['id']) }}">{{ $user['id'] }}</a></th>
                                            <th scope='col'>{{ $user['name'] }}</th>
                                            <th scope='col'>{{ $user['email'] }}</th>
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
                        <div class='text-center'>お店</div>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>お店の名前</th>
                                        <th>最寄り駅</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($maps as $map)
                                    <tr>
                                        <th scope='col'><a href="{{ route('maps.edit',$map['id']) }}">{{ $map['id'] }}</a></th>
                                        <th scope='col'>{{ $map['shopname'] }}</th>
                                        <th>{{ $map['address'] }}</th>
                                        
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
            <a href="">
                <button type='button' class='btn btn-primary'>ユーザーの編集</button>
            </a>
            <a href="{{ route('maps.create') }}">
                <button type='button' class='btn btn-secondary'>お店の登録</button>
            </a>
            
    </div>





</body>
</html>