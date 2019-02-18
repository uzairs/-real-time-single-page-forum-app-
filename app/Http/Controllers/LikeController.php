<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use Illuminate\Http\Request;
use App\Model\Like;


class LikeController extends Controller

{
public function getlike()

{
    return Like::get();

}

    

public function  likeIt(Reply $reply)

{

     $reply->like()->create(['user_id' => '1']);

     return "CREATED";

}

public function unlikeIt(Reply $reply)

{

   $reply->like()->where('user_id', '1')->first()->delete();
   return "Deleted";

} 
  


}
