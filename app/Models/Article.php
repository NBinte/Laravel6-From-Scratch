<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // public function getRouteKeyName() //this method is for getting the data from table with any other column except id
    // {
    //     return $slug; //returns the name of the column that you want to query by 
    //     // Article::where('slug', $article)->first() - this query will run under the hood
    // }

    // protected $fillable = ['title', 'excerpt', 'body'];

    protected $guarded = [];

    public function path()
    {
        return route('articles.show', $this);
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {

        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}

//$article->user - the user who wrote the article


//an article has many tags
//a tag doesn't belong to only one article, a  single tag can have many articles //many to many relationship

//article - Learn Laravel
// tags - php, laravel, work, education