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
        Schema::create('question4s', function (Blueprint $table) {
            $table->id();
            $table->integer('foo', false, true);
            $table->string('bar', 42)->nullable();
            $table->date('baz');
            $table->longText('qux');
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
        Schema::dropIfExists('question4s');
    }
};
