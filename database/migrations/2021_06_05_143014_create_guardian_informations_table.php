<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('father_name',100);
            $table->string('father_occupation',100);
            $table->string('father_phone',13)->nullable();
            $table->string('mother_name',100);
            $table->string('mother_occupation',100);
            $table->string('mother_phone',13)->nullable();
            $table->integer('user_id');
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
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardian_informations');
    }
}
