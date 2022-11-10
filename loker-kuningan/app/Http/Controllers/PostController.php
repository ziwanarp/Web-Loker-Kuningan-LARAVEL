<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $active = '';
        $lokasi = '';
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' di : ' . $category->name;
            $lokasi = $category->name;
        } else {
            $active = 'posts';
        }

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' oleh : ' . $user->name;
        }

        return view('posts', [
            "title" => "Semua Loker" . $title,
            "lokasi" => $lokasi,
            "active" => $active,
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString(),
            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Loker",
            "active" => "posts",
            "post" => $post,
            'categories' => Category::all()
        ]);
    }
}
