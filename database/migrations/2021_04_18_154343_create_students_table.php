<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /** 
     * Run the migrations. 
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userName',100);
            $table->string('password',255);
            $table->string('name',50);
            $table->string('email',50);
            $table->string('imageUrl',100);
            $table->integer('admitted_class');
            $table->timestamp('admitted_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('gender',['Male','Female','others']);
            $table->date('birth_date');
            $table->enum('marital_status',['Married','Unmarried']);
            $table->enum('blood_group',['A+','A-','AB+','AB-','B+','B-','O+','O-']);
            $table->enum('religion',['Muslims','Hindus','Buddhists','Christians','Others']);
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
        Schema::dropIfExists('students');
    }
}
