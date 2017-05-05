<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiographicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biographicals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_security_no',5)->unique();
            $table->string('surname')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('marital_status',10)->nullable();
            $table->string('region',20)->nullable();
            $table->decimal('monthly_salary', 10, 2)->nullable();
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
        Schema::dropIfExists('biographicals');
    }
}
