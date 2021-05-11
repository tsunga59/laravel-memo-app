@extends('layouts.app')

@section('content')

<section class="register">
    <div class="container">
        <form action="{{ route('register.exec') }}" method="post">
            @csrf
            <!-- エラーメッセージ -->
            @if($errors->any())
                <div class="error_area">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <table>
                <tr>
                    <th>
                        <label for="name">ユーザー名</label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="user name" autocomplete="off" autofocus value="{{ old('name') }}">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="email">メールアドレス</label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" placeholder="example@com" autocomplete="off" value="{{ old('email') }}">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="password">パスワード</label>
                    </th>
                    <td>
                        <input type="password" name="password" id="password" autocomplete="off">
                    </td>
                </tr>
            </table>
            <button type="submit">登録する</button>
            <div class="account">
                <p>既にアカウントをお持ちの方</p>
                <a href="{{ route('login.index') }}">ログイン画面へ</a>
            </div>
        </form>
    </div>
</section>
@endsection