<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('coach_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coach_category')->nullable();
            $table->string('coachtype')->nullable();
            $table->longText('info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
