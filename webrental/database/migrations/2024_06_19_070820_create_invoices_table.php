<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rental_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->unsignedBigInteger('car_id');
            $table->date('pickup_date');
            $table->date('dropoff_date');
            $table->boolean('driver');
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status');
            $table->timestamps();

            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}