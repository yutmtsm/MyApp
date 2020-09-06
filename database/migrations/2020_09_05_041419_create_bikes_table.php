<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('manufacturer')->comment('メーカー');
            $table->string('engine_displacement')->comment('排気量');
            $table->string('type')->comment('車種');
            $table->string('model_year')->comment('年式');
            $table->boolean('delete_flag')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('bikes');
    }
}
