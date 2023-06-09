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
        Schema::create('cruds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(11);
            $table->string('title')->nullable();
            $table->text('post')->nullable();
            $table->text('img')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->integer('designer_id')->length(11);
            $table->integer('status')->length(1);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('cruds');
    }
};
