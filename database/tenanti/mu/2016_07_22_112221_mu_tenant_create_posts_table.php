<?php

use Orchestra\Tenanti\Migration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class MuTenantCreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param  string|int  $id
     * @param  \Illuminate\Database\Eloquent\Model  $model
     *
     * @return void
     */
    public function up($id, Model $model)
    {
        Schema::create("posts", function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title');
            $table->string('post_content');
            $table->string('post_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @param  string|int  $id
     * @param  \Illuminate\Database\Eloquent\Model  $model
     *
     * @return void
     */
    public function down($id, Model $entity)
    {
        Schema::drop("posts");
    }
}
