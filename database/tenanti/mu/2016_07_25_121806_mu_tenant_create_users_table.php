<?php

use Orchestra\Tenanti\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class MuTenantCreateUsersTable extends Migration
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
        Schema::table("mu_{$id}_", function (Blueprint $table) {

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
    public function down($id, Model $model)
    {
        Schema::table("mu_{$id}_", function (Blueprint $table) {

        });
    }
}
