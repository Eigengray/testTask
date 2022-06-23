<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('email'); //email
            $table->string('FIO'); //ФИО надо сделать 3 поля!
            $table->integer('age'); //Возраст
            $table->integer('seniority'); //Стаж работы
            $table->string('photo'); //Фото
            $table->string('average_salary'); //средняя з/п
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employers');
    }
}
