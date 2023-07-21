<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    // form.blade.phpの処理を実行し、query-stringsアクションで処理を返す
    public function form(){
        return view('form');
    }

    public function queryStrings(Request $request){
        $keyword = '未設定';
        if($request->has('keyword')){
            $keyword = $request->keyword;
        }
        // $keyword = $request->get('keyword', '未入力');
        return 'キーワードは「' .$keyword. '」です。';
    }

    // ルートパラメーター
    public function profile($id){
        return 'ID: ' .$id;
    }
    // 複数のルートパラメーターとURL query パラメーターを組み合わせた例
    public function puroductsArchive(Request $request, $category,$year){
        return 'カテゴリー: ' .$category. ' <br> 年: ' .$year. '<br> ページ;' .$request->get('page', '1');
    }
    // 名前付きルート
    public function routeLink(){
        $url = route('profile', ['id' => 1, 'photos' => 'yes']);
        return 'プロフィールページへのURL: ' .$url; 
    }

    // ダミーログイン
    // ログインフォームを表示するアクション
    public function loginform(){
        return view('login');
    }
    // ログインフォームの送信先
    public function login(Request $request){
    if ($request->get('email') === 'user@example.com' && $request->get('password') === '12345678') {
        return 'ログイン成功';
    }
    return 'ログイン失敗';
    }
}
