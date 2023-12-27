<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->bigInteger('customerId')->index()->nullable();
            $table->string('name', 50)->nullable()->comment('name from user');
            $table->string('username', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('role', 10)->comment('Role user, ADM(Admin), MBR(Member)')->index();
            $table->string('apiKey', 50)->nullable()->index();
            $table->tinyInteger('emailConfirmed')->default(1)->nullable()->comment('email active, 0:not active, 1:active')->index();
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
