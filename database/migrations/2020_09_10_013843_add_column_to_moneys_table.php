<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToMoneysTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moneys', function (Blueprint $table) {
            //
            $table->string('total_addmission_fee')->nullable();
            $table->string('total_purchase_cost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moneys', function (Blueprint $table) {
            //
            $table->dropColumn('total_addmission_fee');
            $table->dropColumn('total_purchase_cost');
        });
    }
}
