<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToBikesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bikes', function (Blueprint $table) {
            //固定費
            $table->integer('light_vehicle_tax')->nullable()->comment('軽自動車税');
            $table->integer('weight_tax')->nullable()->comment('重量税');
            $table->integer('liability_insurance')->nullable()->comment('自賠責保険');
            //変動日
            $table->integer('voluntary_insurance')->nullable()->comment('任意保険');
            $table->integer('vehicle_inspection')->nullable()->comment('車検');
            $table->integer('parking_fee')->nullable()->comment('駐車場代');
            $table->integer('consumables')->nullable()->comment('消耗品日');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bikes', function (Blueprint $table) {
            //
            $table->dropColumn('light_vehicle_tax');
            $table->dropColumn('weight_tax');
            $table->dropColumn('liability_insurance');
            
            $table->dropColumn('voluntary_insurance');
            $table->dropColumn('vehicle_inspection');
            $table->dropColumn('parking_fee');
            $table->dropColumn('consumables');
        });
    }
}
