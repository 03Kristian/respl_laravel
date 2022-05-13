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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->integer('telefono')->length(10);
            $table->string('direccion',50);
            $table->date('fecha_nacimiento');
            $table->float('salario',9,2);
            $table->timestamps();

            $table->unsignedBigInteger('commissions_id');
            $table->foreign("commissions_id")->references("id")->on("commissions")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->unsignedBigInteger('users_id');
            $table->foreign("users_id")->references("id")->on("users")
            ->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
};
