@extends('layout')


<body class="bg-dark">
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
                                <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                            <a href="{{ url('admin_top')}}">管理者トップに戻る<br></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>
</html>