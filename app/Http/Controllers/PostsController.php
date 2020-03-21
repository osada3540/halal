<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Validator;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if($request->has('keyword')){
          $data = [];
          if(\Auth::check()){
            $user = \Auth::user();
            $posts = $user->posts()->where('shop_name', 'like', '%'.$request->get('keyword').'%')->orWhere('shop_type', 'like', '%'.$request->get('keyword').'%')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
          }
        }else{
           $data = [];
           if(\Auth::check()){
              $user = \Auth::user();
              $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
            
              $data = [
                  'user' => $user,
                  'posts' => $posts,
              ];
            } 
        }
        
        
        
        return view('post/index', $data);
    }
    
    public function new()
    {
        return view('post/new');
    }
    
    public function store(Request $request)
    {
    
    $validator = Validator::make($request->all() , ['shop_name' => 'required|max:255','photo' => 'required']);
    
    if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    
    $post = new Post;
    $post->shop_name = $request->shop_name;
    $post->shop_type = $request->shop_type;
    $post->user_id = Auth::user()->id;
    
    $post->save();
    
    $request->photo->storeAs('public/post_images', $post->id . '.jpg');
    
    return redirect('/');
    
    }
    
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
        return redirect('/');
    }
    
}
