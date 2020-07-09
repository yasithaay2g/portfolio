<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Thumb_id')->unsigned();
            $table->bigInteger('banner_id')->unsigned();
            $table->string('title');
            $table->text('requirment')->nullable();
            $table->text('description')->nullable();
            $table->text('solution')->nullable();
            $table->text('impact')->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->foreign('Thumb_id')->references('id')->on('images')->onDelete('cascade');
            $table->foreign('banner_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}