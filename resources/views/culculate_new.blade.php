@extends('layout')


<body class="bg-dark">
<div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>収支入力画面</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('grades.store') }}" method="post">
                            @csrf
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date'value="{{ old('date') }}"/>
                            <label for='amount'>勝ち額(半角数字で入力してください)</label>
                                <input type='text' class='form-control' name='income' value="{{ old('income') }}"/>
                             <label for='amount'>負け額(半角数字で入力してください)</label>
                                <input type='text' class='form-control' name='spending' value="{{ old('spending') }}"/>
                            <label for='amount'>お店</label>
                                <select name='map_id' class='form-control'>
                                    <option value="" hidden></option> 
                                        @foreach($maps as $map)
                                            <option value="{{ $map['id']}}" selected>{{ $map['shopname'] }}</option>
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