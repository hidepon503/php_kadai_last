<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello_world', function(){
    return 'Hello World';
});
// 上記の関数をアロー関数を用いて書き換えると以下のようになる


// 世界の時間
Route::get('/world-time', [  App\Http\Controllers\UtilityController::class, 'worldtime']);

// おみくじ
Route::get('/omikuji', [  App\Http\Controllers\GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [  App\Http\Controllers\GameController::class, 'monty_hall']);

// リクエスト
Route::get('/form', [ RequestSampleController::class, 'form']);
Route::get('/query-strings', [ RequestSampleController::class, 'queryStrings']);

// ルートパラメーター
Route::get('/users/{id}',[RequestSampleController::class, 'profile'])->name('profile');
Route::get('/products/{category}/{year?}',[RequestSampleController::class, 'puroductsArchive']);
Route::get('/route-link',[RequestSampleController::class, 'routeLink']);

// ダミーログイン
Route::get('/login', [RequestSampleController::class, 'loginform']);
Route::post('/login', [RequestSampleController::class, 'login'])->name('login');

// リソースコントローラーとリソースルートの利用
Route::resource('/events', EventController::class)->only([ 'create', 'store' ]);

// ハイローゲーム
// ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);

// ファイル管理
Route::resource('/photos', PhotoController::class)->only([ 'create', 'store' ]);