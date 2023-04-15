@extends('layout')



<div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>収支編集画面</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('culculate.update',$result['id']) }}" method="post">
                            @csrf
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date'value="{{ $result->date }}"/>
                            <label for='amount'>勝ち額</label>
                                <input type='text' class='form-control' name='income' value="{{ $result->income }}"/>
                             <label for='amount'>負け額</label>
                                <input type='text' class='form-control' name='spending' value="{{ $result->spending }}"/>
                                <label for='amount'>お店</label>
                                <select name='map_id' class='form-control'>
                                    <option value="" hidden></option> 
                                    @foreach($maps as $map)
                                        @if($map['id'] == $result['map_id'])
                                        <option value="{{ $map['id']}}" selected>{{ $map['shopname'] }}</option>
                                        @else
                                        <option value="{{ $map['id']}}">{{ $map['shopname'] }}</option>
                                    @endif
                                @endforeach  
                                </select> 
                            
                                <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                            <a href="{{ url('/')}}">トップに戻る<br></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>
</html>