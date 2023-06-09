@extends('layout')
<body class="bg-dark">

<div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card text-white bg-primary mb-3">
          <div class="card-header">ログイン</div>
          <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-light">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
          /
          <a class="may-navbar-item" href="{{ route('register') }}">会員登録</a>
        </div>
      </div>
    </div>
  </div>
</div>  
</body>