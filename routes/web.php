<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome1');
// });


// Route::get('/', function () {

//     $container = new \App\Container();

//     $container->bind('example', function () {
//         return new \App\Example();
//     });


//     $example = $container->resolve('example');


//     // ddd($container);

//     //ddd($example);
//     $example->go();
// });


// app()->bind('example', function(){
    
//     //$foo = config('services.foo'); //fetching the config settings that we need

//     //return new App\Example($foo);
//     return new App\Example();
// });


// Route::get('/', function (App\Example $example) {
//     //$example = resolve('example');

//     //$example = resolve(App\Example::class);

//     // $example = app()->make(App\Example::class);

//     ddd($example); 

// });



Route:: get('/', 'App\Http\Controllers\PageController@home');


// Route::get('/welcome', function () {
//     return view('welcome');
// });



// Route::get('/', function () {
//     echo 'Hello Universe';
// });



// Route::get('/', function () {
//     return ['foo' => 'bar'];
// }); //can be returned JSON



// Route::get('test', function(){
//     return view('test');
// });



// Route::get('/', function(){

//     $name = request('name');

//     return $name;
// }); //returning string



// Route::get('/', function(){

//     $name = request('name');

//     return view('test', [
//         'nameValue' => $name
//     ]); //second parameter will be passed to view

// });



// Route::get('/posts/{post}', function(){
//     return view('post'); //will load the route for '/post/anything'
// });



// Route::get('/posts/{post}', function($post){

//     return $post; //returns the part after '/posts'

// });



// Route::get('/posts/{post}', function($post){

//     $posts = [
//         'my-first-post' => 'Hello, This is my first post!',
//         'my-second-post' => 'Trying to get a hang of it'
//     ]; //sample data

//     if(!array_key_exists($post, $posts)){
//         abort(404, 'Sorry that post was not found');
//     }

//     return view('post', [
//         // 'post' =>$posts[$post] ?? 'Nothing here yet.' //one way to handle undefined index of the array (not recommended)

//         'post' =>$posts[$post]


//     ]); //matching the slug value with array and sending the corresponding key value to the view
// });


//Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show');

// Route::get('/contact', function(){
//     return view('contact');
// });

Route::get('/about', function () {

    // $article = Article::all();

    // $article = Article::take(2)->get();

    // $article = Article::paginate(1);

    // $article = Article::latest()->get();

    // $article = Article::latest('updated_at')->get();

    $articles = Article::take(3)->latest()->get();

    //return $article;


    return view('about', [
        'articles' => $articles
    ]);
});

Route::get('/articles/create', 'App\Http\Controllers\ArticleController@create');

Route::post('/articles', 'App\Http\Controllers\ArticleController@store');

Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@show')->name('articles.show');

//for showing any specific article uses primary key(id) by default in the table to fetch data because of the wildcard

//if we want to use another column from the table we need to overwrite getRouteKeyName method in the model

//wildcard name must match with object name in controller and the variable name that is being passed to view

// Route::get('/articles', 'App\Http\Controllers\ArticleController@showAll');

Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('articles.index'); //for showing all articles

Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticleController@edit'); //for editing any article

Route::put('/articles/{article}', 'App\Http\Controllers\ArticleController@update');

//GET, POST, PUT, PATCH, DELETE

// GET, POST, PUT, DELETE



// ***don't use http verb in URI like /articles/update or /articles/delete rather we will send requests
//to indicate these operations



//GET / articles - for reading all articles

//GET / articles/id - for reading a specific article

//PUT /articles/id - for updating a specific article //interacts with model(DB)

//DELETE /articles/id - for deleting a specific article

//POST /articles -for creating a new article //shows the form


//GET /videos - show all videos

//GET /videos/2 - show a specific video

//GET /videos/create - shows a form to create a new video

//POST /videos - stores a new video, interacts with model(DB)

//GET /videos/2/edit - shows the form for updating a specific video

//PUT /videos/2 - updates a specific video, interacts with model(DB)

//DELETE /videos/2 - delete a specific video



//POST /videos/subscriptions - stores a new subscription under videos uri => VideoSubscriptionController@store
