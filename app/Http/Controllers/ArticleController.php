<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article) //Seven RESTful controller actions //$article - this name must match with
    //route wildcard
    {

        //Article article does this - Article::where('id', 1)->first()

        //show a single resource

        //dd($articleID);

        // $article = Article::findOrFail($id);

        // return $article;

        return view('article.show', [
            'article' => $article // $article - this name must match with route wild card
        ]);
    }

    // public function showAll()
    // {
    //     //echo 'boop';
    //     $articles = Article::all();

    //     return view('article.articles', [
    //         'articles' => $articles
    //     ]);
    // }

    public function index()
    {

        //render a list of resource

        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;

            //return $articles;
        } else {
            $articles = Article::latest()->get();
        }

        //$articles = Article::latest()->get();

        return view('article.index', [
            'articles' => $articles
        ]);
    }


    public function create()
    {

        //shows a view to create a new resource

        // $tags = Tag::all();

        // return view('article.create', compact('tags'));


        return view('article.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {

        //persist the new resource
        //dump(request()->all());

        // $validatedAttributes = request()->validate([
        //     'title' => 'required',
        //     // 'title' => ['required', 'min:3', 'max:255'], //see laravel validation component for more
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        //return $validatedAttributes;

        // $article = new Article();

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');


        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body')
        // ]);


        //Article::create($validatedAttributes);

        // $article->save();

        //dd(request()->all());

        //Article::create($this->validateArticle());

        // $article = new Article($this->validateArticle());

        $this->validateArticle();

        $article = new Article(request(['title', 'excerpt', 'body']));

        $article->user_id = 1; // auth() -> id()

        $article->save();

        //$article->tags()->attach(request('tags')); //[1,2,3]

        // if (request('has'))
        //     $article->tags()->attach(request('tags'));


        if (request()->has('tags'))
            $article->tags()->attach(request('tags'));

        //auth()->user()->articles()->create($article); //here foreign key will be set automatically

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {

        //show a view to edit an existing resource

        //find the article associated with the id in the uri

        //$article = Article::find($id);



        return view('article.edit', compact('article'));
    }

    public function update(Article $article)
    {

        // $validatedAttributes = request()->validate([
        //     'title' => 'required',
        //     // 'title' => ['required', 'min:3', 'max:255'], //see laravel validation component for more
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        //persist the edited resource

        //$article = Article::find($id);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        //$article->update($validatedAttributes);


        $article->update($this->validateArticle());

        // return redirect(route('articles.show', $article));

        return redirect($article->path());
    }

    public function destroy()
    {

        //delete the resource


    }

    protected function validateArticle()
    {

        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id' //not part of article, it's a relationship
        ]);
    }
}
