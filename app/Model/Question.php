<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\User;
use App\Model\Reply;


  

class Question extends Model
{

  protected $guarded = [];

  public function getroutekeyname()
  {
    return 'slug';
  }

   public function user() {
   
    //one to Many relationship
    return $this->belongsTo(User::class); 
  
  }

  

  public function category()
 
 {

   //one to Many  relationship
    return $this->belongsTo(Category::class);
  
  }


  public function replices()
  {

  //one many revers relationship
   return $this->hasMany(Reply::class);

  }


  public function getPathAttribute()
  {

       return asset("api/question/$this->slug");
  }




}
