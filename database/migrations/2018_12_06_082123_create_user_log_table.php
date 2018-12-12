<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('action', [
                'login',
                'register',
                'update_password',
                'update_profile',
                'bind_bank_card_no',
                'bind_id_card',
                'charge_money',
                'withdraw_money',
                'order',
            ]);
            $table->string('before', 300);
            $table->string('after', 300);
            $table->boolean('succ')->default(true);
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_log');
    }
}
