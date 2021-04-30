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
      /*
     *   create function:show store form
 
     *   @return view index
     */
     public function store(Request $request){
       
        $request->validate([
        'Titulo' => 'required',
        'Contents' => 'required'
        ]);
        
        $post = new Post($request->all());
        $fecha=date('Y-m-d');
        $post->fecha=$fecha;
        $post->user_id= \Auth::id();
        
        if($post->save()){
            
            return redirect('/postt');
        }
     }
      /*
     *   create function:show edit form
     * edit with the post id
     *   @return view
     */
     public function edit($post_id){

        $post = Post::find($post_id);

        return View('postt.edit',compact('post'));

    }
    public  function update(){
        
    }
}
