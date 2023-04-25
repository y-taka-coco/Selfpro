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
                        <h4 class='text-center'>お店登録</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <form action="{{ route('maps.store') }}" method="post">
                                @csrf
                                <label for='amount'>お店の名前</label>
                                    <input type='text' class='form-control' name='shopname' value="{{ old('shopname') }}"/>
                                <label for='amount'>最寄り駅</label>
                                    <input type='text' class='form-control' name='address' value="{{ old('address') }}"/>
                                <div class='row justify-content-center'>
                                    <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
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