<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('prf_image',255)->nullable(false);
            $table->string('email')->unique();
            $table->string('mobile_no')->unique();
            $table->string('password');
            $table->char('gender',1)->nullable();
            $table->date('dob')->nullable();
            $table->char('user_type', 10)->comment('cleark=>Cleark, teacher=>Teacher')->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
         
            $table->boolean('status')->default(0)->comment('0 => InActive, 1 => Active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
