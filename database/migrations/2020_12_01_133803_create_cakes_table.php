<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->string('summary');
            $table->longText('detail');
            $table->string('note')->nullable();
            $table->foreignId('cake_types')->constrained('cake_types');
            $table->string('code',5)->unique();
            $table->integer('price');
            // $table->foreignId('cake_sizes')->constrained('cake_sizes');
            $table->string('cake_sizes')->nullable();
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
        Schema::dropIfExists('cakes');
    }
}
