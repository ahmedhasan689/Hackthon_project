<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();

            $table->unsignedFloat('shipping')->default(0);
            $table->unsignedFloat('discount')->default(0);
            $table->unsignedFloat('tax')->default(0);
            $table->unsignedFloat('total')->default(0);

            $table->enum('status', ['pending', 'processing', 'shipped', 'completed'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'refund'])->default('unpaid');

            // Billing
            $table->string('billing_name');
            // $table->string('billing_last_name');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->string('billing_address');

            // Shipping
            $table->string('shipping_name');
            // $table->string('shipping_last_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->string('shipping_address');

            $table->text('notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
