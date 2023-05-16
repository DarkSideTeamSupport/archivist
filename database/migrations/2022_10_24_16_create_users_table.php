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
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('login')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->integer('course')->nullable();
            $table->date('birthday')->nullable();
            $table->foreignId('position_id')->nullable()->constrained('user_positions');
            $table->foreignId('status_id')->default(1)->constrained('user_statuses');
            $table->foreignId('role_id')->default(2)->constrained('user_roles');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
