<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquationLiabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equation_liabilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('paid_month')->nullable();
            $table->biginteger('paid_amount')->nullable();
            $table->string('paid_monthplus')->nullable();
            $table->biginteger('paid_amountplus')->nullable();
            $table->biginteger('amount')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('equation_liabilities');
    }
}
