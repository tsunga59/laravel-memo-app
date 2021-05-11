<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * メモ投稿画面の表示
     * 
     * @return view
     */
    public function index()
    {
        $memos = Memo::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

        // ログインユーザー名の取得
        $name = Auth::user()->name;
        if(mb_strlen($name) > 10) {
            $name = mb_substr($name, 0, 10). "…";
        }
        
        return view('memo', ['memos' => $memos, 'name' => $name]);
    }

    /**
     * メモの新規追加
     * 
     * @return view
     */

    public function create()
    {
        Memo::create([
            'user_id' => Auth::id(),
            'title' => '新規メモ',
            'content' => "",
        ]);

        return redirect()->route('memo.index');
    }
}
