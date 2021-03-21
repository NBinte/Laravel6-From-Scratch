<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class); //SELECT * FROM articles WHERE user_id = 1

        //even though it is a method, when we want to access the collection of record of a relationship, we
        //need to call it as a property like $user->articles
    }

    public function projects()
    {
        return $this->hasMany(Project::class); //SELECT * FROM projects WHERE user_id = 1
    }
}


// $user->articles - current user's articles

//$user->project - current user's projects

// $user = USER::fnd(1) //SELECT *FROM users WHERE id = 1

// $user->projects //SELECT * FROM projects WHERE user_id = $user->id

//$user->projects //has an eloquent collection of projects that we can iterate over

//$user->projects->first()

//$user->projects->last()

//$user->projects->find()

//$user->projects->split(3)

//$user->projects->groupBy()
