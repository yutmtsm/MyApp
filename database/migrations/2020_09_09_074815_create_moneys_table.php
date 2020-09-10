<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('spending_year')->nullable()->comment('年間支出');
            $table->integer('spending_month')->nullable()->comment('当月支出');
            $table->integer('spending_today')->nullable()->comment('当日支出');
            $table->integer('travel_expenses')->nullable()->comment('旅費等');
            $table->integer('variable_cost')->nullable()->comment('変動費');
            $table->integer('fixed_cost')->nullable()->comment('固定費');
            //下は右と同じ意味：$table->timestamp('created_at')->nullable();,$table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('moneys');
    }
}
