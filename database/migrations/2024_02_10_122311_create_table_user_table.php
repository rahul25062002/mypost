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
        Schema::create('table_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email',255)->nullable(false);
            $table->smallInteger('status')->default(2);
            $table->string('first_name',255)->nullable(false);
            $table->string('last_name',255)->nullable(true);
            $table->string('password',50)->nullable(false);
            $table->smallInteger('stage')->default(0);
            $table->string('forgot_key',255)->nullable(false)->default('adfg');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_user');
    }
};
