<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsPreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_precios', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('pharmacy_id');
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('new_price', 10, 2);
            $table->integer('old_stock')->nullable();
            $table->integer('new_stock')->default(0);
            $table->string('source');
            $table->timestamp('change_date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('logs_precios');
    }
}
