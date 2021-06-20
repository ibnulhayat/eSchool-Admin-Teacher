<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paressent_village',200);
            $table->string('paressent_post_office',200);
            $table->integer('paressent_district_id');
            $table->integer('paressent_thana_id');
            $table->string('parmanent_village',200);
            $table->string('parmanent_post_office',255);
            $table->integer('parmanent_district_id');
            $table->integer('parmanent_thana_id');
            $table->enum('same_address',['Yes','No']);
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
        Schema::dropIfExists('addresses');
    }
}
