<?php

namespace App;

class Example
{

    // public function go()
    // {
    //     dump('It works!');
    // }
    // public $age;
    // public $name;

    // public function __construct($age, $name)
    // {
    //     $this->age = $age;
    //     $this->name = $name;
    // }

    // protected $foo;

    // public function __construct($foo)
    // {
    //     $this->foo = $foo;
    // }

    protected $collaborator;
    protected $foo;

    public function __construct(Collaborator $collaborator, $foo) //need to be explicit for $foo to resolve
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }
}

