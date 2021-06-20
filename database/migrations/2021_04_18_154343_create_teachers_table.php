<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password',255);
            $table->string('role',50);
            $table->string('name',50);
            $table->string('email',50);
            $table->string('phone',13);
            $table->string('imageUrl',100);
            $table->enum('gender',['Male','Female','Other']);
            $table->date('birth_date');
            $table->enum('marital_status',['Married','Unmarried']);
            $table->enum('blood_group',['A+','A-','AB+','AB-','B+','B-','O+','O-']);
            $table->enum('religion',['Islam','Hinduism','Buddhism','Christianity','Other']);
            $table->string('nationality',50);
            $table->integer('created_by');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('updated_by');
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); 
            $table->enum('activation_status',array('active','inactive'))->default('active');
        });
    }

     /**
     * Reverse the migrations.
     * 
     *
     * @return void
     */
     public function down()
     {
        Schema::dropIfExists('teachers');
    }
}
