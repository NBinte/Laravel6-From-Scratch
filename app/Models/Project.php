<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function user()
    {

        return $this->belongsto(User::class); //SELECT * FROM users WHERE project_id = 1
    }
}

//$project->user - the user to whom the project belongs



//hasOne - a user has one profile // reverse is belongsto

//hasMany - a user has many articles //reverse is belongsto

//belongsto - a project belongs to user(s) // an article belongs to a user

//belongstoMany - for dealing with pivot tables



//morphMany - for dealing with polymorphic relationships
//morphtoMany
