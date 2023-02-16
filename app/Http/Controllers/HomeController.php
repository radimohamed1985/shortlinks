<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserShortUrl;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)

    {
        $usershorturl =UserShortUrl::where('user_compain_id',$id)->where('user_id',auth()->user()->id)->get()->last();
// dd($usershorturl);
        if($usershorturl ==null){
    $compain_id =$id;
    $lastShortLink=null;
    return view('home',get_defined_vars());

}else{
    $lastShortLink =ShortURL::where('id', $usershorturl->short_url_id)->get()->last();
    // dd($lastShortLink);
    $compain_id =$id;
    $id=$id;
   
    return view('home',get_defined_vars());

}
       
    }
}
