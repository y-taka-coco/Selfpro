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
        <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class='text-center'>お店編集画面</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('maps.update',$result['id']) }}" method="post">
                                @method('PUT')
                                @csrf
                                <label for='amount'>お店の名前</label>
                                    <input type='text' class='form-control' name='shopname' value="{{ $result->shopname }}"/>
                                <label for='amount'>最寄り駅</label>
                                    <input type='text' class='form-control' name='address' value="{{ $result->address }}"/>
                                    <div class='row justify-content-around'>
                                        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                                        
                                            <form action="{{ route('maps.destroy',$result['id']) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" class="btn btn-danger mt-3" value="削除"/>
                                            </form>
                                    </div> 
                                <a href="{{ url('admin_top')}}">管理者トップに戻る<br></a>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
</div>   
    </main>


</body>
</html>