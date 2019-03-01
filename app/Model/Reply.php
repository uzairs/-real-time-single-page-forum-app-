<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\User;
use App\Model\Like;

class Reply extends Model
{
  
  protected static function boot() 
  {

    parent::boot();

    static::creating(function($reply) {

       $reply->user_id = auth()->id();

    });
  
  }

  protected $guarded = [];
  

  public function user()
  
  { 

    //Many reply one user  
  return $this->belongsTo(User::class);
  
}

  public function question()
  
  {
     //Many reply one question  
     return $this->belongsTo(Question::class);


  }

  public function like()
  {

   //Many like one Reply
    return $this->hasMany(Like::class);
  
  }





}
