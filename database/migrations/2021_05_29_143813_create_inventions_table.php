<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventions', function (Blueprint $table) {
            $table->id();
            $table->boolean('isAvailable');
            $table->String('code')->unique();
            $table->dateTime('due_date');
            $table->foreignId('from_user_id')->constrained('users');
            $table->foreignId('to_user_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('inventions');
    }
}
