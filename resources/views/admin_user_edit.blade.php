@extends('layout')


<body class="bg-dark">
<div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>ユーザー編集画面</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('users.update',$result['id']) }}" method="post">
                            @csrf
                            <label for='amount'>ユーザー名</label>
                                <input type='text' class='form-control' name='name' value="{{ $result->name }}"/>
                             <label for='amount'>メールアドレス</label>
                                <input type='text' class='form-control' name='email' value="{{ $result->email }}"/>
                                <div class='row justify-content-around'>
                               
                                    <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                                    
                                </div> 
                            <a href="{{ url('admin_top')}}">管理者トップに戻る<br></a>
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