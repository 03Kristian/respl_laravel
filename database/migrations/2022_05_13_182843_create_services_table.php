<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',80);
            $table->text('descripcion');
            $table->time('tiempo_extra');
            $table->float('costo_extra',9,2);
            $table->string('clave',12);
            $table->unsignedBigInteger('promotions_id');
            $table->foreign("promotions_id")->references("id")->on("promotions")->onUpdate("cascade")->onDelete("cascade");

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
        Schema::dropIfExists('services');
    }
};
