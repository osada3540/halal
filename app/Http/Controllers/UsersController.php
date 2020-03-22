<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

use Validator;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('user.index', [
            'users' => $users,
        ]);
    }
    
    public function show($user_id)
    {
        $user = User::find($user_id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        
        $data += $this->counts($user);
        
        return view('user/show', $data);
    }
    
    public function edit()
    {
        $user = Auth::user();
        
        return view('user/edit', ['user' => $user]);
    }
    
    public function update(Request $request)
    {
        //バリデーション（入力値チェック）
        $validator = Validator::make($request->all() , [
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string|min:6|confirmed',
            ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $user = User::find($request->id);
        $user->name = $request->user_name;
        $user->profile_text = $request->user_profile_text;
        if ($request->user_profile_photo !=null) {
            $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }
        $user->password = bcrypt($request->user_password);
        $user->save();

        return redirect('/users/'.$request->id);
    }
}
