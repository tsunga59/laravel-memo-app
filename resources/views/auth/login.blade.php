@extends('layouts.app')

@section('content')

<section class="login">
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
                        <label for="email">メールアドレス</label>
                    </th>
                    <td>
                        <input type="email" name="email" id="email" autocomplete="off">
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
                <a href="{{ route('register') }}">アカウントを作成する</a>
            </div>
        </form>
    </div>
</section>
@endsection