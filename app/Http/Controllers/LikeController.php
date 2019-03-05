<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use Illuminate\Http\Request;
use App\Model\Like;
use App\Events\LikeEvent;

class LikeController extends Controller

{
    public function __construct()

   {
 
     $this->middleware('JWT');
   
    
    }


    
public function getlike()

{
    return Like::get();

}

    

public function  likeIt(Reply $reply)

{

     $reply->like()->create([

         'user_id'=> auth()->id()
     ]);

 
     broadcast(new LikeEvent($reply->id,1))->toOthers();
}

public function unlikeIt(Reply $reply)

{
    $reply->like()->where('user_id', auth()->id())->first()->delete();
  // $reply->like()->where('user_id', '1')->first()->delete();
 
  broadcast(new LikeEvent($reply->id,0))->toOthers();
  

} 
  


}
