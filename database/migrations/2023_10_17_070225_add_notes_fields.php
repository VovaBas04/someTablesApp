<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('form_notes',function (Blueprint $table){
            $table->integer('category')->nullable();
            $table->json('date_deploy')->nullable();
            $table->text('garant')->nullable();
            $table->text('real_garant')->nullable();
            $table->text('real_work')->nullable();
            $table->unsignedInteger('main_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
