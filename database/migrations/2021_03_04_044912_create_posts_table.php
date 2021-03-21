<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('slug', 30);
            $table->string('title');
            $table->text('body');
            $table->timestamps(); //adds created at and updated at timestamps in the table
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');

        // Schema::create('posts', function (Blueprint $table) {
        //     $table->dropColumn('title');
        // });

    }
}
