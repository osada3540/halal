<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    
    public function store(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return back();
    }
}
