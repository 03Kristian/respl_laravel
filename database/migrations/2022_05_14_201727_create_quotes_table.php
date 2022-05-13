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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->Time('hora_programada');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->time('tiempo_total');
            
/*             $table->dateTime('tiempo_total')->nullable()->default(new DateTime());*/   
            $table->float('pago',12,2);

            $table->unsignedBigInteger('employee_id');
            $table->foreign("employee_id")->references("id")->on("employee")
            ->onUpdate("cascade")->onDelete("cascade");
            
            $table->unsignedBigInteger('waypay_id');
            $table->foreign("waypay_id")->references("id")->on("way_pay")->onUpdate("cascade")->onDelete("cascade");
            

            $table->unsignedBigInteger('services_id');
            $table->foreign("services_id")->references("id")->on("services")->onUpdate("cascade")->onDelete("cascade");
            

            $table->unsignedBigInteger('customers_id');
            $table->foreign("customers_id")->references("id")->on("customers")
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
        Schema::dropIfExists('quotes');
    }
};
