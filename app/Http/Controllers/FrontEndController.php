<?php

namespace App\Http\Controllers;

use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => Setting::first()->site_name,
            'categories' => Category::take(5)->get(),
            'first_post' => Post::orderBy('created_at', 'desc')->first(),
            'second_post' => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'third_post' => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
        ]);
    }
}
