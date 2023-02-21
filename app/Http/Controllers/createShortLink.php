<?php

namespace App\Http\Controllers;

use App\Models\UserShortUrl;
use Illuminate\Http\Request;
use AshAllenDesign\ShortURL\Facades\ShortURL;


class createShortLink extends Controller
{
    public function index(Request $request){
        $res=[];
    if(str_starts_with($request->url,'https://')){
        $res[] =$request->url;
    }elseif(str_starts_with($request->url,'http://')){
    $res[] =str_replace('http://','https://',$request->url);;

    }elseif(str_starts_with($request->url,'www')){
        $res[] ='https://'.$request->url;
      }else{
        $res[] ='https://'.$request->url;
      }
    //   $customkey= config('settings.Url_key_prefix');
      $mykey=base64_encode($res[0]);
        $shortURLObject = ShortURL::destinationUrl($res[0])->make();
        
        $shortURLObject->compain_id =$request->compain_id;
        $shortURLObject->save();
        $shortURLObject->user_id =$request->user_id;
        $shortURLObject->save();
       
            $shortURL = $shortURLObject->default_short_url;
            $destination = $shortURLObject->destination_url;
            $usershorturl=
            UserShortUrl::create([
                'user_id'=>auth()->user()->id,
                'short_url_id'=> $shortURLObject->id,
                'user_compain_id'=>$request->compain_id
            ]);
            return[0=>$shortURL,1=>$destination];
    }
}
