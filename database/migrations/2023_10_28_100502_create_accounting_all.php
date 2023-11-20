<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('is_all')->default(false);
            $table->string('title',50)->unique();
            $table->timestamps();
        });
        Schema::create('accounting_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accounting_book_id');
            $table->foreign('accounting_book_id')->references('id')->on('accounting_books')->onDelete('cascade');
            $table->integer('cod');
            $table->string('title',50)->unique();
            $table->timestamps();
        });
        Schema::create('accounting_notes', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_note');
            $table->string('name_document',100);
            $table->integer('number_product');
            $table->string('name_factory',100);
            $table->date('date_of_create');
            $table->bigInteger('number_of_passport');
            $table->string('arrived_name',100);
            $table->integer('arrived_number_document');
            $table->string('provider_name');
            $table->string('provider_number_document');
            $table->string('storage',100);
            $table->string('category',100);
            $table->bigInteger('price');
            $table->date('date_of_garant_end');
            $table->date('date_of_technical_end');
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
        Schema::dropIfExists('accounting_books');
    }
}
