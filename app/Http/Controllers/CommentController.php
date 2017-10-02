<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\Post;
class CommentController extends Controller
{
    public function index(){
    $post = Post::paginate(10);
        return view('admin/comment')->with('post',$post);
    }

    public function showComment(){
    	$post = comment::all();

    	return view('admin/comment')->with('post',$post);
}
    function addComment(Request $insert){
    	$post = new comment;
    	$post->nama = $insert->nama;
    	$post->comment = $insert->comment;
    	$post->post_id = $insert->post_id;
    	$post->save();
    	return redirect()->route('home');

    }

    public function destroyall1(Request $request)
    {
        if(count(collect($request->checkbox)) > 1){
          $post = comment::whereIn('id',$request->get('checkbox'));
          $post->delete();
        }else{
          $post = comment::find($request->get('checkbox'))->first();
          
          $post->delete();
        }
        return back();
    }	
}
