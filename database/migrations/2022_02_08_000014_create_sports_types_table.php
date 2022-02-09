<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTypesTable extends Migration
{
    public function up()
    {
        Schema::create('sports_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sports_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
