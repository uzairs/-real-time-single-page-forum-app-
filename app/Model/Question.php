<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
use App\User;
use App\Model\Reply;


class Question extends Model

{

  //protected $guarded = [];
  protected $fillable =  ['title', 'slug', 'body', 'user_id','category_id'];
  public static function boot()
  
  {

     parent::boot();

     static::creating(function($question) {

     $question->slug = str_slug($question->title);

      });

  }







  public function getroutekeyname()
  {
    return 'slug';
  }

   public function user() 
   
   {
   
    //one user to Many Question relationship
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

       return "/question/$this->slug";
  }




}
