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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',40);
            $table->string('apellidos',40);
            $table->integer('identificacion')->length(12);
            $table->date('fecha_nacimiento');
            $table->integer('telefono')->length(10);
            $table->string('direccion',50);
            $table->string('observaciones',250);

            $table->unsignedBigInteger('users_id');
            $table->foreign("users_id")->references("id")->on("users")
            ->onUpdate("cascade")->onDelete("cascade");
            
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
        Schema::dropIfExists('customers');
    }
};
