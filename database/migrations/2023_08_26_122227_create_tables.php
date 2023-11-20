<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_all')->default(false);
            $table->string('title',50)->unique();
            $table->timestamps();
        });
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');;
            $table->string('responsible_person',50);
            $table->integer('cod');
            $table->timestamps();
        });
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');;
            $table->date('date_of_note');
            $table->string('name_document',100);
            $table->bigInteger('number_document');
            $table->string('provider');
            $table->integer('arrived');
            $table->integer('subsided');
            $table->json('categories_all');
            $table->json('categories_stock');
            $table->timestamps();
        });
        Schema::create('military_units',function (Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('note_id');
           $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');;
           $table->json('categories_military');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
