<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('libros', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('cve_libro');
            $table->bigInteger('cve_categoria')->unsigned();
            $table->string('nombre', 300);
            $table->timestamps();

            $table->foreign('cve_categoria')
            ->references('cve_categoria')->on('categorias')->onDelete('cascade');
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
