<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retraits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('DOTI');
            $table->string('NomPrenom');
            $table->string('NomPrenomAR');
            $table->string('DateRetraits');
            
            $table->foreign('DOTI')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('retraits');
    }

}
