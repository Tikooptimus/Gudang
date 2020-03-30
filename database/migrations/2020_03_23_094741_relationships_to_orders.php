<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationshipsToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->change();
            $table->foreign('customer_id')->references('id')->on('customers')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->change();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropIndex('orders_customer_id_foreign');
            $table->integer('customer_id')->change();
            
            $table->dropForeign('orders_user_id_foreign');
            $table->dropIndex('orders_user_id_foreign');
            $table->BigInteger('user_id')->change();
        });
    }
}
