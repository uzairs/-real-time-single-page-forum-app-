<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\User;
use App\Model\Like;

class Reply extends Model
{
  protected $guarded = [];
  
  public function user()
  
  {

    //Many users one reply  
  return $this->belongsTo(User::class);
  
}

  public function question()
  
  {
     //Many question one reply 
     return $this->belongsTo(Question::class);


  }

  public function like()
  {

  //Many like one Reply
    return $this->hasMany(Like::class);
  
  }





}
