<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComingSoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coming_soons', function (Blueprint $table) {

                $table->id();
                $table->foreignId('pcategory_id');
                $table->string('name');
                $table->string('slug');
                $table->string('cover');
                $table->date('date')->nullable();
                $table->longText('desc');
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
        Schema::dropIfExists('coming_soons');
    }
}
