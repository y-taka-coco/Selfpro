@extends('layout')
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
    </main>
</body>
</html>