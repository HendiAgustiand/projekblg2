<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\comment;
use DB;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth/login');
    }
    public function news(){
        $post = Post::paginate(10);
        return view('welcome')->with('post',$post);
    }
    
    Public function showComment(){
        $post = comment::all();
        return view('welcome')->with('post',$post);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $adminData = new user;
        $adminData->name = $insert->name;
        $adminData->email = $insert->email;
        $adminData->password = $insert->password;
        $adminData->password_confirm = $insert->password_confirm;
        $adminData->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function delete($id){
        $post = comment::find($id)->delete();
        return back();
    }

    public function showPage($id)
    {
        $post = DB::table('posts')->join('comments','posts.id','=','comments.post_id')->select('comments.id','comments.nama','comments.comment')->get();
       dd($post);
        //$post = comment::all();
        $data = Post::find($id);
        return view('single')->with('data', $data)->with('post',$post)->with('user',\AUTH::user());
    }
}
