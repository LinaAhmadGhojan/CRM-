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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->enum('role',['admin','user'])->default('user');
            $table->string('image');
            $table->string('phone');
            $table->timestamps();
        });

        \App\Models\User::create(
            [
                'name' =>'admin',
            'email' => 'admin@admin.com',
            'phone' => "000000",
            'image' => '',
            'role'=>'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',] // password
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_passport2s');
    }
};
