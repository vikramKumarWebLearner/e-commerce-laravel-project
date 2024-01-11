<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('product_colors')) {
            Schema::create('product_colors', function (Blueprint $table) {
                $table->id();
                $table->integer('quantity');
                $table->foreignId('product_id')
                    ->constrained('products')
                    ->onDelete('cascade');

                $table->foreignId('color_id')->constrained('colors')->onDelete('set null');
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_colors');
    }
};
