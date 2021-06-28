<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\HideTweet;
use Illuminate\Http\JsonResponse;


class PostController extends Controller
{
     /*
    *   index construct
    *   @return auth
    */
    public function __construct(){
        $this->middleware('auth');
    }
    /*
    *   index function
    *   @return view
    */
    public function index(){
        $posts = Post::orderBy('fecha','desc')->paginate(7);
        $user = \Auth::user()->id;
            return View ('postt.index',compact('posts','user'));
    }
  /*
     *   create function:show create form
 
     *   @return view
     */
     
     public function create(){
        if(\Auth::check()){
            $post = new Post();
            return View('postt.create',compact('post'));
        }
     }
      /*
     *   create function:show store form
 
     *   @return view index
     */
     public function store(Request $request){
      
        $request->validate([
        'titulo' => 'required',
        'contents' => 'required'
        ]);

        $post = new Post($request->all());
        $fecha=date('Y-m-d');
        $post->fecha=$fecha;
        $post->user_id=\Auth::id();
        
        if($post->save()){
            Session::flash('postExitoso', 'tu post se publico');
                return redirect('/postt');
        }
    }
      /*
     *   create function:show edit form
     * edit with the post id
     *   @return view edir
     */
     public function edit($post_id){
        $post = Post::find($post_id);
        
        if(\Auth::user()->id==$post->user_id){
            return View('postt.edit',compact('post'));
        }else{
                Session::flash('error', 'algo salio mal, ese no es tu post');
                return redirect('/postt') ;
            }
    }
       

    
     /*
      *   update function
      *   @return view post
      */
    public function update(Request $request, $post_id){   
            $request->validate([
            'titulo' => 'required',
            'contents' => 'required'
        ]);
 
         $post= Post::find($post_id); 
         $fecha = date('Y-m-d');
         $post->fecha=$fecha;
         $post->user_id= \Auth::id();
        
         
        if($post->update($request->all())){
            Session::flash('editado','tu post se edito con exito');
            return redirect('/postt');
        }else{
            return "algo salio mal";
           }  
        }
        
        /*
     *   create function:from show
 
     *   @return view
     */
    public function show($post_id){
        $showpost = Post::findOrFail($post_id);
        return View('postt.show',compact('showpost')); 
    }
        /*
     *   create function:from profile
 
     *   @return view
     */
        public function Profile($user_id){
            $userpost = User::findOrFail($user_id); 
           if(\Auth::user()->id==null){
            $twitterapi=\Twitter::getUserTimeline(['screen_name' => 'Cristiano', 'count' => 20, 'response_format' => 'json']);
           }else{
            $twitterapi=\Twitter::getUserTimeline(['screen_name' => $userpost->user_tweet, 'count' => 20, 'response_format' => 'json']);
           }   
            $twitterapi= json_decode($twitterapi);
            $hidetweet=$userpost->hidetweets;
            return View('postt.profile',compact('userpost','twitterapi','user_id','hidetweet')); 
        }

        public function hidetweet($tweet_id){
               HideTweet::create([
                    'tweet_id' => $tweet_id,
                    'user_id' => \Auth::user()->id
                ]);
                return response('ok',200);
        }
        public function destroy($tweet_id){
            HideTweet::destroy($tweet_id);
        }
        
}
