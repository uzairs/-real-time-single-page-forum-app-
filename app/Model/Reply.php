<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;
use App\Model\User;
use App\Model\Like;
class Reply extends Model
{
  public function user()
  
  {

  return $this->blongsTo(User::class);
  
}

  public function question()
  
  {

     return $this->blongsTo(Question::class);


  }

  public function like(){


    return $this->hasMany(Like::class);
  }





}
