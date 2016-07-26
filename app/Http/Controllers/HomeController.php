<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // \App\Post::create([
        //     'post_title' => 'first post',
        //     'post_content' => 'first content data',
        //     'post_type' => 'project_contractors']);
        
        
        \Artisan::call( 'tenanti:migrate', ['driver' => 'mu']);
        
        $posts = \App\Post::all();
        return view('home', compact('posts'));
    }
}
