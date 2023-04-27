<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->double('price',total:8 ,places:2);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->on('levels')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->on('departments')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
