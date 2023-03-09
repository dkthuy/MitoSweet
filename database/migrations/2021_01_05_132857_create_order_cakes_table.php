<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cakes', function (Blueprint $table) {
            $table->id();
            $table->string('bill_id',11)->unique();
            $table->string('title');
            $table->string('phone');
            $table->date('date');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->foreignId('type')->constrained('cake_types');
            $table->foreignId('size')->constrained('cake_sizes');
            $table->integer('price');
            $table->string('subject')->nullable();
            $table->longText('note')->nullable();
            $table->integer('total');
            $table->integer('status')->default('0');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_cakes');
    }
}
