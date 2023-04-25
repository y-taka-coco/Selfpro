@extends('layout')


<body class="bg-dark">

<div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class='text-center'>成績入力画面</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('grades.store') }}" method="post">
                            @csrf
                            <label for='date' class='mt-2'>日付</label>
                                <input type='date' class='form-control' name='date' id='date'value="{{ old('date') }}"/>
                            <label for='amount'>1着(半角数字で入力してください)</label>
                                <input type='text' class='form-control' name='top' value="{{ old('top') }}"/>
                             <label for='amount'>２着(半角数字で入力してください)</label>
                                <input type='text' class='form-control' name='second' value="{{ old('second') }}"/>
                            <label for='amount'>３着(半角数字で入力してください)</label>
                                <input type='text' class='form-control' name='third' value="{{ old('third') }}"/>
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