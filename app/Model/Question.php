<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\Model\User;
use App\Model\Reply;


class Question extends Model
{


   public function user() {
   
    //one to Many relationship
    return $this->blongsTo(User::class); 
  
  }

  

  public function category()
 
 {

   //one to Many  relationship
    return $this->blongsTo(Category::class);
  
  }


  public function replices()
  {

  //one many revers relationship
   return $this->hasMany(Reply::class);

  }





}
