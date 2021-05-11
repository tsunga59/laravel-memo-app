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

        return view('memo', [
            'name' => $this->getLoginName(),
            'memos' => $memos,
            'selected_memo' => session()->get('selected_memo'),
        ]);
    }

    /**
     * メモの新規追加
     * 
     * @return RedirectResponse
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

    /**
     * メモの更新
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $memo = Memo::find($request->edit_id);
        $memo->title = $request->edit_title;
        $memo->content = $request->edit_content;

        if($memo->update()) {
            session()->put('selected_memo', $memo);
        } else {
            session()->remove('selected_memo');
        }

        return redirect()->route('memo.index');
    }

    /**
     * メモの削除
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        $memo = Memo::find($request->edit_id);
        $memo->delete();
        session()->remove('selected_memo');

        return redirect()->route('memo.index');
    }

    /**
     * メモの選択
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function select(Request $request)
    {
        $memo = Memo::find($request->id);
        session()->put('selected_memo', $memo);

        return redirect()->route('memo.index');
    }

    /**
     * ログインユーザー名の取得
     * 
     * @return string
     */
    private function getLoginName()
    {
        $user = Auth::user();
        if(mb_strlen($user->name) > 10) {
            $name = mb_substr($user->name, 0, 10) . '…';
        } else {
            $name = $user->name;
        }

        return $name;
    }   
}