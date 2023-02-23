<?php

use App\Http\Controllers\createShortLink;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\deviceCheck;
use App\Models\Lead;
use App\Models\Lead2;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use AshAllenDesign\ShortURL\Controllers\ShortURLController;
use AshAllenDesign\ShortURL\Models\ShortURL;

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
Route::get('test',[deviceCheck::class,'index']);
Route::get('test2',function(){
    for($i=0;$i<20;$i++){
        Lead::create([
            'name'=> 'lead'.$i,
            'phone'=>$i,
            'compain_user_id'=>'1',
            'ip'=>'154.180.1.'.$i
        ]);
        Lead2::create([
            'name'=> 'lead'.$i,
            'phone'=>$i,
            'compain_user_id'=>'1',
            'ip'=>'185.16.38.'.$i
        ]);

        // return 'done';
    }
   
});
Route::get('deleteleads',[LeadController::class,'deleteleads']);


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('myleads',[LeadController::class,'index']);

Route::get('/home/{compain_id?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('form/{shortURLKey}',function($shortURLKey){

    $shortURLKey = $shortURLKey;
    $url =ShortURL::where('url_key',$shortURLKey)->first();
    return view('formpage',get_defined_vars());
})->middleware('IsForm');
Route::get('/clientdashboard', function(){return view('clientdashboard');})->middleware('auth');
Route::get('report',[ReportController::class,'index']);
Route::get('/{shortURLKey}', ShortURLController::class)->middleware('IsForm');

Route::get('/short/{shortURLKey}', function($shortURLKey){
   $details = ShortURL::where('url_key',$shortURLKey)->first();
   if($details->compain_id ==4 |$details->compain_id ==5|$details->compain_id ==6){
    $shortURLKey =ShortURL::where('user_id',$details->user_id)->where('compain_id',$details->compain_id)->get()->last();
    return view('loading',['url'=>'form/'.$shortURLKey->url_key,'url2'=>$details->destination_url]);

   }
   else{
    $shortURLKey =ShortURL::where('user_id',$details->user_id)->where('compain_id',$details->compain_id)->get()->last();

    return view('loading',['url'=>'redirectpage/'.$shortURLKey->url_key,'url2'=>$shortURLKey->url_key]);

   }
})->middleware('IsForm');

Route::get('redirectpage/{shortURLKey}', function($shortURLKey){
    return view('redirectpage',['url'=>$shortURLKey]);
});


Route::post('makeshortlink',[createShortLink::class,'index']);
Route::post('addlead',[LeadController::class,'create']);



URL::forceScheme('https');



