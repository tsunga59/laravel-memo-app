@extends('layouts.app')

@section('content')

<section class="login">
    <div class="container">
        <form action="{{ route('login.exec') }}" method="post">
            @csrf
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
                        <label for="email">メールアドレス</label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" autocomplete="off" autofocus value="{{ old('email') }}">
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
            <button type="submit">ログインする</button>
            <div class="account">
                <p>アカウントをお持ちでない方</p>
                <a href="{{ route('register.index') }}">アカウントを作成する</a>
            </div>
        </form>
    </div>
</section>
@endsection