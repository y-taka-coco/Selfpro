@extends('layout')


<body class="bg-dark">
            
        <div class="col-md-5 mx-auto">
                    <div class="card-header">
                    <h4 class='text-center bg-success' style="font-size: 3.35rem;">店舗編集画面</h1>
                    </div>
                    <div class="bg-success">
                        <div class="card-body">
                            <form action="{{ route('maps.update',$result['id']) }}" method="post" class="form-inline">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                <label for='amount'>店舗名</label>
                                    <input type='text' class='form-control' name='shopname' value="{{ $result->shopname }}"/>
                                </div>
                                <div class="form-group">
                                <label for='amount'>最寄り駅</label>
                                    <input type='text' class='form-control' name='address' value="{{ $result->address }}"/>
                                </div>


                                    <div class="text-right" style="margin-left: 60px;">
                                        <button type='submit' class='btn btn-light mt-3' style="border-radius: 5.25rem;">登録</button>
                                    </div>
                                    <div style="padding-left: 250px;padding-top: 20px; col-light">
                                        <a href="{{ url('admin_top')}}">管理者トップに戻る<br></a>
                                    </div>
                            </form>
                            <form action="{{ route('maps.destroy',$result['id']) }}" method="POST">
                                                    @method('DELETE')
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