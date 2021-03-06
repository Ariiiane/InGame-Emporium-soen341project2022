<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBillingToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->string('billing_address', 250)->default("");
            $table->double('total', 8, 2)->default(0);

            $table->string('payment_card_number', 25)->default("");
            $table->string('payment_card_expiry', 10)->default("");
            $table->string('payment_card_cvv', 5)->default("");
            $table->string('payment_card_name', 50)->default("");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('billing_address');
            $table->dropColumn('total');
            $table->dropColumn('payment_card_number');
            $table->dropColumn('payment_card_expiry');
            $table->dropColumn('payment_card_cvv');
            $table->dropColumn('payment_card_name');

        });
    }
}
