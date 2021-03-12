<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('travel_package_id');
            $table->integer('users_id')->nullable();
            $table->integer('additional_visa');
            $table->integer('transactions_total');
            $table->string('transaction_status');
            //incar, pending, succes, cencel, failed
            $table->softDeletes();
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
        Schema::dropIfExists('travel_transactions');
    }
}
