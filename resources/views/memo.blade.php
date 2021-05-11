@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/memo.css') }}">
@endsection

@section('content')

<section class="memo">
    <div class="memo_left">
        <div class="top_area">
            <p>{{ $name }}さん、ようこそ！</p>
            <div class="btn_area">
                <a href="{{ route('login.index') }}"><i class="fas fa-sign-out-alt"></i></a>
                <a href="{{ route('memo.create') }}"><i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="memo_list">
            @if($memos->count() === 0)
                <p>メモがありません。</p>
            @endif
            @foreach($memos as $memo)
            {{-- <a href="./action/select.php?id=<?php echo $memo['id']; ?>" class="<?php echo $edit_id == $memo['id'] ? 'active' : ''; ?>"> --}}
                <a href="" class="">
                    <p class="title">{{ $memo->title }}</p>
                    <span class="date">{{ date('Y/m/d H:i', strtotime($memo->updated_at)) }}</span>
                    <span class="description">{{ mb_substr($memo->content, 0, 25).'…' }}</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="memo_right">
        {{-- <?php if(isset($_SESSION['selected_memo'])): ?> --}}
        <form action="" method="post">
            <input type="hidden" name="edit_id" value="">
            <div class="top_area">
                <div class="btn_area">
                    <button type="submit" formaction=""><i class="fas fa-pen"></i></button>
                    <button type="submit" formaction=""><i class="fas fa-trash"></i></button>
                </div>
            </div>
            <div class="content_area">
                <input type="text" name="edit_title" placeholder="タイトル…" value="" class="title">
                <textarea name="edit_content" placeholder="詳細テキスト…" class="content"></textarea>
            </div>
        </form>
        {{-- <?php else: ?>
        <p>メモを新規作成または選択してください。</p>
        <?php endif; ?> --}}
    </div>
</section>

@endsection