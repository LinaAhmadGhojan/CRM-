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

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('deadline');
              $table->unsignedBigInteger('assigned_user');
            $table->foreign('assigned_user')->references('id')->on('users');
            $table->unsignedBigInteger('assigned_client');
            $table->foreign('assigned_client')->references('id')->on('clients');
            $table->enum('status',['done','start','inprossing']);
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
        Schema::dropIfExists('projects');
    }
};
