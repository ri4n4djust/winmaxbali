<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('kodeStaff');
            $table->string('namaStaff');
            $table->string('emailStaff');
            $table->string('alamatStaff');
            $table->string('notlpStaff');
            $table->string('kodeJabatan');
            $table->string('kodeKantor');
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
        Schema::dropIfExists('staffs');
    }
}
