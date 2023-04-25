@extends('layout')




<body class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin_top') }}">
                    <h1>MSS（麻雀成績収支）管理者ページ</h1>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名前</th>
                                            <th>メールアドレス</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-striped">
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
                    <div class='row justify-content-around mt-3'>
                        <a href="{{ route('maps.create') }}">
                            <button type='button' class='btn btn-secondary'>お店の登録</button>
                        </a>   
                    </div>
                </div>

                <!-- 無限スクロール -->
            
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>お店</div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div id="data-container">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>お店の名前</th>
                                                <th>最寄り駅</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="post-list">
                                            @foreach($maps as $map)
                                            <tr>
                                                <th scope='col'><a href="{{ route('maps.edit',$map['id']) }}">{{ $map['id'] }}</a></th>
                                                <th scope='col'>{{ $map['shopname'] }}</th>
                                                <th>{{ $map['address'] }}</th>
                                            </tr>
                                            @endforeach
                                            <!-- 無限スクロール -->
                                            
                                            {{ $maps->links() }}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row justify-content-around mt-3'>
                        <button type='button' class='btn btn-secondary more'>more</button>
                    </div>
                </div>
        </main>
    </div>

    




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('/js/mugen.js') }}"></script>
</body>
</html>