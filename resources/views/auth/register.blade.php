@extends('layouts.app')

@section('content')

<section class="register">
    <div class="container">
        <form action="{{ route('memo.index') }}" method="">
            @csrf
            <!-- エラーメッセージ -->
            {{-- <?php if(isset($_SESSION['errors'])): ?>
                <div class="error_area">
                    <?php foreach($_SESSION['errors'] as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?> --}}
            <table>
                <tr>
                    <th>
                        <label for="name">ユーザー名</label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" placeholder="山田 太郎" autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="email">メールアドレス</label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" placeholder="example@com" autocomplete="off">
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
                <a href="{{ route('login') }}">ログイン画面へ</a>
            </div>
        </form>
    </div>
</section>
@endsection