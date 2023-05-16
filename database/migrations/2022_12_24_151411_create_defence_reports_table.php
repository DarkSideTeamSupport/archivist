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
        Schema::create('defence_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('defence_id')->constrained('defences');
            $table->foreignId('commission_id')->constrained('commissions');
            $table->string('theme')->nullable();
            $table->date('actual_delivery_date')->nullable();
            $table->integer('grade')->nullable();
            $table->boolean('archivist_mark')->default(0)->nullable();
            $table->foreignId('employee_id')->constrained('users');
            $table->string('file')->nullable();
            $table->date('upload_date')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('defence_reports');
    }
};
