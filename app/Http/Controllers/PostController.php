<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Postcontroller extends Controller
{

    // public function show($post)
    // {
    //     //return 'Testing the controller';

    //     $posts = [
    //         'my-first-post' => 'Hello, This is my first post!',
    //         'my-second-post' => 'Trying to get a hang of it'
    //     ]; //sample data

    //     if (!array_key_exists($post, $posts)) {
    //         abort(404, 'Sorry that post was not found');
    //     }

    //     return view('post', [
    //         // 'post' =>$posts[$post] ?? 'Nothing here yet.' //one way to handle undefined index of the array (not recommended)

    //         'post' => $posts[$post]


    //     ]); //matching the slug value with array and sending the corresponding key value to the view    


    // }


    public function show($slug)
    {


        //$post = \DB::table('posts')->where('slug', $slug)->first();

        //dd($post);

        $post = Post::where('slug', $slug)->firstOrFail();


        // if( ! $post){
        //     abort(404);
        // }


        return view('post', [
            'post' => $post
        ]);
    }
}
