<?php


namespace App\Http\Controllers;


class PostsController
{

    public function show($post)
    {
        //return 'Testing the controller';

        $posts = [
            'my-first-post' => 'Hello, This is my first post!',
            'my-second-post' => 'Trying to get a hang of it'
        ]; //sample data

        if (!array_key_exists($post, $posts)) {
            abort(404, 'Sorry that post was not found');
        }

        return view('post', [
            // 'post' =>$posts[$post] ?? 'Nothing here yet.' //one way to handle undefined index of the array (not recommended)

            'post' => $posts[$post]


        ]); //matching the slug value with array and sending the corresponding key value to the view    


    }
}
