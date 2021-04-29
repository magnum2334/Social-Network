<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /*
    *   index function
    *   @return view
    */
    public function index(){
        $posts = Post::all();
        return View ('postt.index',compact('posts'));
    }
  /*
     *   create function:show create form
 
     *   @return view
     */
     
     public function create(){
         $post = new Post();
         return View('postt.create',compact('post'));
     }
     
     public function store(Request $request){
       
       
        $post = new Post($request->all());
        $fecha=date('Y-m-d');
        $post->fecha=$fecha;
        if($post->save()){
            
            return redirect('/postt');
        }
     }
}
