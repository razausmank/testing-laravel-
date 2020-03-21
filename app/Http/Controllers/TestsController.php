<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function show($slug)
    {
        // $testaments = [ 'one' => "hello you just entered one and this works just fine",
        // 'two' => "wow this works too you must ba magician" ];

        $post = Post::where('slug', $slug)->firstorFail();

        

        return view('test', [ 'post_man' => $post ]);
    }
}
