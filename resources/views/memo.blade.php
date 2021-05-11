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
                <a href="{{ route('memo.select', ['id' => $memo->id]) }}" class="@if($selected_memo) {{ $selected_memo->id == $memo->id ? 'active' : '' }} @endif">
                    <p class="title">{{ $memo->title }}</p>
                    <span class="date">{{ date('Y/m/d H:i', strtotime($memo->updated_at)) }}</span>
                    <span class="description">{{ mb_substr($memo->content, 0, 25).'…' }}</span>
                </a>
            @endforeach
        </div>
    </div>
    <div class="memo_right">
        @if($selected_memo)
        <form action="" method="post">
            @csrf
            <input type="hidden" name="edit_id" value="{{ $selected_memo->id }}">
            <div class="top_area">
                <div class="btn_area">
                    <button type="submit" formaction="{{ route('memo.update') }}"><i class="fas fa-pen"></i></button>
                    <button type="submit" formaction=""><i class="fas fa-trash"></i></button>
                </div>
            </div>
            <div class="content_area">
                <input type="text" name="edit_title" placeholder="タイトル…" value="{{ $selected_memo->title }}" class="title">
                <textarea name="edit_content" placeholder="詳細テキスト…" class="content">{{ $selected_memo->content }}</textarea>
            </div>
        </form>
        @else
            <p>メモを新規作成または選択してください。</p>
        @endif
    </div>
</section>

@endsection