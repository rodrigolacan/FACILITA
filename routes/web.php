<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Main;
use App\Http\Controllers\Desencurtar;
use App\Http\Controllers\Login;
use App\Http\Controllers\Sorteador;
use App\Http\Controllers\Conversor;
use App\Http\Controllers\CriarHelp;
use App\Http\Controllers\ListarHelp;
use App\Http\Controllers\MeusLinks;
use App\Http\Middleware\OauthBitrix;
use App\Http\Middleware\VerifyADUser;
use Illuminate\Support\Facades\Cookie;



Route::match(['post','get'],'/',[Login::class,'Login'])->name('Login');
Route::get('/sb{id}',[Desencurtar::class,'desencurtar'])->name('desencurtar');

Route::get('/sorteador',[Sorteador::class,'sortear'])->name('sorteador')->middleware(VerifyADUser::class);
Route::post('/sorteador-post',[Sorteador::class,'sortearPost'])->name('sorteadorPost')->middleware(VerifyADUser::class);

Route::match(['get','post'],'/encurtador', [Main::class,'principal'])->name('principal')->middleware(VerifyADUser::class);
Route::post('/encurtar',[Main::class,'encurtar'])->name('encurtar');

Route::get('/index/meusLinks',[MeusLinks::class,'index'])->name('meusLinks')->middleware(VerifyADUser::class);
Route::get('/index/buscarMeusLinks',[MeusLinks::class,'buscarLink'])->name('buscarMeusLinks')->middleware(VerifyADUser::class);

Route::match(['get','post'],'/index', function (){
    return view('Logado.index');
})->middleware(VerifyADUser::class)->name('welcome');

Route::get('/logout', function () {
    $cookie = Cookie::forget('CID');
    return response()->redirectToRoute('Login')->withCookie($cookie);
})->name('logout');