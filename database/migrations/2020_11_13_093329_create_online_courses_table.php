<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->unique();
            $table->string('img');
            $table->string('title');
            $table->string('summary');
            $table->longText('detail');
            $table->foreignId('level')->constrained('course_levels');
            $table->integer('price');
            $table->integer('promo_price')->nullable();
            $table->integer('lesson');
            $table->string('trailer')->nullable();
            $table->longText('video');
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
        Schema::dropIfExists('online_courses');
    }
}
