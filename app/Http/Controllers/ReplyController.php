<?php

namespace App\Http\Controllers;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use App\Http\Resources\ReplyResource;
use App\Notifications\NewReplyNotification;
class ReplyController extends Controller
{


    public function __construct()

    {
 
      $this->middleware('JWT', ['except' => ['index','show']]);
    
     
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
 
        return   ReplyResource::collection($question->replices);              
        // return  Reply::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    
    {
         $reply =  $question->replices()->create($request->all());
         $user = $question->user;

         if($reply->user_id !== $question->user_id){
             
            $user->notify(new NewReplyNotification($reply));

         }
         
         return response(['reply'=> new ReplyResource($reply)]
        );
      
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question,  Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Question $question, Reply $reply)
    {

           $reply->update($request->all());
           return 'Updated';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Reply $reply)
    {
    
         $reply->delete();          
        return response('DELETED');
    }
}
