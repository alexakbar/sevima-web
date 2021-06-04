<?php

namespace App\Http\Controllers\SuperAdmin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\User;
use App\Entities\Post;
use App\Entities\Like;
use App\Entities\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        $data['users'] = User::where('email','!=','admin')->get();
        $data['posts'] = Post::count();
        $data['likes'] = Like::count();
        $data['comments'] = Comment::count();
        return view('superadmin.dashboard.index',$data);
    }
}
