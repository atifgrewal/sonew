<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPlayersTable extends Migration
{
    public function up()
    {
        Schema::table('players', function (Blueprint $table) {
            $table->unsignedBigInteger('name_id')->nullable();
            $table->foreign('name_id', 'name_fk_5954137')->references('id')->on('users');
            $table->unsignedBigInteger('childparent_id')->nullable();
            $table->foreign('childparent_id', 'childparent_fk_5954251')->references('id')->on('users');
        });
    }
}
