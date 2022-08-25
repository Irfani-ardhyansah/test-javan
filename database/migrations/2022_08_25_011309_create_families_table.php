<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('grand_parent_id')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('parent_id')->nullable()->unsigned()->change();
            $table->foreign('parent_id')->references('id')->on('families')->onDelete('cascade');

            $table->unsignedBigInteger('grand_parent_id')->nullable()->unsigned()->change();
            $table->foreign('grand_parent_id')->references('id')->on('families')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
