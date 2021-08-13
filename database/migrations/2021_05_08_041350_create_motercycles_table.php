<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotercyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motercycles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->longText('description');
            $table->longText('service_center_location');
            $table->longText('Showroom_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motercycles');
    }
}
