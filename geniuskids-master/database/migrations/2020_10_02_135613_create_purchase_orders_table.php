<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('discount_id')->nullable()->default(null);
            $table->unsignedInteger('city_id');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('main_contact');
            $table->string('emergency_contact');
            $table->string('email');
            $table->json('order_details')->nullable();
            $table->decimal('total', 9,2)->default(0);
            $table->decimal('discount', 9,2)->default(0);
            $table->decimal('vat', 9,2)->default(0);
            $table->decimal('grand_total', 9,2)->default(0);
            $table->string('payment_method')->default('online');
            $table->string('discount_proof')->nullable()->default(null);
            $table->string('payment_proof')->nullable()->default(null);
            $table->timestamp('paid_on')->nullable()->default(null);
            $table->timestamp('cancelled_on')->nullable()->default(null);
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
        Schema::dropIfExists('purchase_orders');
    }
}
