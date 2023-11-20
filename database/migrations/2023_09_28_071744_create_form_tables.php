<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_all')->default(false);
            $table->string('title',50)->unique();
            $table->timestamps();
        });
            Schema::create('forms', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('form_list_id');
                $table->foreign('form_list_id')->references('id')->on('forms')->onDelete('cascade');
                $table->integer('cod');
                $table->string('title',50)->unique();
                $table->timestamps();
            });
                Schema::create('form_notes', function (Blueprint $table) {
                    $table->id();
                    $table->unsignedBigInteger('form_id');
                    $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
                    $table->date('date_of_note');
                    $table->string('name_document',100);
                    $table->json('number');
                    $table->string('factory',50);
                    $table->date('date_of_create');
                    $table->unsignedBigInteger('passport');
                    $table->string('arrived_name');
                    $table->integer('arrived_number');
                    $table->string('subsided_name');
                    $table->integer('subsided_number');
                    $table->text('about');
                    $table->integer('group');
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
        Schema::dropIfExists('form_tables');
    }
}
